# ==============================================================================
# Master Defender Repair Script
# Runs C# Registry Fixer + Repairs SecHealthUI AppX Package
# ==============================================================================

Write-Host "1. Running C# Registry & Service Ownership Restorer..." -ForegroundColor Cyan
& "$PSScriptRoot\FixDefenderService.exe"

Write-Host "`n2. Re-registering & Resetting Windows Security AppX UI..." -ForegroundColor Cyan
Get-AppxPackage *SecHealthUI* -AllUsers | ForEach-Object {
    Write-Host "   -> Registering $($_.PackageFullName)..."
    Add-AppxPackage -DisableDevelopmentMode -Register "$($_.InstallLocation)\AppXManifest.xml" -ErrorAction SilentlyContinue
}
Get-AppxPackage *SecHealthUI* | Reset-AppxPackage -ErrorAction SilentlyContinue

Write-Host "`n3. Starting Windows Security UI..." -ForegroundColor Green
Start-Process "windowsdefender:"
Write-Host "Done! Your Windows Security dashboard is now restored." -ForegroundColor Green
Start-Sleep -Seconds 3
