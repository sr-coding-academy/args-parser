<?php

namespace ArgsParserTests\dataProviders;


class DataProviderRegisterTest
{
    public static function providesParsedInputsForAddValuesToRegister()
    {
        $addingOneArgumentObject = [['u' => ["root"]], 2];
        $addingTwoArgumentObjects = [['u' => ["root"], 'd' => ["/dir/sub/"]], 3];
        $addingThreeArgumentObjects = [['u' => ["root"], 'd' => ["/dir/sub/", "/dir/sub/sub/"]], 4];

        $arrayOfAllProvidingData = [$addingOneArgumentObject, $addingTwoArgumentObjects, $addingThreeArgumentObjects];
        return $arrayOfAllProvidingData;
    }

    public static function providesParsedInputsWithFalseFlagsForAddValuesToRegister()
    {
        $oneFalseFlag = [
            [
                'x' => ["root"]
            ]
        ];

        $FalseFlagAtTheEnd = [
            [
                'u' => ["root"], 'x' => ["/dir/sub/"]
            ]
        ];

        $FalseFlagAtTheBeginning = [
            [
                'x' => ["nope"],
                'd' => ["/dir/sub/"],
                'u' => ['root']
            ]
        ];

        $arrayOfAllProvidingData = [$oneFalseFlag, $FalseFlagAtTheEnd, $FalseFlagAtTheBeginning];
        return $arrayOfAllProvidingData;
    }
}