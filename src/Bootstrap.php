<?php
namespace Src;


use App\Controllers\HomeController;
use App\Controllers\SearchController;
use App\Controllers\UserController;


class Bootstrap
{

    private $url = null;
    private $controller = null;

    public function init()
    {

        try {
            $this->getUrl();

            if (empty($this->url)){
                $this->loadDefaultController();
            } else {
                $this->loadExistingController();
                $this->callControllerMethod();
            }
            if (isset($_SESSION['messages']))
                unset($_SESSION['messages']);

            return true;

        } catch( \Exception $e){
            $this->error($e->getCode());
        }

    }

    private function getUrl()
    {
        $url = isset($_GET['q']) ? $_GET['q'] : '/';
        $url = ltrim(rtrim($url, '/'), '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->url = $url ? explode('/', $url) : null;
    }

    private function loadDefaultController()
    {
        $this->controller = new HomeController();
        $this->controller->index();
    }

    private function loadExistingController()
    {
        $controllerClass = "App\\Controllers\\".ucfirst(strtolower($this->url[0]))."Controller";
        if (class_exists($controllerClass)){
            $this->controller = new $controllerClass;
        } else {
            $this->error(404, 'loadExitController error');
        }
    }

    private function callControllerMethod()
    {

        $length = count($this->url);

        if ($length>1 && !method_exists($this->controller, $this->url[1]))
            $this->error(404);

        switch($length) {
            case 3:
                $this->controller->{$this->url[1]}($this->url[2]);
                break;

            case 2:
                $this->controller->{$this->url[1]}();
                break;

            default:
                $this->controller->index();
                break;
        }
    }


    private function error($code, $message = 'Sorry, an error has occurred!')
    {
        $this->controller = new HomeController();
        $this->controller->error($code, $message);
        die;
    }


}