<?php

declare(strict_types=1);

namespace rafalswierczek\NumeralSystem;

final class IntConverter
{
    public static function toBin(int $int): string
    {
        $binaryString = decbin($int);
        
        return BinStringConverter::toBin($binaryString);
    }
    
    public static function toBinString(int $int): string
    {
        return decbin($int);
    }
    
    public static function toHexString(int $int): string
    {
        return strtoupper(dechex($int));
    }
}
