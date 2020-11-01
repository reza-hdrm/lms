<?php

namespace Reza_hdrm\User\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Reza_hdrm\User\Rules\ValidMobile;

class MobileValidationTest extends TestCase
{
    public function test_mobile_can_not_be_less_than_10_character(): void {
        $result = (new ValidMobile())->passes('', '939147847');
        self::assertEquals(0, $result);
    }

    public function test_mobile_can_not_be_more_than_10_character(): void {
        $result = (new ValidMobile())->passes('', '93914784711');
        self::assertEquals(0, $result);
    }

    public function test_mobile_should_start_by_9(): void {
        $result = (new ValidMobile())->passes('', '93914784711');
        self::assertEquals(0, $result);
    }
}
