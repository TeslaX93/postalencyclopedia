<?php

namespace App\Tests\Utils;

use App\Utils\Ean128Verifiers;
use PHPUnit\Framework\TestCase;

class Ean128VerifiersTest extends TestCase
{
    public function testEan128Verifiers(): void
    {
        $code[0] = "RR198651213PL";
        $code[1] = "198651213";
        $code[2] = "ABCD";
        $eanVerifier = new Ean128Verifiers();

        $this->assertTrue($eanVerifier->internationalRegisteredChecksumVerifier($code[0]));
        $this->assertTrue($eanVerifier->internationalRegisteredChecksumVerifier($code[1]));
        $this->assertFalse($eanVerifier->internationalRegisteredChecksumVerifier($code[2]));
    }
}