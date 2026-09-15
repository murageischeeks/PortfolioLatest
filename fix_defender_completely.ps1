# ==============================================================================
# Complete Windows Defender & SecurityHealthUI Repair Script
# Repairs KMSAuto damage, fixes blank Windows Security UI, and starts services
# ==============================================================================

# 1. Auto-elevate to Administrator if not already elevated
if (-not ([Security.Principal.WindowsPrincipal] [Security.Principal.WindowsIdentity]::GetCurrent()).IsInRole([Security.Principal.WindowsBuiltInRole] "Administrator")) {
    Write-Host "Elevating to Administrator..." -ForegroundColor Yellow
    Start-Process powershell -Verb RunAs -ArgumentList "-NoExit -ExecutionPolicy Bypass -File `"$PSCommandPath`""
    exit
}

Write-Host "============================================================" -ForegroundColor Cyan
Write-Host "  REPAIRING WINDOWS DEFENDER & WINDOWS SECURITY UI APP" -ForegroundColor Cyan
Write-Host "============================================================" -ForegroundColor Cyan

# 2. Wipe KMSAuto / Group Policy disable locks
Write-Host "`n[1/5] Removing Group Policy disable restrictions..." -ForegroundColor Yellow
Remove-ItemProperty -Path "HKLM:\SOFTWARE\Policies\Microsoft\Windows Defender" -Name "DisableAntiSpyware", "DisableAntiVirus", "DisableRoutinelyTakingAction" -ErrorAction SilentlyContinue
Remove-Item -Path "HKLM:\SOFTWARE\Policies\Microsoft\Windows Defender\Real-Time Protection" -Recurse -Force -ErrorAction SilentlyContinue
Set-ItemProperty -Path "HKLM:\SOFTWARE\Microsoft\Windows Defender" -Name "DisableAntiSpyware" -Value 0 -ErrorAction SilentlyContinue
Set-ItemProperty -Path "HKLM:\SOFTWARE\Microsoft\Windows Defender" -Name "DisableAntiVirus" -Value 0 -ErrorAction SilentlyContinue

# 3. Restore Windows Defender Service Startup Types in Registry (Start = 2 means Automatic)
Write-Host "`n[2/5] Restoring Windows Defender Antivirus service startup keys..." -ForegroundColor Yellow
$servicesToEnable = @("WinDefend", "SecurityHealthService", "wscsvc", "Wdnissvc", "Sense")
foreach ($svc in $servicesToEnable) {
    $path = "HKLM:\SYSTEM\CurrentControlSet\Services\$svc"
    if (Test-Path $path) {
        Set-ItemProperty -Path $path -Name "Start" -Value 2 -ErrorAction SilentlyContinue
        Write-Host "   -> Set $svc startup to Automatic (2)" -ForegroundColor Green
    }
}

# 4. Repair & Re-register Windows Security App (Fixes blank / empty window)
Write-Host "`n[3/5] Repairing & Re-registering Microsoft.SecHealthUI (Windows Security App)..." -ForegroundColor Yellow
Get-AppxPackage *SecHealthUI* -AllUsers | ForEach-Object {
    Write-Host "   -> Re-registering package: $($_.PackageFullName)" -ForegroundColor Cyan
    Add-AppxPackage -DisableDevelopmentMode -Register "$($_.InstallLocation)\AppXManifest.xml" -ErrorAction SilentlyContinue
}
Get-AppxPackage *SecHealthUI* | Reset-AppxPackage -ErrorAction SilentlyContinue

# 5. Start Services & Re-enable Real-Time Protection
Write-Host "`n[4/5] Starting Windows Defender Services..." -ForegroundColor Yellow
Start-Service -Name "wscsvc" -ErrorAction SilentlyContinue
Start-Service -Name "WinDefend" -ErrorAction SilentlyContinue
Start-Service -Name "SecurityHealthService" -ErrorAction SilentlyContinue

Write-Host "`n[5/5] Re-enabling Real-Time Protection settings..." -ForegroundColor Yellow
Set-MpPreference -DisableRealtimeMonitoring $false -ErrorAction SilentlyContinue
Set-MpPreference -DisableBehaviorMonitoring $false -ErrorAction SilentlyContinue
Set-MpPreference -DisableIOAVProtection $false -ErrorAction SilentlyContinue

Write-Host "`n============================================================" -ForegroundColor Green
Write-Host "  REPAIR COMPLETE! Launching Windows Security..." -ForegroundColor Green
Write-Host "============================================================" -ForegroundColor Green

Start-Process "windowsdefender:"
