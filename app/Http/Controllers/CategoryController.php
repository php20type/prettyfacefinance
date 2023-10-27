<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Message;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate category name unique
        $request->validate([
            'name' => 'required|unique:categories'
        ]);

        $category = Category::create($request->all());

        // Alert master user
        $message = Message::create([
            'text' => "A new category has been requested! <a href='/admin/categories'>View</a>",
            'user_id' => 1
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Category approval logic. Move this to own function if need additional update functionality
        $category = Category::find($id);

        if($request->get('category_approve')){
            $category->approved = $request->get('category_approve');
        }

        if($request->get('name')){
            $category->name = $request->get('name');
            $category->approved = 1;
        }

        $category->save();

        // Implement return message

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
