<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentsRequest;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentsController extends Controller
{

    public function store(CommentsRequest $request)
    {
        Comment::create($request->all());
        $validation = array('Successfully added the Comment!');

        return Redirect::back()->with('message', 'Successfully added the Comment!');
    }

    public function destroy($id)
    {
        $cm = Comment::findOrFail($id);
        $cm->delete();

        return Redirect::back()->with('message', 'Successfully Deleted the Comment!');
    }

}
