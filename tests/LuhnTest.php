<?php

use PHPUnit\Framework\TestCase;

class LuhnTest extends TestCase
{
    public function testValidValues()
    {
        $numbers = [
            '79927398713',
            '371449635398431',
            '30569309025904',
            '6011111111111117',
            '3530111333300000'
        ];
        foreach ($numbers as $number) {
            $luhn = new Luhn($number);
            $this->assertTrue($luhn->isValid());
        }
    }

    public function testInvalidValues()
    {
        $numbers = [
            '79927398710',
            '371449635398432',
            '30569309025902',
            '6011111111111112',
            '3530111333300002'
        ];
        foreach ($numbers as $number) {
            $luhn = new Luhn($number);
            $this->assertNotTrue($luhn->isValid());
        }
    }
}
