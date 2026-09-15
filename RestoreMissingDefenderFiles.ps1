# ==============================================================================
# Restore Missing Windows Defender & Security System Files
# Runs System File Checker (sfc /scannow) and DISM to replace deleted binaries
# ==============================================================================

Write-Host "================================================================" -ForegroundColor Cyan
Write-Host "  RESTORING MISSING WINDOWS SECURITY SYSTEM FILES (SFC & DISM) " -ForegroundColor Cyan
Write-Host "================================================================" -ForegroundColor Cyan

Write-Host "`n1. Running System File Checker (SFC) to restore missing binaries..." -ForegroundColor Yellow
sfc /scannow

Write-Host "`n2. Running DISM RestoreHealth..." -ForegroundColor Yellow
DISM /Online /Cleanup-Image /RestoreHealth

Write-Host "`n3. Re-registering Windows Security App..." -ForegroundColor Yellow
Get-AppxPackage Microsoft.SecHealthUI -AllUsers | Reset-AppxPackage -ErrorAction SilentlyContinue

Write-Host "`n================================================================" -ForegroundColor Green
Write-Host "  SYSTEM REPAIR COMPLETE! PLEASE REBOOT YOUR COMPUTER.          " -ForegroundColor Green
Write-Host "================================================================" -ForegroundColor Green
Read-Host "Press Enter to exit..."
