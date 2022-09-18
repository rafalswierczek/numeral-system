<?php

declare(strict_types=1);

namespace rafalswierczek\NumeralSystem;

final class BinStringConverter
{
    public static function toBin(string $binaryString): string
    {
        $binary = '';
        
        $binaryString = self::getBinStringWithLeadingZeros($binaryString);

        for($bitNumber = strlen($binaryString), $i = 0; $i < $bitNumber; $i += 8) // foreach byte
        {
            $binaryString8bit = substr($binaryString, $i, 8);

            $decimal = bindec($binaryString8bit);

            $binary .= pack('C', $decimal);
        }
        
        return $binary;
    }
    
    public static function toHexString(string $binaryString): string
    {
        return strtoupper(dechex(bindec($binaryString)));
    }
    
    public static function toInt(string $binaryString): int
    {
        $int = bindec($binaryString);

        if ('integer' !== gettype($int)) {
            throw new \RuntimeException('Too large binary string parameter');
        }
        
        return $int;
    }
    
    private static function getBinStringWithLeadingZeros(string $binaryString): string
    {
        $bitNumber = strlen($binaryString);
        
        $bitLengthWithoutLeadingZeros = $bitNumber % 8;
        
        if ($bitLengthWithoutLeadingZeros ==! 0) {
            $zerosToAdd = 8 - $bitLengthWithoutLeadingZeros;
            
            $binaryString = str_pad($binaryString, $bitNumber + $zerosToAdd, "0", STR_PAD_LEFT);
        }
        
        return $binaryString;
    }
}
