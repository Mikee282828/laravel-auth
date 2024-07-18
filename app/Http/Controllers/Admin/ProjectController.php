<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\LanguageProject;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'projects' => Project::orderByDesc('id')->paginate()
        ];
        return view('admin.projects.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'types' => Type::all(),
            'languages' => Language::all()
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
            'img_preview'=>'nullable|image',
            'type_id'=>'required',
            'language_id'=>'nullable',
            'language_id.*'=>'numeric|integer|min:0|max:6'
        ]);

        if($request->has('img_preview')){
            $img_path = Storage::put('upload',$data['img_preview']); //salva il percorso
            $data['img_preview'] = $img_path;
        }   

        $newProject = new Project();
        $newProject->fill($data);
        $newProject->save();
        $newProject->languages()->sync($data['language_id']);

        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $data = [
            "projects" => $project,
            // "setLanguages" => LanguageProject::where('project_id',$project->id)->get()
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
            'types' => Type::all(),
            'languages'=> Language::all(),
            // 'setLanguages' => LanguageProject::where('project_id',$project->id)->get()
        ];
        // dd($data['setLanguages']);
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
        // $project->languages()->detach();
        if($project->img_preview && !Str::startsWith($project->img_preview,'http')){
            Storage::delete($project->img_preview);
        }
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
