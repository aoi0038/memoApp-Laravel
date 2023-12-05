<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
use App\Http\Requests\MemoCreateRequest;


class MemoController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memos = Memo::get();
        return view("home", ['memos' => $memos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemoCreateRequest $request)
    {
        $memo = new Memo;
        $memo->title = $request->input('title');
        $memo->content = $request->input('content');

        $memo->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $memo = Memo::find($id);
        if (is_null($memo)) {
            abort(404);
        }
       
        return view("edit", ['memo' => $memo]);
        // return view("edit", [
        //     "title" => $memo->title,
        //     "content" => $memo->content,
        // ]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MemoCreateRequest $request, string $id)
    {
        $memo = Memo::find($id);
        $memo->where('id', $id)->update(['title' => $request->title]);
        $memo->where('id', $id)->update(['content' => $request->content]);
        // $memo->update($request->only(['content']));
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $memo = Memo::find($id);
        $memo->delete();
        return redirect('/');
    }
}
