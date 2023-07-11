<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        return view('app');
    }

    public function sign(){
        return view('signin');
    }

    public function store(Request $request)
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
        return redirect('/welcome')->with('success', 'Enregistrement réussi !');
    }
    public function create(){
        return view('home');
    }


    public function traitement(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials, ['table' => 'users'])) {
            return redirect()->route('get_register');
        } else {
            return redirect()->back()->withErrors(['message' => 'Identifiants invalides']);
        }
    }
}
