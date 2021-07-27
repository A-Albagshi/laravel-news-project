<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('comments', [
            'comments' => Comment::with('news')->orderBy('is_approved')->orderBy('is_visible')->paginate(15)
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'comment' => 'required',
        ]);

        $comment = new Comment;

        $comment->news_id = $id;
        $comment->commenter = $request->name;
        $comment->body = $request->comment;
        $comment->is_approved = false;
        $comment->is_visible = false;

        $comment->save();

        return redirect()->back()->withSuccess('Comment was received  successfully. and it will be reviewed for approval!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('edit-comment', [
            'comment' => $comment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {

        if(isset($request->approved)){
            $comment->is_approved = true;
            $comment->is_visible = true;
            $comment->save();
            return redirect()->back();
        }
        
        $is_approved = isset($request->is_approved) ?? false;
        $is_visible = isset($request->is_visible) ?? false;
        
        $comment->commenter = isset($request->name) ? $request->name :$comment->commenter;
        if(isset($request->comment) && isset($request->commenter)){
            ddd($comment->body);
            $comment->body = $request->comment;
        }
        // $comment->body =  isset($request->comment) ? $request->comment : $comment->body;
        $comment->is_approved = $is_approved;
        $comment->is_visible = $is_visible;
        
        $comment->save();
        return redirect()->route('comments.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back();
    }
}
