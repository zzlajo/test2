<?php
namespace App\Services\User;

use App\Services\User\Contract\CreateUserInterface;
use App\Models\User;

class CreateUserService implements CreateUserInterface
{

    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function create($data)
    {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        return $this->user->create($data);
    }

}