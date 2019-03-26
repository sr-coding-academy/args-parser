<?php

namespace ArgsParserTests\dataProviders;


class DataProviderRegisterTest
{
    public static function providesParsedInputsForAddValuesToRegister()
    {
        return array(
            [
                'u' => ["root"],
                'd' => ['/dir/sub/'],
                'p' => ["1024"],
                'f' => ["file.txt,script.sh"],
                'i' => ["1,5,-6,17"]
            ],
        );
    }
}