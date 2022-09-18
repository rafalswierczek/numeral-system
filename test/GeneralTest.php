<?php

namespace rafalswierczek\NumeralSystem;

require dirname(__DIR__).'/vendor/autoload.php';

class GeneralTest
{
    public function testAllMethods()
    {
        $binary = random_bytes(4);

        $hexStringBC = BinConverter::toHexString($binary);
        $binaryStringHSC = HexStringConverter::toBinString($hexStringBC);
        $hexStringBSC = BinStringConverter::toHexString($binaryStringHSC);
        $intHSC = HexStringConverter::toInt($hexStringBSC);
        $hexStringIC = IntConverter::toHexString($intHSC);
        $binaryHSC = HexStringConverter::toBin($hexStringIC);
        $binaryBSC = BinStringConverter::toBin($binaryStringHSC);
        $binaryIC = IntConverter::toBin($intHSC);
        $binaryStringIC = IntConverter::toBinString($intHSC);
        $binaryStringBC = BinConverter::toBinString($binaryHSC);
        $intBC = BinConverter::toInt($binaryIC);
        $intBSC = BinStringConverter::toInt($binaryStringIC);

        print_r(($binaryHSC === $binaryBSC && $binaryHSC === $binaryIC ? 'OK' : 'ERROR') . ' | binary: HSC === BSC === IC');
        echo "\n";

        print_r(($binaryStringBC === $binaryStringHSC && $binaryStringBC === $binaryStringIC ? 'OK' : 'ERROR') . ' | binary string: BC === HSC === IC');
        echo "\n";

        print_r(($hexStringBC === $hexStringBSC && $hexStringBC === $hexStringIC ? 'OK' : 'ERROR') . ' | hex string: BC === BSC === IC');
        echo "\n";

        print_r(($intBSC === $intHSC && $intBSC === $intBC ? 'OK' : 'ERROR') . ' | int: BSC === HSC === BC');
    }
}

(new GeneralTest())->testAllMethods();
