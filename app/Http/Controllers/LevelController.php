<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $levels = Level::all();

        if(auth()->user()->isAdmin){
            return view('admin.level',compact('levels'));
        }
        return view('home',compact('levels'));
    }


    /**
     * Store a newly created resource in storage.\
     * Method to store a new level 
     */
    public function store(Request $request)
    {
        //
        try{
            DB::beginTransaction();
            

            $level = new Level();
            $level->name = $request->levelName;
            $level->save();

            DB::commit();
            return redirect()->back()->with('success','New level created!!');
            
        }catch(\Exception $e){
            DB::rollBack();
            
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    /**
     * Update the specified resource in storage.
     * Method to update a level
     */
    public function update(Request $request, level $level)
    {
        //
        try {
            DB::beginTransaction();

            $level->name = $request->name;
            $level->save();

            DB::commit();
            return redirect()->back()->with('success', 'New level updated!!');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     * Method to delete a level
     */
    public function destroy(level $level)
    {
        //
        try {
            DB::beginTransaction();
            $level->delete();
            DB::commit();
            return redirect()->back()->with('success', 'Level Deleted');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}