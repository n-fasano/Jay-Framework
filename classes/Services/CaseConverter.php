<?php

namespace Services;

class CaseConverter
{
    static public function toCamelCase(string $str): string
    {
        $len = strlen($str);
        $camelCase = '';
        for ($i = 0; $i < $len; $i++)
        {
            $ASCII = ord($str[$i]);
            if ((47 < $ASCII && $ASCII < 58) || (64 < $ASCII && $ASCII < 91) || (96 < $ASCII && $ASCII < 123)) 
            {
                $camelCase .= $str[$i];
            } 
            else 
            {
                if (++$i < $len)
                {
                    $camelCase .= ucfirst($str[$i]);
                }
            }
        }

        return $camelCase;
    }

    static public function toSnakeCase(string $str): string
    {
        $len = strlen($str);
        $snakeCase = '';
        for ($i = 0; $i < $len; $i++)
        {
            $ASCII = ord($str[$i]);
            if (64 < $ASCII && $ASCII < 91) 
            {
                $snakeCase .= '_';
            }
            $snakeCase .= $str[$i];
        }

        return strtolower($snakeCase);
    }

    static public function toPascalCase(string $str): string
    {
        return ucfirst(self::toCamelCase($str));
    }

    static public function toSpinalCase(string $str): string
    {
        $len = strlen($str);
        $snakeCase = '';
        for ($i = 0; $i < $len; $i++)
        {
            $ASCII = ord($str[$i]);
            if (64 < $ASCII && $ASCII < 91) 
            {
                $snakeCase .= '-';
            }
            $snakeCase .= $str[$i];
        }

        return strtolower($snakeCase);
    }
}