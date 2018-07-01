<?php
namespace App\Services\User\Contract;


interface GetUserInterface
{

    public function checkUser($data);

    public function checkUserPassword($user, $password);

    public function search($data);


}