<?php
require("vendor/autoload.php");

use ArgsParser\Parser;
use ArgsParser\ArgumentPolice;
use ArgsParser\Register;

$allowedFlags = "u,d,p,f,i";
$validator = new ArgumentPolice($allowedFlags);
$register = new Register($validator->getAllowedFlags());

echo "[Parser One]: \n";

$input = "-u root -d /usr/logs -p 8080 -f file.txt,script.sh -i 1,5,-6,17";
$parserOne = new Parser($input, $validator, $register);
$parserOne->ask("u");
$parserOne->ask("d");
$parserOne->ask("p");


//RETURN root
//$parser->ask(u);