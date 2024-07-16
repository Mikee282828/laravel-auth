<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'projects' => Project::all()
        ];
        return view('admin.projects.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'types' => Type::all()
        ];
        return view('admin.projects.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required',
            'description'=>'required|min:10|max:255',
            'img_preview'=>'required',
            'type_id'=>'required'
        ]);

        $newProject = new Project();

        $newProject->fill($data);
        $newProject->save();
        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $data = [
            "projects" => $project
        ];
        return view("admin.projects.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $data = [
            'project' => $project,
            'types' => Type::all()
        ];
        return view('admin.projects.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title'=>'required',
            'description'=>'required|min:10|max:255',
            'img_preview'=>'required'
        ]);

        $project->update($data);

        return redirect()->route('admin.projects.index', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
