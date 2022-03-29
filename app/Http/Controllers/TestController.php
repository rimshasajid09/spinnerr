<?php

namespace App\Http\Controllers;

use App\Imports\BarcodeImport;
use App\Mail\Frontend\UserRegisteredEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TestController extends Controller
{
    public function index(Request $request)
    {
    }
}
