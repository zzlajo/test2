<?php
namespace App\Services\Search;

use App\Services\ValidationService;

class ValidationSearchService
{

    private $validator;

    public function __construct()
    {
        $this->validator = new ValidationService();
    }

    public function searchValidation()
    {
        $this->validator->required('query');
        if (isset($_SESSION['messages']['errors']))
            return false;

        $this->validator->min('query', 3);
        if (isset($_SESSION['messages']['errors']))
            return false;

        return true;
    }

}