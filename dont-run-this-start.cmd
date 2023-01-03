net start Apache2.4
net start mysql
start /MIN /B "MiLLigram running" cmd.exe @cmd /k "pushd W:\RPL\Tes-Mini-IG & php artisan serve"
start /MIN /B "MiLLigram running" cmd.exe @cmd /k "pushd W:\RPL\Tes-Mini-IG & npm run dev"
