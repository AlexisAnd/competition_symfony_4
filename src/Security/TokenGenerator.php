<?php
/**
 * Created by PhpStorm.
 * User: sfrma
 * Date: 04/01/2019
 * Time: 17:20
 */

namespace App\Security;


class TokenGenerator
{

    public function createToken(int $length)
    {
        $value = bin2hex(random_bytes($length/2));
        return $value;
    }

}