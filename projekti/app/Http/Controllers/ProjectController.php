<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\User;

class ProjectController extends Controller
{
    //blokiraj dohvacanje bilo koje stranice vezane uz projekt ako korisnik nije ulogiran
    public function __construct()
    {
        $this->middleware('auth');
    }

    //prikazi listu svih projekata
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', ['projects' => $projects]);
    }

    //prikazi jedan projekt
    public function show($id)
    {
        $project = Project::findOrFail($id);

        return view('projects.show', ['project' => $project]);
    }

    //prikazi formu za stvaranje novog projetka
    public function create()
    {
        return view('projects.create');
    }

    //spremi novi projekt na bazu podataka
    public function store()
    {
        //dohvati trenutnog korisnika
        $user = User::findorFail(auth()->user()->id);

        $project = new Project();

        //dohvati iz forme
        $project->name = request('name');
        $project->description = request('description');
        $project->cost = request('cost');

        //automatski generiraj za svaki novi projekt
        $project->leader = $user->name;
        $project->finished_jobs = "-";
        $project->start_date = date("Y-m-d H:i:s"); // 2001-03-10 17:16:18
        $project->end_date = "-";

        $project->save();

        //spoji projekt na trenutnog korisnika
        $project->users()->attach($user);

        return redirect(route('projects.index'));
    }

    //obrisi projekt
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect(route('projects.index'));
    }

    //uredi projekt
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.edit', ['project' => $project]);
    }

    public function update($id)
    {
        $project = new Project();

        //projekt vec postoji i postavi id isti kao na formi
        $project->exists = true;
        $project->id = $id;

        //dohvati iz forme
        $project->name = request('name');
        $project->description = request('description');
        $project->cost = request('cost');
        $project->leader = request('leader');
        $project->finished_jobs = request('finished_jobs');
        $project->start_date = request('start_date');
        $project->end_date = request('end_date');

        $project->save();

        return redirect(route('projects.index'));
    }

    //priakzi sve korisnike
    public function show_add_user($id)
    {
        $project = Project::findOrFail($id);

        //svi korisnici osim ulogiranog
        $users = User::where('id', '!=', auth()->id())->get();
        return view('projects.add_user', compact('users', 'project'));
    }

    //dodaj vezu korisnik-projekt
    public function add_user($user_id, $project_id)
    {
        $project_user = new ProjectUser();
        $project_user->user_id = $user_id;
        $project_user->project_id = $project_id;

        $project_user->save();
        return redirect(route('projects.index'));
    }


}
