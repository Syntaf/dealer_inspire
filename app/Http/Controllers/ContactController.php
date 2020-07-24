<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * 
     * @return void 
     */
    public function create(ContactRequest $request)
    {
        $data = $request->validated();
    }
}
