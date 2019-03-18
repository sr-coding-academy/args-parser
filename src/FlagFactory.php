<?php

namespace ArgsParser;

use ArgsParser\Flags\Directory;
use ArgsParser\Flags\Files;
use ArgsParser\Flags\Logging;
use ArgsParser\Flags\Port;
use ArgsParser\Flags\Index;
use ArgsParser\Flags\User;

class FlagFactory
{
    public function createFlag($name, $abbreviation, $dataType){
        switch($name){
            case "Directory": return new Directory($name, $abbreviation, $dataType);
                break;

            case "File": return new Files($name, $abbreviation, $dataType);
                break;

            case "Port": return new Port($name, $abbreviation, $dataType);
                break;

            case "Index": return new Index($name, $abbreviation, $dataType);
                break;

            case "Logging": return new Logging($name, $abbreviation, $dataType);
                break;

            case "User": return new User($name, $abbreviation, $dataType);
                break;
        }
    }
}