<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Inquiry;
use App\Mail\InquiryReceived;
use Illuminate\Support\Facades\Mail;

class InquiryController extends Controller
{
    /**
     * Validates and creates a new contact entity.
     */
    public function create(ContactRequest $request)
    {
        $inquiry = new Inquiry();

        $inquiry->fill($request->all());
        
        if ($inquiry->save()) {
            Mail::to($inquiry->email)
                ->queue(new InquiryReceived($inquiry));
        }

    }
}
