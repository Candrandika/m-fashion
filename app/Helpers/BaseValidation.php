<?php


namespace App\Helpers;

class BaseValidation {

    public static function InvalidCharacter()
    {
        return [
            '<script',
            '</script>',
            '<iframe',
            '</iframe>',
        ];
    }

}