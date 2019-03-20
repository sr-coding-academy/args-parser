<?php

    require "vendor/autoload.php";
    use ArgsParser\Parser;

    $args = "8080 root /usr/logs file.txt,script.sh 1,5,-6,17";
    $args2 = "8080 /usr/logs file.txt,script.sh";

    $argsParser = new Parser();
    $argsParser->loadSchema("schema.xml", "schema_1");
    $argsParser->loadParameters($args);
    $argsParser->verifyArguments();
    //display all flags with the respective parameters
    $argsParser->displayAllParameters();
    //Search for the value in a given flag
    $argsParser->getParameterFromFlag("-i");