<?php
require("vendor/autoload.php");

use ArgsParser\Parser;
use ArgsParser\Register;

$register = new Register();

$parserOne = new Parser($register);
//$input = "-u root -d /usr/logs/ -p 8080 -f file.txt,script.sh -i 1,5,-6,17 -l";
$input = "-u root -d /usr/logs/ -p 8080 -f file.txt,script.sh -i 1,5,-6,17 -l";

$parserOne->parse($input);
$parserOne->ask("u");
$parserOne->ask("d");
$parserOne->ask("p");
$parserOne->ask("f");
$parserOne->ask("i");
$parserOne->ask("l");

