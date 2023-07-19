<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function addtask(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required']);
        try {

        $user = Auth::user();
        $tache = Task::make($request->all());
        $tache->user()->associate($user);
        $tache->save();
        $taches = Task::all();

        return redirect()->route('get_register')->with('success', 'Succès');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Une erreur a été rencontrée');
        }

    }
    public function updateTask(int $id)
    {
        $tache = Task::find($id);
        if ($tache == null) {
            return redirect()->back();
        }
        $tache->update(['terminee' => true]);

        return redirect()->back();
    }
    public function deleteTask($id)
    {
        try {
            echo('Voulez-vous vraiment supprimer cette tache?
           <span> <i class="fa-regular fa-check"></i>Oui</span>');
            Task::destroy($id);
            return redirect()->back()->with('message', 'La tache a été supprimée avec succès.');
                } catch (\Throwable $th) {
           return redirect()->back()->with('message','Erreur');
   };
}
}
