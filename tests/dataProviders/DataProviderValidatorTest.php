<?php

namespace ArgsParserTests\dataProviders;


use ArgsParser\exceptions\InvalidFlagException;

class DataProviderValidatorTest
{
    public static function providesForValidateValidData()
    {
        return array(
            [true, 'u', 'root'],
            [true, 'u', 'xaz'],
            [true, 'u', 'RAP'],
            [true, 'd', '/dir/'],
            [true, 'd', '/dir/sub/'],
            [true, 'd', '/dir/sub/sub/'],
            [true, 'p', '1024'],
            [true, 'p', '65535'],
            [true, 'p', '25000'],
            [true, 'f', 'file.txt'],
            [true, 'f', 'file.txt,file2.pdf'],
            [true, 'f', 'file.txt,file2.pdf,bye.bat'],
            [true, 'i', '1'],
            [true, 'i', '1,2'],
            [true, 'i', '1,2,3'],
            [true, 'i', '-1'],
            [true, 'i', '-1,-2,-3'],
            [true, 'i', '1,-1,1'],
            [true, 'i', '-1,2,-2,3'],
        );
    }

    public static function providesForValidateInvalidData() {
        return array(
            ['', ''],
            ['a', ''],
            ['b', ''],
            ['c', ''],
            ['z', ''],
            ['&', ''],
            ['-', ''],
            ['?', ''],
            ['$', ''],
            ['}', ''],
            ['ab', ''],
            ['abc', '']
        );
    }
}