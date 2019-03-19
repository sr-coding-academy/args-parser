<?php
require("vendor/autoload.php");

use ArgsParser\Parser;
use ArgsParser\ArgumentPolice;
use ArgsParser\Register;

$allowedFlags = "u,d,p";
$validator = new ArgumentPolice($allowedFlags);
$register = new Register($validator->getAllowedFlags());

$input = "-u ralph -u michi -u root -d blabla -p bubu -p baba";
$parser = new Parser($input, $validator, $register);
$parser->ask("u");

//RETURN root
//$parser->ask(u);