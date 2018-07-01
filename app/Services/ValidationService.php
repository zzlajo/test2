<?php
namespace App\Services;

class ValidationService
{


    public function required($name)
    {
        if (! isset($_GET[$name]) && ! isset($_POST[$name])) {
            $_SESSION['messages']['errors'][] = "{$name} is required!";

            return true;
        }

        $var = $_SERVER['REQUEST_METHOD'] !== 'POST' ? $_GET[$name] : $_POST[$name];

        if (trim($var) == '') {
            $_SESSION['messages']['errors'][] = "{$name} is required!";
        }

        return true;
    }


    public function min($name, $length)
    {
        $var = $_SERVER['REQUEST_METHOD'] !== 'POST' ? $_GET[$name] : $_POST[$name];
        $var = trim($var);

        if ($var) {

            $type = gettype(is_numeric($var) ? (int) $var : $var);

            switch ($type) {
                case 'integer':
                    if($var < $length) {
                        $_SESSION['messages']['errors'][] = "{$name} needs to be min: {$length}!";
                    }
                    break;
                case 'string':
                    if(strlen($var) < $length) {
                        $_SESSION['messages']['errors'][] = "{$name} needs to be min: {$length}!";
                    }
                    break;
            }
        }

        return true;
    }


    public function email($email)
    {
        $var = $_SERVER['REQUEST_METHOD'] !== 'POST' ? $_GET[$email] : $_POST[$email];

        if (! filter_var($var, FILTER_VALIDATE_EMAIL))
            $_SESSION['messages']['errors'][] = "{$var} in not a valid email address.";

        return true;
    }

    public function matchPassword($password1, $password2)
    {
        $password1 = $_SERVER['REQUEST_METHOD'] !== 'POST' ? $_GET[$password1] : $_POST[$password1];
        $password2 = $_SERVER['REQUEST_METHOD'] !== 'POST' ? $_GET[$password2] : $_POST[$password2];

        if ($password1 !== $password2)
            $_SESSION['messages']['errors'][] = "Password do not match.";

        return true;

    }


}