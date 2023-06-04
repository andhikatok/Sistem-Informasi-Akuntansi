<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company', [
            "title" => "COMPANY",
            "name" => "Andhika Wira S",
            "email" => "awirasakti18@gmail.com",
            "image" => "gambar.jpg"
        ]);
    }
}
