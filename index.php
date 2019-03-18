<?php
require "vendor/autoload.php";
use ArgsParser\Parser;

$parser = new Parser("-u root -l -d /usr/logs -p 8080 -f file.txt,script.sh,data.json -i 1,-2,3,4");
$parser->displayResult();