<?php

declare(strict_types=1);

namespace rafalswierczek\NumeralSystem;

final class HexStringConverter
{
    private const BIN_TABLE = [
        '0' => '0000',
        '1' => '0001',
        '2' => '0010',
        '3' => '0011',
        '4' => '0100',
        '5' => '0101',
        '6' => '0110',
        '7' => '0111',
        '8' => '1000',
        '9' => '1001',
        'A' => '1010',
        'B' => '1011',
        'C' => '1100',
        'D' => '1101',
        'E' => '1110',
        'F' => '1111',
        'a' => '1010',
        'b' => '1011',
        'c' => '1100',
        'd' => '1101',
        'e' => '1110',
        'f' => '1111'
    ];
    
    public static function toBin(string $hexString): string
    {
        self::validate($hexString);
        
        return pack('H*', $hexString);
    }
    
    public static function toBinString(string $hexString): string
    {
        self::validate($hexString);
        
        $binString = '';
    
        for ($count = strlen($hexString), $i = 0; $i < $count; $i++) {
            $binString .= self::BIN_TABLE[$hexString[$i]];
        }
        
        return $binString;
    }

    public static function toInt(string $hexString): int
    {
        self::validate($hexString);
        
        return hexdec($hexString);
    }
    
    private static function validate(string $hexString): void
    {
        if (preg_match('/[^0123456789abcdefABCDEF]/', $hexString)) {
            throw new \RuntimeException('Invalid hex string parameter');
        }
    }
}
