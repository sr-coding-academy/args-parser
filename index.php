<?php
require("vendor/autoload.php");

use ArgsParser\Parser;
use ArgsParser\ArgumentPolice;
use ArgsParser\Register;

$allowedFlags = "u,d,p,f,i,l";
$validator = new ArgumentPolice($allowedFlags);
$register = new Register($validator->getAllowedFlags());

//$input = "-u root -d /usr/logs/ -p 8080 -f file.txt,script.sh -i 1,5,-6,17 -l";
$input = "-u root";

$parserOne = new Parser($input, $register);
//$parserOne->ask("u");
