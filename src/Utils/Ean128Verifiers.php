<?php

namespace App\Utils;

class Ean128Verifiers
{
    /**
     * @param  string $code
     * @return bool
     */
    public function internationalRegisteredChecksumVerifier(string $code): bool
    {
        if(strlen($code) == 13) {
            $codeNumbers = substr($code, 2, 9);
        } else {
            $codeNumbers = $code;
        }
        if(!is_numeric($codeNumbers) || strlen($codeNumbers) !=9) {
            return false;
        } else {
            $weight = [8,6,4,2,3,5,9,7];
            $codeNumbers = str_split($codeNumbers);
            $checksum = 0;
            foreach($weight as $ix=>$w) {
                $checksum += ($w*$codeNumbers[$ix]);
            }
        }
        if($checksum%11 == 0) { $checksum = 5;
        } elseif($checksum%11 == 1) {
            $checksum = 0;
        } else {
            $checksum = 11 - $checksum%11;
        }

        if($codeNumbers[8] == $checksum) {
            return true;
        } else {
            return false;
        }
    }
}
