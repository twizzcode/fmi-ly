<?php

namespace App\Http\Controllers;

use App\Models\LinkService;
use App\Models\Department;  
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    
        $semua_link = LinkService::all(); 

        $departments = Department::all();
        
        return view('home', compact('semua_link', 'departments'));
        
    }
}