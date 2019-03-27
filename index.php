<?php
require("vendor/autoload.php");

use ArgsParser\Parser;
use ArgsParser\Register;

$register = new Register();

$parserOne = new Parser($register);
//$input = "-u root -d /usr/logs/ -p 8080 -f file.txt,script.sh -i 1,5,-6,17 -l";
//$input = "-u ralph -u test -u root -d /usr/logs/ -p 1024 -f file.txt,script.sh -i 1,5,-6,17 -l";
//$input = "-u root -u ralph -u wow -d /dir/ -d /dir/sub/ -d /dir/sub/sub/";
$input = "-u root";

$register->addValuesToRegister($parserOne->parse($input));

echo $parserOne->ask("u");
//echo $parserOne->ask("d");
//echo $parserOne->ask("p");
//echo $parserOne->ask("f");
//echo $parserOne->ask("i");
//echo $parserOne->ask("l");

