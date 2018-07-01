<?php
namespace App\Services\User;

use App\Services\User\Contract\GetUserInterface;
use App\Models\User;

class GetUserService implements GetUserInterface
{

    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function checkUser($data)
    {

        $user = $this->user
            ->where('email', '=', $data['email'])
            ->get();

        if (! isset($user[0]))
            return false;

        return $user[0];

    }

    public function checkUserPassword($user, $password)
    {
        return password_verify($password, $user->password);
    }

    public function search($data)
    {
        $users = $this->user
            ->select('name', 'email', 'created_at')
            ->where('email', 'LIKE', '%'.$data['query'].'%')
            ->orWhere('name', 'LIKE', '%'.$data['query'].'%')
            ->get();

        return $users;
    }
}