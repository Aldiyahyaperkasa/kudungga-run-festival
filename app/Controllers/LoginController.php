<?php
namespace App\Controllers;

use App\Models\PesertaModel;
use App\Models\AdminModel;
use App\Models\AdminScanModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('home/login');
    }
}