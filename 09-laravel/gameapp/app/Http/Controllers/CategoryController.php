<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(20);   
        return view('categories.index')->with(['categories'=> $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        //dd($request->all());

        $category = new Category();
        $category->name = $request->name;
        $category->image = 'no-category.png';
        $category->manufacturer = $request->manufacturer;
        $category->releasedate = $request->releasedate;
        $category->description = $request->description;

        if($category->save()){
            return redirect('categories')->with('messages', 'The category: '. $category->name.' was successfully added!');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
        //dd($user->toArray());
         return view('categories.show')->with(['category'=> $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        return view('categories.edit')->with(['category'=>$category]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        //
        if($request->hasFile('image')){
            if($request->hasFile('image')){
                $photo = time().'.'.$request->photo->extension();
                $request->photo->move(public_path('images'), $photo);
            }
        }else{
            $photo = 'no-category.png';
        }

        $category->name = $request->name;
        $category->image = $photo;
        $category->manufacturer = $request->manufacturer;
        $category->releasedate = $request->releasedate;
        $category->description = $request->description;

        if($category->save()){
            return redirect('categories')->with('messages', 'The category: '. $category->name.' was successfully update!');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        if($category->delete()){
            return redirect('categories')->with('messages', 'The category: '. $category->name.' was successfully delete!');
        }

    }

    public function search(Request $request){
        $categories = Category::names($request->q)->paginate(20);   
        return view('categories.search')-> with('categories', $categories);
    }

}
