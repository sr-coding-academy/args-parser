<?php
require "vendor/autoload.php";

use ArgsParser\Parser;
use ArgsParser\Display;

$parser = new Parser("-u root -l -d /usr/lo-gs -p 8080 -f file.txt,script.sh,data.json -i 1,-2,-3,-4");
$display = new Display($parser->flags);