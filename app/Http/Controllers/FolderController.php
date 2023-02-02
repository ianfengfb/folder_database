<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function root(Request $request)
    {
        $newFolder = new Folder();
        $newFolder->folder_name = 'Root Folder';
        $newFolder->save();
        return redirect('/open/'.$newFolder->id)->with('message', 'Folder added to the menu successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'folderName' => 'required',
        ]);
            $newFolder = new Folder();
            $newFolder->folder_name = $request->input('folderName');
            $newFolder->parent_folder = $request->input('folder_id');
            $newFolder->save();

        return back()->with('success', 'New Folder added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function open(Folder $folder)
    {
        $parent_folders = $folder->parents->reverse()->pluck('folder_name', 'id')->toArray();
        $folders = $folder->children()->orderBy('folder_name', 'asc')->get();
        $files = $folder->files()->orderBy('file_name', 'asc')->get();
        return view('open', ['folder_id'=> $folder->id,'current_folder'=> $folder->folder_name ,'parent_folders'=> $parent_folders ,'folders' => $folders, 'files' => $files]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function edit(folder $folder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, folder $folder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function destroy(folder $folder)
    {
        //
    }
}
