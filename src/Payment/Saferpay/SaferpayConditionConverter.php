<?php

namespace Horo42\Saferpay;

class SaferpayConditionConverter
{
    /**
     * @param  string $condition
     * @return string
     */
    public static function toRegex($condition)
    {
        $preparedPattern = str_replace(
            array (
                ']',
                '[',
                '..',
                'a',
                'n',
                's'
            ),
            array (
                '}',
                ']{',
                '1,',
                'a-z\p{L}\ \t',
                '\d',
                '\+\-\_\:\;\/\\\<\>\(\)\.\,\=\?\@\&',
            ),
            $condition
        );

        return '/^([' . $preparedPattern . ')$/ui' ;
    }
}
