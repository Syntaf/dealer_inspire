<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Inquiry;

class ContactController extends Controller
{
    /**
     * Validates and creates a new contact entity.
     */
    public function create(ContactRequest $request)
    {
        $inquiry = new Inquiry();

        $inquiry->fill($request->all());
        $inquiry->save();
    }
}
