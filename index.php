<?php
require("vendor/autoload.php");

use ArgsParser\Parser;
use ArgsParser\Validator;
use ArgsParser\Register;

$allowedFlags = "u,d,p";
$validator = new Validator($allowedFlags);
$register = new Register($validator->getAllowedFlags());

$input = "-u ralph -u michi -u root";
$parser = new Parser($input, $validator);
$parser->ask("u");

//RETURN root
//$parser->ask(u);