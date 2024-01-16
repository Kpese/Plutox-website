<?php 
namespace App\controllers;
use App\core\View;

class HomeController{
    public function index(){
        View::Load('home');
    }
}