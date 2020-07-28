<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Inquiry;
use App\Jobs\EmailInquiry;

use Illuminate\Support\Facades\Log;

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
            EmailInquiry::dispatch($inquiry);
        }
    }
}
