<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Mail;
use App\Mail\AdminRegistered;
use App\Mail\CustomerRegistered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
     //show admin registration form
     public function showAdminRegistrationForm(Request $request)
     {
         return view('auth.admin_registration');
     }
 
     //store admin registration data
     public function register(Request $request) 
     {
         $validator = $request->validate([
             'first_name' => 'required',
             'last_name' => 'required',
             'email' => 'required|email|unique:users',
             'password' => 'required|min:8',
             'confirm_password' => 'required',
         ]);
 
         $user = new User;
         $user->role_id = 1;
         $user->first_name = $request->first_name;
         $user->last_name = $request->last_name;
         $user->email = $request->email;
         $user->password = bcrypt($request->password);
         $user->save();
                    
        // Send email
        Mail::to($user->email)->send(new AdminRegistered());

        return view('auth.login')->withSuccess('Registration Success!');
     }
 
     //show admin index in dashboard
     public function showAdmins()
     {
         $admins = User::where('role_id', 1)->get();
         return view('admin_index', compact('admins'));
     }
 
     //show customer registration form
     public function showCustomerRegistrationForm(Request $request)
     {
 
         return view('auth.customer_registration');
     }
 
     //store customer registration data
     public function customerRegister(Request $request)
     {
         $validator = $request->validate([
             'first_name' => 'required',
             'last_name' => 'required',
             'email' => 'required|email|unique:users',
             'password' => 'required|min:8',
             'confirm_password' => 'required',
         ]);
 
         $user = new User;
         $user->role_id = 2;
         $user->first_name = $request->first_name;
         $user->last_name = $request->last_name;
         $user->email = $request->email;
         $user->password = bcrypt($request->password);
         $user->save();
             
        // Send email
        Mail::to($user->email)->send(new CustomerRegistered());

        return redirect()->back()->withSuccess('Registration Success! Login Here!');
     }
 
     //show customer index in dashboard 
     public function showCustomers()
     {
         $customers = User::where('role_id', 2)->get();
         return view('customer_index', compact('customers'));
     }
     
     //show login form
     public function showLoginForm()
     {
         return view('auth.login');
     }
 
     //check login credentials
     public function login(Request $request)
     {
         $request->validate([
             'email' => 'required|email',
             'password' => 'required',
         ]);
 
         $credentials = $request->only('email', 'password');
 
         if (Auth::attempt($credentials)) 
         {
             if (Auth::user()->role_id == 1) 
             {
                 return redirect()->route('dashboard')->withSuccess('You have Successfully logged in');
             } 
             else 
             {
                 Auth::logout();
                 return redirect()->route('login')->withSuccess('You are not allowed to login from here');
             }
         }
         return redirect()->route('login')->withSuccess('Oops! You have entered invalid credentials');
     }
 
     //show dashboard
     public function dashboard()
     {
         return view ('dashboard');
     }
 
     //logout 
     public function logout() 
     {
         Session::flush();
         Auth::logout();
   
         return Redirect('/')->withSuccess('Great! You have Successfully logged out');;
     }
 
}
