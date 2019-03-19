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
                $this->register->addValuesToRegister($flag, $value);
            } else {
                throw new Exception("{$value}: Invalid value.");
            }
        }
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
        $data = $this->register->getData();
        foreach ($data[$flag] as $value) {
            $type = gettype($value);
            echo "Value: {$value} - Type: {$type}\n";
        }
    }
}