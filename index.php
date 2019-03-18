<?php
require("vendor/autoload.php");

use ArgsParser\Parser;
use ArgsParser\Validator;

$allowedFlags = "u,d,p";
$validator = new Validator($allowedFlags);

$input = "-u ralph -u michi -u root";
$parser = new Parser($input, $validator);
$parser->ask("u");

//RETURN root
//$parser->ask(u);