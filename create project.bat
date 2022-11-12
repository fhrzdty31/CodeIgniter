@echo off

    set /p nama="Masukkan nama project : "
    composer create-project codeigniter4/appstarter %nama% --no-dev
    
pause>nul