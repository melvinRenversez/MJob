@echo off
git add .



set currentDate=%date%
set currentTime=%time%


set day=%currentDate:~0,2%
set month=%currentDate:~3,2%
set year=%currentDate:~-4%


set hour=%currentTime:~0,2%
set minute=%currentTime:~3,2%
set second=%currentTime:~6,2%


if "%hour:~0,1%" == " " set hour=0%hour:~1,1%


git commit -m %day%/%month%/%year%::%hour%:%minute%:%second%

git push origin main

echo Modifications commitées et poussées vers GitHub avec succès!
