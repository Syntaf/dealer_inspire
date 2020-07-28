<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Inquiry;
use Exception;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Validates and creates a new contact entity.
     *
     * @return void 
     */
    public function create(ContactRequest $request)
    {
        $inquiry = new Inquiry();

        $inquiry->fill($request->all());
        $inquiry->save();
    }
}
