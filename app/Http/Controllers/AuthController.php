<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('crud.login',  [
            'title' => 'Login Page',
        ]);
    }

    public function register()
    {
        return view('crud.register', [
            'title' => 'Register Page',
        ]);
    }

    public function addreg(Request $request)
    {
        //Validate the request post
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email:dns',
            'password' => 'required|min:3',
            'as' => 'required',
            'address' => 'required|max:255',
            'bio' => 'max:255',
            'image' => 'image|file|max:1024'
        ]);

        $email = $validated['email']; //Make var email for use(....) , error when use var $validated[..]

        //Check there is a input file(img)
        if ($request->file('profilepic')) {
            //If true then store it to public/storage/profile-pic/....
            $validated['image'] = $request->file('profilepic')->store('profile-pic');
        } else {
            //If not give the default picture
            $validated['image'] = 'placeholder.jpg';
        }

        //Hash password before add to DB
        $validated['password'] = bcrypt($validated['password']);

        //Send and save to DB Users
        User::create($validated);

        //Send SMTP to user email after registration success
        Mail::send('layout.email_template',  $validated, function ($mail) use ($email) {
            $mail->to($email, 'no-reply')
                ->subject('Information Account');
            $mail->from('akun2ndmulhb@gmail.com', 'Laravel-SMTP');
        });
        if (Mail::failures()) {
            return redirect('login')->with('authfalse', 'Registration complete, but Sorry we have problem to send you an email');
        }
        return redirect('login')->with('success', 'Registration complete, check your email!');
    }

    public function auth(Request $request)
    {
        //Validate the data request post
        $validated = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        //Using auth system from laravel to check, if true redirect to dashboard and make session
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        //If auth false then back to login page and send message
        return back()->with([
            'authfalse' => 'LOGIN FAILED!',
        ]);
    }

    public function authlogout(Request $request)
    {
        //Logout account delete session data and csrf
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logged Out!');;
    }
}
