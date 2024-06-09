<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Auth;
use Dotenv\Exception\ValidationException;

class HomeController extends Controller
{
    public function index()
    {
        return redirect('/all-products');
    }
    public function showRegisterPage()
    {
        return view("home.register");
    }
    public function notUniqueUsername($username)
    {
        return User::where('username', $username)->exists();
    }
    public function notUniqueEmail($email)
    {
        return User::where('email', $email)->exists();
    }
    public function register(Request $request)
    {
        $user = $request->validate([
            'username' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $user['password'] = bcrypt($user['password']);
        if ($this->notUniqueEmail($user['email'])) {
            return redirect()->back()->with('danger', 'Email je već zauzet!');
        }
        if ($this->notUniqueUsername($user['username'])) {
            return redirect()->back()->with('danger', 'Username je već zauzet!');
        }
        User::create($user);
        return redirect('/')->with('success', 'Uspešno ste se registrovali! Sada se možete prijaviti!');
    }
    public function showLoginPage()
    {
        return view('home.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (session()->has('url')) {
                return redirect()->intended();
            }

            return redirect("/")->with('success', 'Već ste prijavljeni!');
        } else {
            return redirect()->back()->with('danger', 'Pogrešan username ili password!, pokušajte ponovo!');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }
}
