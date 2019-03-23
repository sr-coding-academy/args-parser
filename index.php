<?php
require("vendor/autoload.php");

use ArgsParser\Parser;
use ArgsParser\Register;

$register = new Register();

//$input = "-u root -d /usr/logs/ -p 8080 -f file.txt,script.sh -i 1,5,-6,17 -l";
$input = "-u root -d /usr/logs/ -p 8080 -f file.txt,script.sh -i 1,5,-6,17 -l";

$parserOne = new Parser($input, $register);
$parserOne->ask("f");
$parserOne->ask("i");

