<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Models\ContactForm;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function create()
    {
        return view('auth.contact');
    }

    public function store(ContactFormRequest $request)
    {
        $data = $request->validated();  

        ContactForm::create($data);
        
        return redirect()->route('login')->with('success','Contact Form submitted & Admin will contact soon!!!');
    }
}
