<?php

namespace App\Http\Controllers;



use App\Models\Task;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;


class UsersController extends Controller
{


    public function index()
    {
        $user = Auth::user();
        return view('home', [
            'taches_en_cours' => Task::where('terminee', false)->where('user_id', $user->id)->get(),
            'taches_terminées' => Task::where('terminee', true)->where('user_id', $user->id)->get(),

        ]);
    }

    public function signup()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'firstName' => 'required',
            'email' => 'required|email|unique:users',
            'contact' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);
        try {


            $user = User::create([
                'name' => $request->input('name'),
                'firstName' => $request->input('firstName'),
                'email' => $request->input('email'),
                'contact' => $request->input('contact'),
                'password' => bcrypt($request->input('password')),
            ]);

            // Redirection après l'enregistrement réussi
            return redirect()->route('index')->with('success', 'Enregistrement réussi !');
        } catch (\Throwable $th) {
            return redirect()->route('get_register')->with('error', 'Une erreur a été rencontrée');
        }
    }

    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials, ['table' => 'users'])) {
            return redirect()->route('get_register');
        } else {
            return redirect()->back()->withErrors(['message' => 'Identifiants invalides']);
        }
    }

    public function logout(Request $request): RedirectResponse
    {

        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
