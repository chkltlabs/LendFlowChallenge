<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ISBN implements Rule
{
    public $regex;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        // referenced from https://www.oreilly.com/library/view/regular-expressions-cookbook/9781449327453/ch04s13.html
        $this->regex = "/^" .
            //"(?:ISBN(?:-1[03])?:?\ )?" .  # Optional ISBN/ISBN-10/ISBN-13 identifier. //NYT does not allow prefix identifiers
            "(?=" .                       # Basic format pre-checks (lookahead):
            "[0-9X]{10}$" .               #   Require 10 digits/Xs (no separators).
            "|" .                         #  Or:
            "(?=(?:[0-9]+[-\ ]){3})" .    #   Require 3 separators
            "[-\ 0-9X]{13}$" .            #     out of 13 characters total.
            "|" .                         #  Or:
            "97[89][0-9]{10}$" .          #   978/979 plus 10 digits (13 total).
            "|" .                         #  Or:
            "(?=(?:[0-9]+[-\ ]){4})" .    #   Require 4 separators
            "[-\ 0-9]{17}$" .             #     out of 17 characters total.
            ")" .                         # End format pre-checks.
            "(?:97[89][-\ ]?)?" .         # Optional ISBN-13 prefix.
            "[0-9]{1,5}[-\ ]?" .          # 1-5 digit group identifier.
            "[0-9]+[-\ ]?[0-9]+[-\ ]?" .  # Publisher and title identifiers.
            "[0-9X]" .                    # Check digit.
            "$/";
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $array = explode(';', $value);
        foreach ($array as $isbn) {
            if (!preg_match($this->regex, $isbn)) {
                return false;
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a semicolon delimited string of 10 or 13 digit valid ISBNs.';
    }
}
