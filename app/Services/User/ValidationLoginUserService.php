<?php
namespace App\Services\User;

use App\Services\ValidationService;

class ValidationLoginUserService
{

    private $validator;

    public function __construct()
    {
        $this->validator = new ValidationService();
    }

    public function loginValidation()
    {
        $this->validator->required('email');
        $this->validator->required('password');
        if (isset($_SESSION['messages']['errors']))
            return false;

        $this->validator->email('email');
        if (isset($_SESSION['messages']['errors']))
            return false;

        return true;
    }

}