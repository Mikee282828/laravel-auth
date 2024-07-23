<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Mail\NewLeadMessage;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        //validate the user inputs

        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        //check if you have validation errors and return them as json
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        //save the lead into the database

        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();

        Mail::to('info@boolean')->send(new NewLeadMessage($newLead));

        return response()->json([
            'success' => true,
        ]);
    }
}
