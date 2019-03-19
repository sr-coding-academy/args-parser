<?php

namespace ArgsParser\validators;


interface IValidator
{
    public function validate($value);
}