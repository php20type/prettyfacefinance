<?php

namespace App\Http\Controllers;

use App\Category;
use App\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Templates = Template::with('category')->get();
        $categories = Category::where('approved', 1)->pluck('name', 'id');
        return view("admin.templates", compact('Templates', 'categories'));
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
        $input = $request->all();
        $request->validate([
            'name' => 'required',
            'categories_id' => 'required',
            'file' => 'required',
            'cover_image' => 'required',
        ]);

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = time() . str_random(5) . '.' . $request->file->extension();
            $request->file->move(public_path('templates'), $file);
            $input['file'] = $file;
        }
        if ($request->hasFile('cover_image') && $request->file('cover_image')->isValid()) {
            $cover_image = time() . str_random(5) . '.' . $request->cover_image->extension();
            $request->cover_image->move(public_path('templates'), $cover_image);
            $input['cover_image'] = $cover_image;
        }
        Template::create($input);

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
        $input = $request->all();


        $Template = Template::find($id);

        $request->validate([
            'categories_id' => 'required',
            'name' => 'required',
        ]);

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = time() . str_random(5) . '.' . $request->file->extension();
            $request->file->move(public_path('templates'), $file);
            $input['file'] = $file;
        }
        if ($request->hasFile('cover_image') && $request->file('cover_image')->isValid()) {
            $cover_image = time() . str_random(5) . '.' . $request->cover_image->extension();
            $request->cover_image->move(public_path('templates'), $cover_image);
            $input['cover_image'] = $cover_image;
        }

        $Template->update($input);
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
        $Template = Template::find($id);
        $Template->delete();
        return redirect()->back();
    }
}
