<?php

namespace ArgsParser\validators;


interface IValidator
{
    /**
     * @param string $value
     * @return bool
     */
    public function validate($value);
}