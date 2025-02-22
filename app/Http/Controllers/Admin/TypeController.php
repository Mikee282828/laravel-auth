<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'types' => Type::all()
        ];
        return view('admin.types.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'description'=>'required',
            'icon'=>'required'
        ]);

        $newModel = new Type();

        $newModel->fill($data);
        $newModel->save();

        return redirect()->route('admin.types.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        $data = [
            'type' => $type
        ];
        return view('admin.types.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        $data = [
            'type' => $type
        ];
        return view('admin.types.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $data = $request->validate([
            'name'=>'required',
            'description'=>'required',
            'icon'=>'required'
        ]);

        $type->update($data);

        return redirect()->route('admin.types.show',$type);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        //
    }
}
