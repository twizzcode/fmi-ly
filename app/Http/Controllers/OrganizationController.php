<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
{
    
    $departements = \App\Models\OrganizationStructure::all();
    
    $title = \App\Models\Setting::where('key', 'org_title')->value('value') ?? 'Kepengurusan FMI 2024';

    return view('struktur', compact('departements', 'title'));
}
}
