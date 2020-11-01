<?php


namespace Reza_hdrm\User\Services;


use Psr\SimpleCache\InvalidArgumentException;

class VerifyCodeService
{
    private static  $min = 100000;
    private static $max = 999999;
    private static $prefix = 'verify_code_';

    public static function codeGenerate(): int {
        try {
            return random_int(self::$min, self::$max);
        } catch (\Exception $e) {
            $e->getTrace();
        }
    }

    public static function store(int $id, int $code, $time) {
        try {
            cache()->set(self::$prefix . $id, $code, $time);
        } catch (InvalidArgumentException $e) {
            $e->getTrace();
        } catch (\Exception $e) {
            $e->getTrace();
        }
    }

    public static function get(int $id): int {
        try {
            $code=cache()->get(self::$prefix . $id);
            if(is_null($code))
                return 0;
            return $code;
        } catch (\Exception $e) {
            $e->getTrace();
        }
    }

    public static function delete(int $id): bool {
        try {
            return cache()->delete(self::$prefix . $id);
        } catch (InvalidArgumentException $e) {
            $e->getTrace();
        }
    }

    public static function getRule(): string {
        return 'required|numeric|between:' . self::$min . ',' . self::$max;
    }

    public static function check(int $id, int $code): bool {
        if (self::get($id) != $code) {
            return false;
        }
        self::delete($id);
        return true;
    }

    public static function has(int $id): bool {
        try {
            return cache()->has(self::$prefix . $id);
        } catch (InvalidArgumentException $e) {
            $e->getTrace();
        } catch (\Exception $e) {
            $e->getTrace();
        }
    }
}
