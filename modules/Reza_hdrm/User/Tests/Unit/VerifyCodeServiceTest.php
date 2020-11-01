<?php

namespace Reza_hdrm\User\Tests\Unit;

use Reza_hdrm\User\Services\VerifyCodeService;
use Tests\TestCase;

class VerifyCodeServiceTest extends TestCase
{

    public function testGeneratedCodeIs6Digit() {
        $code = VerifyCodeService::codeGenerate();
        $this->assertIsNumeric($code, 'Generated Code is not numeric');
        $this->assertLessThanOrEqual(999999, $code, 'Generated Code is Less than 999999');
        $this->assertGreaterThanOrEqual(100000, $code, 'Generated Code is Greater than 100000');
    }

    public function testVerifyCodeCanStore() {
        $code = VerifyCodeService::codeGenerate();
        VerifyCodeService::store(1, $code,120);
        $this->assertEquals($code, cache()->get('verify_code_1'));
    }
}
