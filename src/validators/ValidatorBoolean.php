<?php

namespace ArgsParser\validators;


class ValidatorBoolean implements IValidator
{

    /**
     * @param string $value
     * @return bool
     */
    public function validate($value)
    {
        if (empty($value)) {
            return true;
        } else {
            return false;
        }
    }
}