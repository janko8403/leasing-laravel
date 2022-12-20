<?php
namespace App\Isop;

use App\User;

class Isop
{
    public function greet($id)
    {
        $user = User::where('id', $id)->first();
        return $user->surname;
    }
}