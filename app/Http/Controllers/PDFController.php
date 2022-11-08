<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Customer;
use Barryvdh\DomPDF\Facade;
use Barryvdh\DomPDF\Facade\Pdf;



class PDFController extends Controller
{
    public function preview()
    {
        $customers = Customer::all();
        return view('preview' ,compact('customers'));
    }
    public function generatePDF()
    {
        $customers = Customer::all();
        
        $pdf = PDF::loadView('preview', ['customer' => $customers]);    
        return $pdf->download('demo.pdf');
    }
}
