<?php

namespace App\Helpers;

class FlashMessage
{
    const SUCCESS_TYPE = 'success';
    const FAILURE_TYPE = 'failure';
    public static function set(string $message, bool $success = true): void {
        $_SESSION['message'] = ['content' => $message, 'type' => $success ? self::SUCCESS_TYPE : self::FAILURE_TYPE];
    }

    public static function get()
    {
        if (isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
            unset($_SESSION['message']);
            return $message;
        }
        return null;
    }
}