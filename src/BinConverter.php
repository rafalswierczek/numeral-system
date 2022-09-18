<?php

declare(strict_types=1);

namespace rafalswierczek\NumeralSystem;

final class BinConverter
{
    public static function toBinString(string $binary): string
    {
        $binaryString = '';
    
        for($bytes = strlen($binary), $i = 0; $i < $bytes; $i++) // foreach byte
        {
            $decimal = unpack("C", $binary[$i])[1];
            
            $binaryString8bit = sprintf('%08d', decbin($decimal));
            
            $binaryString .= $binaryString8bit;
        }
        
       return $binaryString;
    }
    
    public static function toHexString(string $binary): string
    {
        return strtoupper(unpack('H*', $binary)[1]);
    }
    
    public static function toInt(string $binary): int
    {
        $binaryString = self::toBinString($binary);
        
        $int = bindec($binaryString);
        
        if ('integer' !== gettype($int)) {
            throw new \RuntimeException('Too large binary parameter');
        }
        
        return $int;
    }
}
