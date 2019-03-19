<?php
require("vendor/autoload.php");

use ArgsParser\Parser;
use ArgsParser\ArgumentPolice;
use ArgsParser\Register;

$allowedFlags = "u,d,p";
$validator = new ArgumentPolice($allowedFlags);
$register = new Register($validator->getAllowedFlags());

$input = "-u ralph -u michi -u root -d /blabla/ -p 65535";
$parser = new Parser($input, $validator, $register);
$parser->ask('u');
$parser->ask("p");
$parser->ask("d");

//RETURN root
//$parser->ask(u);