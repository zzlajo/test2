<?php
namespace App\Controllers;

use Src\Controller;
use App\Services\User\GetUserService;
use App\Services\Search\ValidationSearchService;

class SearchController extends Controller
{

    public function index()
    {
        $this->view->render('search/index');
    }

    public function result()
    {

        if (! (new ValidationSearchService())->searchValidation())
            return redirect('?q=search/index/');

        $users = (new GetUserService())->search($_POST);
        $this->view->render('search/result', compact('users'));
    }

}