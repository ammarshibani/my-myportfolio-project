<?php

namespace App\Http\Controllers;

use App\Models\Certificate;

class CertificatesController extends Controller
{
    public function index()
    {
    $certificates = Certificate::orderBy('date', 'desc')->get();
    $issuers = Certificate::select('issuer_en')->distinct()->pluck('issuer_en');
    
    return view('certificates', compact('certificates', 'issuers'));
    }
}