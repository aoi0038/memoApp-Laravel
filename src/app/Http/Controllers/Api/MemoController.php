<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApiMemoCreateRequest;
use App\Models\Memo;

class MemoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll()
    {
        $memos = Memo::get();
        return response()->json($memos);
    }

    public function getById(string $id)
    {
        // /memos/{id}
        // 1レコードとってくる
        $memo = Memo::find($id);
        if (is_null($memo)) {
            return response()->json([
                'message' => 'メモが見つかりません'
            ], 404);
        }

        return response()->json([
            'memo' => $memo
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(ApiMemoCreateRequest $request)
    {
        // /memos/create
        $memo = new Memo;
        $memo->title = $request->input('title');
        $memo->content = $request->input('content');
        $memo->save();
        

        //成功したらIDを返す
        return response()->json($memo->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateById(Request $request, string $id)
    {
        // /memo/update/{id}
        $memo = Memo::find($id);
        if (is_null($memo)) {
            return response()->json([
                'message' => 'メモが見つかりません'
            ], 404);
        }
        $memo->where('id', $id)->update(['title' => $request->title]);
        $memo->where('id', $id)->update(['content' => $request->content]);

        return response()->json([
            'message' => '編集できました'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteById(string $id)
    {
        // /memo/destroy/{id}
        $memo = Memo::find($id);
        if (!$memo) {
            return response()->json([
                'message' => 'メモが見つかりません'
            ], 404);
        }

        $memo->delete();
        return response()->json([
            'message' => '削除できました'
        ], 200);
    }

}
