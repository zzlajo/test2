<?php
namespace App\Services\User;

use App\Services\ValidationService;

class ValidateRegistrationUserService
{

    private $validator;

    public function __construct()
    {
        $this->validator = new ValidationService();
    }

    public function registerValidation()
    {
        $this->validator->required('name');
        $this->validator->required('email');
        $this->validator->required('password');
        $this->validator->required('password2');

        if (isset($_SESSION['messages']['errors']))
            return false;

        $this->validator->email('email');
        $this->validator->matchPassword('password', 'password2');


        if (isset($_SESSION['messages']['errors']))
            return false;

        return true;
    }

}