<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{


    public function index()
    {
        $user = Auth::user();
        return view('home', [
            'taches_en_cours' => Task::where('etat', 'en cours')->where('user_id', $user->id)->get(),
            'taches_terminées' => Task::where('etat', 'terminée')->where('user_id', $user->id)->get(),

        ]);
    }

    public function signup()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        /*try {
            $user = User::make($request->all());
            $user->save();

            return redirect()->route('get_register')->with('success', 'Succès');
        } catch (\Throwable $th) {
            return redirect()->route('get_register')->with('error', 'Une erreur a été rencontrée');
        }*/
        $this->validate($request, [
            'name' => 'required',
            'firstName' => 'required',
            'email' => 'required|email|unique:users',
            'contact' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'firstName' => $request->input('firstName'),
            'email' => $request->input('email'),
            'contact' => $request->input('contact'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Redirection après l'enregistrement réussi
        return redirect()->route('index')->with('success', 'Enregistrement réussi !');
    }

    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials, ['table' => 'users'])) {
            return redirect()->route('get_register');
        } else {
            return redirect()->back()->withErrors(['message' => 'Identifiants invalides']);
        }
    }
}
