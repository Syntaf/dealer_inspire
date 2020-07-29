<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Inquiry;
use App\Mail\InquiryReceived;
use Exception;
use Illuminate\Support\Facades\Mail;

class InquiryController extends Controller
{
    /**
     * Validates and creates a new Inquiry entity.
     */
    public function create(ContactRequest $request)
    {
        $inquiry = new Inquiry();

        $inquiry->fill($request->all());
        $inquiry->save();

        Mail::to($inquiry->email)->queue(new InquiryReceived($inquiry));

        return response()->json([
            'status' => 'success',
            'inquiry' => $inquiry
        ]);
    }
}
