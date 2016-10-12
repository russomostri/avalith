<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Requests;
use App\User;
use App\Comment;
use App\Post;
use App\Category;
use App\Tag;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $c = Comment::with("post")->with("user")->get();

        return view('comments')->with('comments',$c);
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
        //
        dd('store');

        $this->validate($request, [
        'post_id' => 'required|max:255',
        'description' => 'required',
        //'user_id' => 'required',
        ]);

        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->description = $request->comment;
        $comment->user_id = 1;
        $comment->save();

        //$comment->tags()->sync($request->Tags);


        return redirect("post/".$request->post_id);
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
        $c = Comment::with("user")->with("post")->find($id);
        return view('comments')->with('comments',$c);
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

        $c = Comment::with("user")->with("post")->find($id);
        return view('comments')->with('comments',$c)->with('action', 1);
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
        //
       //dd($request->comment);
        $this->validate($request, [
        'comment' => 'required',
        ]);

        $comment =  Comment::find($id);
        $comment->description = $request->comment;
        $comment->save();


        return redirect("comment/".$request->post_id);
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
        $comment = Comment::find($id);
        $comment->delete();
        return redirect('comment/');
    }
}
