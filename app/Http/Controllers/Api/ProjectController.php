<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json([
            'projects' => Project::orderByDesc('id')->paginate()
        ]);
    }
    public function show($id)
    {
        $projects = Project::where('id',$id)->first();
        if ($projects) {
            return response()->json([
                'success' => true,
                'projects' => $projects
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => '404 page not found'
            ]);
        }
    }
}
