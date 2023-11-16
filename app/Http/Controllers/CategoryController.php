<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Level $level)
    {
        //
        if (auth()->user()->isAdmin) {
            return view('admin.categories', compact('level'));
        }
        return view('category',compact('level'));
    }


    /**
     * Store a newly created resource in storage.
     * Method to save new Category of Levels
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $category = new Category();
            $category->level_id = $request->levelId;
            $category->name = $request->CategoryName;
            $category->save();

            DB::commit();
            return redirect()->back()->with('success', 'New category created!!');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    
    /**
     * Remove the specified resource from storage.
     * Delete a specific Category 
     */
    public function destroy(Category $category)
    {
        
        try {
            DB::beginTransaction();
            $category->delete();
            DB::commit();
            return redirect()->back()->with('success', 'Category Deleted');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}