<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserApiController extends Controller
{
    public function create(Request $request)
    {

        
      
       
        

        if(!empty($request->input('id'))){
            $validatedData = $this->validateWithID($request);
            $users = User::where('id',$request->input('id'))->first();
        }else{
            $validatedData = $this->validateWithoutID($request);
            $users = new User();
        }
     
        if ($validatedData->fails()) {
            \Session::flash('message', $validatedData->errors()); 
            return redirect('register');      
          
        }   
       
        
        
        $dob = $request->input('dob');  
        $DOB = date("Y-m-d", strtotime($dob)); 
        $users->salutation = $request->input('salutation');
        $users->fname = $request->input('fname');
        $users->lname = $request->input('lname');
        $users->email = $request->input('email');
        $users->gender = $request->input('gender');
        $users->occuption = $request->input('occuption');
        $users->password = bcrypt($request->input('password'));
        $users->contact_no = $request->input('contact_no');
        $users->mob_no = $request->input('mob_no');
        $users->role_id = $request->input('role_id');
        $users->dob = $DOB;
        $users-> save();
        if(!empty($users->id)){
         \Session::flash('message', 'User Registered Successfully!!!'); 

        }else{
            \Session::flash('alert-class', 'alert-danger');
        }
        // return redirect()->route('register');
        return redirect('register'); 

    }


   public function validateWithoutID($request){

    return \Validator::make($request->all(),[

        'fname' => 'required|min:2|max:50',

        'lname' => 'required|min:2|max:50',

        'contact_no' => 'required', 
        
        'mob_no' => 'required',
        
        'email' => 'required|email|unique:users',

        'password' => 'required|min:6',   
        
        'gender' => 'required',

        'occuption' => 'required',

        'role_id' => 'required',

        'confirm_password' => 'required|min:6|max:20|same:password',

    ], [

        'fname.required' => 'Name is required',

        'fname.min' => 'Name must be at least 2 characters.',

        'fname.max' => 'Name should not be greater than 50 characters.',

        'lname.required' => 'Name is required',

        'lname.min' => 'Name must be at least 2 characters.',

        'lname.max' => 'Name should not be greater than 50 characters.',


    ]);

   }

   public function validateWithID($request){

    return \Validator::make($request->all(),[

        'fname' => 'required|min:2|max:50',

        'lname' => 'required|min:2|max:50',

        'contact_no' => 'required', 
        
        'mob_no' => 'required',
        
        'email' => 'required|email',

        'password' => 'required|min:6',   
        
        'gender' => 'required',

        'occuption' => 'required',

        'role_id' => 'required',

        'confirm_password' => 'required|min:6|max:20|same:password',

    ], [

        'fname.required' => 'Name is required',

        'fname.min' => 'Name must be at least 2 characters.',

        'fname.max' => 'Name should not be greater than 50 characters.',

        'lname.required' => 'Name is required',

        'lname.min' => 'Name must be at least 2 characters.',

        'lname.max' => 'Name should not be greater than 50 characters.',


    ]);

   }
}
