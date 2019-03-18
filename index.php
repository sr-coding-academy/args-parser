<?php

    require "vendor/autoload.php";
    use ArgsParser\Parser;
    $args = "8080 root /usr/logs file.txt,script.sh 1,5,-6,17";
    $args2 = "8080 /usr/logs file.txt,script.sh";

    $parser = new Parser();
    $parser->loadSchema("schema.xml", "schema_1");
    $parser->loadParameters($args);

    $parser->displayAllParameters();

    $parser->getParameterFromFlag("-i");
