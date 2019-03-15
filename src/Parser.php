<?php
/**
 * Created by PhpStorm.
 * User: e.bukli
 * Date: 15/03/2019
 * Time: 13:22
 */

namespace ArgsParser;


class Parser
{
    private $input;
    private $newFormat;

    public function __construct($input)
    {
        $this->input = $input;
        $this->formatInput();
    }

    private function formatInput()
    {
        $this->newFormat = explode(" ",$this->input);

    }

    public function getArgument($flag)
    {
        $keyOfFlag = array_search($flag, $this->newFormat);
        $argument = $this->newFormat[$keyOfFlag+1];
        return $argument;
    }
}