<?php
/**
 * Created by PhpStorm.
 * User: e.bukli
 * Date: 15/03/2019
 * Time: 16:22
 */

namespace ArgsParser\Flags;


interface IFlag
{
    public function __construct($name, $abbreviation, $dataType);
    public function verify($parameter);
}