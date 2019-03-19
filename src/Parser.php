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
        try {
            $this->parse($input);
        } catch (Exception $e) {
            echo $e;
        }
    }

    /**
     * @param $input
     * @throws Exception
     */
    public function parse($input): void
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
        preg_match_all("((([a-z]){1})([' ']*[A-Za-z0-9/+_~,.-]*))", $input, $allRawMatches);
        $splitInput = $allRawMatches[0];
        $trimmedInput = $this->trimInput($splitInput);
        return $trimmedInput;
    }

    private function trimInput($array): array
    {
        $trimmed = [];
        foreach ($array as $item) {
            $trimmed[] = rtrim($item);
        }
        return $trimmed;
    }

    private function extractFlagFrom($item): string
    {
        return substr($item, 0, 1);
    }

    private function extractValueFrom($item): string
    {
        $positionOfLastWhiteSpace = strrpos($item, ' ');
        $lengthOfValue = (int)strlen($item) - (int)$positionOfLastWhiteSpace;
        return substr($item, $positionOfLastWhiteSpace + 1, $lengthOfValue);
    }

    public function ask($flag): void
    {
        $data = $this->register->getData();
        echo "{$flag}:\n";
        if (count($data[$flag]) == 0) {
            echo "\tNope.\n";
            return;
        }
        foreach ($data[$flag] as $value) {
            $type = gettype($value);
            echo "\tValue: {$value} - Type: {$type}\n";
        }
    }
}