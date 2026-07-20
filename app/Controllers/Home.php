<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome');
    }

    public function viewLogin()
    {
        return view('login');
    }
}
