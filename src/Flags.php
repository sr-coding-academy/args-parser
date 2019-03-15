<?php
/**
 * Created by PhpStorm.
 * User: e.bukli
 * Date: 15/03/2019
 * Time: 15:00
 */

namespace ArgsParser;


use ArgsParser\Flags\User;

class Flags
{
    private $name;
    private $abbreviation;
    private $dataType;

    public function __construct($name, $abbreviation, $dataType)
    {
        switch($name){
            case "User": new User($name, $abbreviation, $dataType);
            break;

        }
    }


}