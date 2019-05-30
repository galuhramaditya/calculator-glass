<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

class CalculatorController extends Controller
{
    public function index()
    {
        return View::make("calculator");
    }
}
