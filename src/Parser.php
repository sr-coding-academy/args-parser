<?php

namespace ArgsParser;

use Exception;

class Parser
{
    private $validator;
    private $register;

    public function __construct($input, ArgumentPolice $validator, Register $register)
    {
        $this->validator = $validator;
        $this->register = $register;
        $this->parse($input);
    }

    /**
     * @param $input
     * @throws Exception
     */
    public function parse($input)
    {
        $processedInputs = $this->prepareInputForDelivery($input);
        foreach ($processedInputs as $item) {
            $flag = $this->extractFlagFrom($item);
            $value = $this->extractValueFrom($item);
            if ($this->validator->validate($flag, $value, $item)) {
                $this->register->addValuesToRegister($flag, $item);
            } else {
                throw new Exception("{$item}: Invalid value.");
            }
        }
        var_dump($this->register->getData());
    }

    private function prepareInputForDelivery($input): array
    {
        $splitInput = explode("-", $input);
        array_shift($splitInput);
        $trimmedInput = $this->trimInput($splitInput);
        return $trimmedInput;
    }

    private function trimInput($array)
    {
        $trimmed = [];
        foreach ($array as $item) {
            $trimmed[] = rtrim($item);
        }
        return $trimmed;
    }

    private function extractFlagFrom($item)
    {
        return substr($item, 0, 1);
    }

    private function extractValueFrom($item)
    {
        $positionOfLastWhiteSpace = strrpos($item, ' ');
        $lengthOfValue = (int)strlen($item) - (int)$positionOfLastWhiteSpace;
        return substr($item, $positionOfLastWhiteSpace + 1, $lengthOfValue);
    }

    public function ask($flag)
    {
//        if (in_array("u", $this->validator->getAllowedFlags())) {
//            $tmp = $this->register->getRegister();
//            echo $tmp['u'];
//        } elseif (in_array("d", $this->validator->getAllowedFlags())) {
//            $tmp = $this->register->getRegister();
//            echo $tmp['d'];
//        } elseif (in_array("p", $this->validator->getAllowedFlags())) {
//            $tmp = $this->register->getRegister();
//            echo $tmp['p'];
//        } else {
//            echo "invalid flag";
//        }
    }

}