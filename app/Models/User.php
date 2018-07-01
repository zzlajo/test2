<?php
namespace App\Models;


use Src\Model;

class User extends Model
{

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password'
    ];

}