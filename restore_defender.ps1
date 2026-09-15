# ==============================================================================
# Windows Defender Restoration Script (Run as Administrator)
# Removes KMSAuto / Activator policy overrides & re-enables WinDefend service
# ==============================================================================

Write-Host "1. Removing Windows Defender Group Policy override locks..." -ForegroundColor Cyan
Remove-ItemProperty -Path "HKLM:\SOFTWARE\Policies\Microsoft\Windows Defender" -Name "DisableAntiSpyware", "DisableAntiVirus", "DisableRoutinelyTakingAction" -ErrorAction SilentlyContinue
Remove-Item -Path "HKLM:\SOFTWARE\Policies\Microsoft\Windows Defender\Real-Time Protection" -Recurse -Force -ErrorAction SilentlyContinue

Write-Host "2. Restoring Windows Defender Antivirus Service (WinDefend) startup type..." -ForegroundColor Cyan
Set-ItemProperty -Path "HKLM:\SYSTEM\CurrentControlSet\Services\WinDefend" -Name "Start" -Value 2 -ErrorAction SilentlyContinue
Set-Service -Name "WinDefend" -StartupType Automatic -ErrorAction SilentlyContinue
Set-Service -Name "SecurityHealthService" -StartupType Automatic -ErrorAction SilentlyContinue
Set-Service -Name "wscsvc" -StartupType Automatic -ErrorAction SilentlyContinue

Write-Host "3. Starting Windows Defender and Security Health Services..." -ForegroundColor Cyan
Start-Service -Name "WinDefend" -ErrorAction SilentlyContinue
Start-Service -Name "SecurityHealthService" -ErrorAction SilentlyContinue

Write-Host "4. Re-enabling Real-Time Protection via PowerShell Cmdlet..." -ForegroundColor Cyan
Set-MpPreference -DisableRealtimeMonitoring $false -ErrorAction SilentlyContinue
Set-MpPreference -DisableBehaviorMonitoring $false -ErrorAction SilentlyContinue
Set-MpPreference -DisableIOAVProtection $false -ErrorAction SilentlyContinue

Write-Host "`nWindows Defender restoration complete! Open Windows Security in Start Menu to verify." -ForegroundColor Green
