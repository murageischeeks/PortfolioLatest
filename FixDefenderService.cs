using System;
using System.Runtime.InteropServices;
using System.Security.AccessControl;
using System.Security.Principal;
using Microsoft.Win32;
using System.ServiceProcess;

class Program
{
    [DllImport("advapi32.dll", ExactSpelling = true, SetLastError = true)]
    internal static extern bool AdjustTokenPrivileges(IntPtr htok, bool disall, ref TokPriv1Luid newst, int len, IntPtr prev, IntPtr relen);

    [DllImport("advapi32.dll", ExactSpelling = true, SetLastError = true)]
    internal static extern bool OpenProcessToken(IntPtr h, int acc, ref IntPtr phtok);

    [DllImport("advapi32.dll", SetLastError = true)]
    internal static extern bool LookupPrivilegeValue(string host, string name, ref long pluid);

    [StructLayout(LayoutKind.Sequential, Pack = 1)]
    internal struct TokPriv1Luid
    {
        public int Count;
        public long Luid;
        public int Attr;
    }

    internal const int SE_PRIVILEGE_ENABLED = 0x00000002;
    internal const int TOKEN_QUERY = 0x00000008;
    internal const int TOKEN_ADJUST_PRIVILEGES = 0x00000020;

    static bool EnablePrivilege(string privilege)
    {
        try
        {
            bool retVal;
            TokPriv1Luid tp;
            IntPtr hproc = System.Diagnostics.Process.GetCurrentProcess().Handle;
            IntPtr htok = IntPtr.Zero;
            retVal = OpenProcessToken(hproc, TOKEN_ADJUST_PRIVILEGES | TOKEN_QUERY, ref htok);
            tp.Count = 1;
            tp.Luid = 0;
            tp.Attr = SE_PRIVILEGE_ENABLED;
            retVal = LookupPrivilegeValue(null, privilege, ref tp.Luid);
            retVal = AdjustTokenPrivileges(htok, false, ref tp, 0, IntPtr.Zero, IntPtr.Zero);
            return retVal;
        }
        catch { return false; }
    }

    static void FixServiceKey(string serviceName, int startValue)
    {
        string regPath = @"SYSTEM\CurrentControlSet\Services\" + serviceName;
        Console.WriteLine("Processing service: " + serviceName + " ...");
        try
        {
            using (RegistryKey key = Registry.LocalMachine.OpenSubKey(regPath, RegistryKeyPermissionCheck.ReadWriteSubTree, RegistryRights.TakeOwnership | RegistryRights.ChangePermissions | RegistryRights.SetValue))
            {
                if (key != null)
                {
                    RegistrySecurity rs = new RegistrySecurity();
                    SecurityIdentifier adminSid = new SecurityIdentifier(WellKnownSidType.BuiltinAdministratorsSid, null);
                    rs.SetOwner(adminSid);
                    key.SetAccessControl(rs);

                    rs = key.GetAccessControl();
                    RegistryAccessRule rule = new RegistryAccessRule(adminSid, RegistryRights.FullControl, InheritanceFlags.ContainerInherit | InheritanceFlags.ObjectInherit, PropagationFlags.None, AccessControlType.Allow);
                    rs.AddAccessRule(rule);
                    key.SetAccessControl(rs);
                }
            }
        }
        catch (Exception ex)
        {
            Console.WriteLine("  Note taking ownership: " + ex.Message);
        }

        try
        {
            using (RegistryKey key = Registry.LocalMachine.OpenSubKey(regPath, true))
            {
                if (key != null)
                {
                    key.SetValue("Start", startValue, RegistryValueKind.DWord);
                    Console.WriteLine("  [SUCCESS] Set " + serviceName + " Start = " + startValue);
                }
            }
        }
        catch (Exception ex)
        {
            Console.WriteLine("  Error setting value: " + ex.Message);
        }
    }

    static void Main(string[] args)
    {
        Console.WriteLine("=================================================");
        Console.WriteLine("  FIXING WINDOWS DEFENDER SERVICE REGISTRY KEYS  ");
        Console.WriteLine("=================================================");

        EnablePrivilege("SeTakeOwnershipPrivilege");
        EnablePrivilege("SeRestorePrivilege");
        EnablePrivilege("SeSecurityPrivilege");
        EnablePrivilege("SeBackupPrivilege");

        string[] services = new string[] { "WinDefend", "SecurityHealthService", "wscsvc", "Wdnissvc", "Sense" };
        foreach (string svc in services)
        {
            FixServiceKey(svc, 2);
        }

        Console.WriteLine("\nStarting services...");
        foreach (string svc in new string[] { "wscsvc", "SecurityHealthService", "WinDefend" })
        {
            try
            {
                ServiceController sc = new ServiceController(svc);
                if (sc.Status == ServiceControllerStatus.Stopped)
                {
                    sc.Start();
                    Console.WriteLine("  Started service: " + svc);
                }
                else
                {
                    Console.WriteLine("  Service already running: " + svc + " (" + sc.Status + ")");
                }
            }
            catch (Exception ex)
            {
                Console.WriteLine("  Note starting " + svc + ": " + ex.Message);
            }
        }

        Console.WriteLine("\nDone!");
    }
}
