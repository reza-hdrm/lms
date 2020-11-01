<?php

namespace Reza_hdrm\User\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Reza_hdrm\User\Rules\ValidPassword;

class PasswordValidationTest extends TestCase
{
    public function test_password_should_not_be_less_than_6_character(): void {
        $result = (new ValidPassword())->passes('', 'A12a!');
        self::assertEquals(0, $result);
    }

    public function test_password_should_include_sign_character(): void {
        $result = (new ValidPassword())->passes('', 'A12aaaa5');
        self::assertEquals(0, $result);
    }

    public function test_password_should_include_digit_character(): void {
        $result = (new ValidPassword())->passes('', 'A@!sdfdf');
        self::assertEquals(0, $result);
    }

    public function test_password_should_include_capital_character(): void {
        $result = (new ValidPassword())->passes('', 'd1@!sdfdf');
        self::assertEquals(0, $result);
    }

    public function test_password_should_include_small_character(): void {
        $result = (new ValidPassword())->passes('', 'A33!245D');
        self::assertEquals(0, $result);
    }

    public function test_password_should_be_validated(): void {
        $result = (new ValidPassword())->passes('', 'Aaa33!245D');
        self::assertEquals(1, $result);
    }
}
