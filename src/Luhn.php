<?php

class Luhn
{
    protected $valid = true;
    protected $number = '';
    protected $message = '';

    public function __construct($val)
    {
        $this->number = $val;
    }

    /**
     * Calculate if number is valid Luhn
     * 
     * https://en.wikipedia.org/wiki/Luhn_algorithm
     * 
     * @return mixed 
     */
    public function isValid()
    {
        if (empty($this->number) || !is_numeric($this->number) || $this->number < 0) {
            // invalid input
            $this->message = "You must input a valid number.";
            $this->valid = false;
        } else {
            // get length (number of digits)
            $length = strlen($this->number);

            // keep original number intact (for response)
            $num = $this->number;

            // flip number if even
            if ($length % 2 == 0) {
                $num = strrev($this->number);
            }

            $sum = 0;
            // loop through each digit (e.g. 123 > 1, 2, 3)
            for ($i = 0; $i < $length; $i++) {
                $digit = $num[$i];

                // multiply every second digit by 2 (e.g. $i[1], $i[3])
                if ($i % 2) {
                    $digit *= 2;

                    // if the sum is two digits, add them together
                    if ($digit > 9) {
                        $digit -= 9;
                    }
                }

                // get the sum of all digits
                $sum += $digit;
            }

            // check if valid (multiple of 10)
            if ($sum % 10 == 0) {
                // valid
                $this->message = $this->number . ' is valid.';
            } else {
                // invalid
                $this->message = $this->number . ' is invalid.';
                $this->valid = false;
            }
        }

        return $this->valid;
    }

    /**
     * Gets the message (set from isValid)
     * 
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }
}
