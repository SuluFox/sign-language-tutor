<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Category $category)
    {
        //
        if(auth()->user()->isAdmin){
            return view('admin.content',compact('category'));
        }
        return view('learning',compact('category'));
    }


    /**Function to save uploaded images for content of a category
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $content = new Content();
            
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
 
                $image->storeAs('public/images/content/', $imageName);
 
                $content->image_url =  $imageName;
            }
            $content->name = $request->name;
            $content->description = $request->description;
            $content->category_id = $request->category;
            $content->save();

            DB::commit();
            return redirect()->back()->with('success', 'New content created!!');
        } catch (\Exception $e) {
            if (isset($imageName)) {
                Storage::delete('public/images/content/' . $imageName);
            }
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage());
        }
    }



    /**
     * Update the specified resource in storage.
     * Method to update a Conent using the ID 
     */
    public function update(Request $request)
    {
        //
        $content = Content::findorfail($request->content_id);
        try {
            DB::beginTransaction();

            if ($request->hasFile('image')) {
                // Delete the old image
                if ($content->image_url) {
                    Storage::delete('public/images/content/' . $content->image_url);
                }

                // Upload the new image
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/images/content/', $imageName);
                $content->image_url =  $imageName;
            }
            $content->name = $request->name;
            $content->description = $request->description;
            // $content->category_id = $request->content_id;
            $content->save();

            DB::commit();
            return redirect()->back()->with('success', 'Content '.$content->name.' updated successfully.');
            
        } catch (\Exception $e) {
            if (isset($imageName)) {
                Storage::delete('public/images/content/' . $imageName);
            }
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     * Method to Delete a content 
     */
    public function destroy(content $content)
    {
        //
        try {
            DB::beginTransaction();

            if ($content->url) {
                Storage::delete('public/images/content/' . $content->image_url);
            }

            $content->delete();
            DB::commit();

            return redirect()->back()->with('success', 'content deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}