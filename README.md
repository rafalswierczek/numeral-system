# Simple numeral system conversion

### Supported systems are binary, hexagonal and decimal.

### **Possible methods are:**

1. `toBin` - converts data to binary:
> ��
2. `toBinString` - converts data to binary string:
> 1010000011001111
3. `toHexString` - converts data to hexagonal string:
> A0CF
4. `toInt` - converts data to positive integer:
> 41167

### **Usage:**

```php
// in this example initial value is binary but it can be any of four above
$binary = random_bytes(4);

// all possible methods are used:
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
```
