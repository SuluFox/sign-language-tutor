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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
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
            
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(level $level)
    {
        //
    }

    public function showAll(level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(level $level)
    {
        //
    }

    /**
     * Update the specified resource in storage.
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

            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(level $level)
    {
        //
        // dd('deleted');
        try {
            DB::beginTransaction();
            $level->delete();
            DB::commit();
            return redirect()->back()->with('success', 'Level Deleted');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'something went wrong');
        }
    }
}