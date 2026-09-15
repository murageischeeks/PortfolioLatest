@echo off
title Windows Defender System File Restorer
color 0B

:: Check for Administrator permissions
fltmc >nul 2>&1
if "%errorlevel%" NEQ "0" (
    echo Elevating to Administrator...
    powershell -Command "Start-Process '%~f0' -Verb RunAs"
    exit /b
)

echo ================================================================
echo   RESTORING MISSING WINDOWS SECURITY FILES (SFC AND DISM)
echo ================================================================
echo.
echo [1/3] Running System File Checker (sfc /scannow)...
sfc /scannow

echo.
echo [2/3] Running DISM Image Restore...
DISM /Online /Cleanup-Image /RestoreHealth

echo.
echo [3/3] Re-registering Windows Security Dashboard...
powershell -Command "Get-AppxPackage Microsoft.SecHealthUI -AllUsers | Reset-AppxPackage"

echo.
echo ================================================================
echo   SYSTEM FILE REPAIR COMPLETE!
echo   Please RESTART YOUR COMPUTER to activate the restored files.
echo ================================================================
pause
