<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function addtask(Request $request)
    {
        /*try {*/

        $user = Auth::user();
        $tache = Task::make($request->all());
        $tache->etat = "en cours";
        $tache->user()->associate($user);
        $tache->save();
        $taches = Task::all();

        return redirect()->route('get_register')->with('success', 'Succès');
        /*} catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Une erreur a été rencontrée');
        }*/
    }
    public function updateTask(int $id)
    {
        $tache = Task::find($id);
        if ($tache == null) {
            return redirect()->back();
        }
        $tache->update(['etat' => 'terminée']);

        return redirect()->back();
    }
}
