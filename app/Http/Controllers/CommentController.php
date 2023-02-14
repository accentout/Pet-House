<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Publication;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function createComment($id)
    {
        return view('/comment.create-comment', ['publication' => Publication::findOrFail($id)]);
    }

    public function createCommentStore(Request $request, $id)
    {
        Comment::create([
            'user_id' => $request->user()->id,
            'publication_id' => Publication::where(['id' => Publication::findOrFail($id)->id])->first()->id,
            'description' => $request->input('description'),
            'name' => $request->input('name'),
        ]);
        return view('/layouts.pet', ['publication' => Publication::findOrFail($id)]);
    }

    public function deleteComment($id)
    {
        $id_p =  Comment::findOrFail($id)->publication_id;
        Comment::findOrFail($id)->delete();
        return redirect(route('pet',  $id_p));
    }
}
