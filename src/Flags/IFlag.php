<?php

namespace ArgsParser\Flags;

interface IFlag
{
    public function __construct($name, $abbreviation, $dataType);
    public function verify($parameter);
    public function getAbbreviation();
    public function getValue();
    public function getName();
}