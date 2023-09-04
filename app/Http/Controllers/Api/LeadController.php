<?php

namespace App\Http\Controllers\Api;

use App\Mail\NewContact;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLeadRequest;

use App\Models\Lead;

class LeadController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
    
        $validator = Validator::make($data, [
            'name'  => 'required',
            'email'  => 'required|email',
            'content' => 'required'
        ]);
    
     
        if($validator->fails()){
        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ]);
        }
    
   
        $new_lead = new Lead();
        $new_lead->fill($data);                    
        $new_lead->save();
    

        Mail::to('contact@petdesk.com')->send(new NewContact($new_lead)); 
    

        return response()->json([
            'success' => true,
        ]);
        
    }
}



