<?php
namespace App\Controllers;

use App\Services\User\ValidationLoginUserService;
use Src\Controller;
use App\Services\User\CreateUserService;
use App\Services\User\GetUserService;
use App\Services\User\ValidateRegistrationUserService;
use App\Services\User\SessionUserService;


class UserController extends Controller
{

    public function index()
    {
        return redirect('');
    }

    public function create()
    {
        if ( is_online() )
            return redirect('');

        return $this->view->render('user/create');
    }

    public function store()
    {
        if ( is_online() )
            return redirect('');

        if(! (new ValidateRegistrationUserService())->registerValidation())
            return redirect('?q=user/create/');

        if ( (new GetUserService())->checkUser($_POST))
            return redirect('?q=user/create/', ['errors', "Email {$_POST['email']} is already register!"]);

        if (! (new CreateUserService())->create($_POST))
            return redirect('', ['errors', 'Error to create user, please try again']);

        return redirect('', ['success', 'User successfully created!']);

    }

    public function login()
    {
        if ( is_online() )
            return redirect('');

        return $this->view->render('user/login');
    }

    public function check()
    {
        if ( is_online() )
            return redirect('');

        if(! (new ValidationLoginUserService())->loginValidation())
            return redirect('?q=user/login/');


        $user_service = new GetUserService();
        if (! $user = $user_service->checkUser($_POST))
            return redirect('?q=user/login/', ['errors', 'User not exists!']);

        if (! $user_service->checkUserPassword($user, $_POST['password']))
            return redirect('?q=user/login/', ['errors', 'Password error!']);

        (new SessionUserService())->set($user);

        return redirect('', ['success', "Wlecome, {$user->name}!"]);

    }

    public function logout()
    {

        if (! is_online())
            return redirect('?q=user/login/', ['errors', 'Please, try login!']);

        (new SessionUserService())->destroy();

        return redirect('', ['success', "Successfully logout!"]);

    }

}