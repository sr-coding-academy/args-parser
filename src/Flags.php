<?php
/**
 * Created by PhpStorm.
 * User: e.bukli
 * Date: 15/03/2019
 * Time: 15:00
 */

namespace ArgsParser;


use ArgsParser\Flags\User;
use ArgsParser\Flags\Files;
use ArgsParser\Flags\Logging;
use ArgsParser\Flags\Port;
use ArgsParser\Flags\Index;

class Flags
{
    public function createFlagInstance($name, $abbreviation, $dataType){
        switch($name){
            case "User": return new User($name, $abbreviation, $dataType);
                break;

            case "File": return new Files($name, $abbreviation, $dataType);
                break;

            case "Port": return new Port($name, $abbreviation, $dataType);
                break;

            case "Index": return new Index($name, $abbreviation, $dataType);
                break;

            case "Logging": return new Logging($name, $abbreviation, $dataType);
                break;

        }

    }


}