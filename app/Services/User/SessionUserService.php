<?php
namespace App\Services\User;


use App\Services\User\Contract\SessionUserInterface;

class SessionUserService implements SessionUserInterface
{

    public function set($user)
    {
        $_SESSION['user_data'] = [
            "name"  => $user->name,
            "email" => $user->email
        ];

    }

    public function destroy()
    {
        unset($_SESSION['user_data']);
//        session_destroy();
    }
}