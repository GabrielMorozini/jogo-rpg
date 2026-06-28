<?php

function readKey()
{
    if (PHP_OS_FAMILY === 'Windows') {
        $cmd = "powershell -Command \"[System.Console]::ReadKey(\$true).KeyChar\"";
        return strtolower(trim(shell_exec($cmd)));
    } else {
        shell_exec('stty -icanon -echo');
        $char = fgetc(STDIN);
        shell_exec('stty icanon echo');
        return strtolower($char);
    }
}
