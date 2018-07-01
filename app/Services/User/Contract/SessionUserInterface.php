<?php
namespace App\Services\User\Contract;


interface SessionUserInterface
{

    public function set($user);

    public function destroy();

}