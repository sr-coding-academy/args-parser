<?php

namespace ArgsParser;

class Parser
{
    private $validator;
    private $register;

    public function __construct($input, Validator $validator, Register $register)
    {
        $this->validator = $validator;
        $this->register = $register;
        $this->parse($input);
    }

    public function parse($input)
    {
        if ($this->validator->validate($input)) {
            $splitInput = explode("-", $input);
            $trimmedInput = $this->trimInput($splitInput);
            var_dump($trimmedInput);
            $this->register->addValuesToRegister($trimmedInput);


            if ($this->validator->validateArray($trimmedInput)) {
                //TODO: RESOLVE
            }
            //TODO: Entscheiden, ob 2x checken oder 1x
        }
    }

    private function trimInput($array)
    {
        $trimmed = [];
        foreach ($array as $item) {
            $trimmed[] = rtrim($item);
        }
        return $trimmed;
    }

    public function ask($flag)
    {
        if (in_array("u", $this->validator->getAllowedFlags())) {
            $tmp = $this->register->getRegister();
            echo $tmp['u'];
        } elseif (in_array("d", $this->validator->getAllowedFlags())) {
            $tmp = $this->register->getRegister();
            echo $tmp['d'];
        } elseif (in_array("p", $this->validator->getAllowedFlags())) {
            $tmp = $this->register->getRegister();
            echo $tmp['p'];
        } else {
            echo "invalid flag";
        }
    }

}