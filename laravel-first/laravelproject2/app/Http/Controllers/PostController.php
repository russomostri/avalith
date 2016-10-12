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


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $p = Post::with("category","user","tags")->get();
        $p = Post::all();

        return view('posts')->with('posts',$p);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $post = new Post();
        $categories = Category::all();
        $users = User::all();
        $tags = Tag::all();
        $Data = ['categories' => $categories , 'users' => $users, 'tags' => $tags];
        //dd($Data);
        //return view('newPost')->with('data',$Data);
        return view('newPost')->with('categories' , $categories)->with('users' , $users)->with('post' , $post)->with('tags', $tags);

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

        $this->validate($request, [
        'name' => 'required|max:255',
        'description' => 'required',
        'category_id' => 'required',
        'text' => 'required',
        'author_user_id' => 'required',
        ]);

        $post = new Post();
        $post->name = $request->Title;
        $post->description = $request->Description;
        $post->category_id = $request->Category;
        $post->text = $request->Text;
        $post->author_user_id = $request->Author;
        $post->save();

        $post->tags()->sync($request->Tags);


        return redirect("post/".$post->id."/show");
        /*

        */

        /*
        Post::create([
          "name" => $request->Title,
          "description" => $request->description,
          "text" => $request->Text,
          "category_id" => $request->Categories,
          "author_user_id" => $request->users,
          "tags" => $request->tags
        ]);
        */
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
        $p = Post::with("category","user", "tags", "comments")->find($id);
        return view('showPost')->with('posts',$p);
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
        $post = Post::with("category","user", "tags")->find($id);
        $categories = Category::all();
        $users = User::all();
        $tags = Tag::all();
        //$data = collect(['post' => $post, 'categories' => $categories , 'users' => $users, 'tags' => $tags]);


        return view('newPost')->with('post', $post)->with('categories' , $categories)->with('users' , $users)->with('tags', $tags);


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

        $this->validate($request, [
        'name' => 'required|max:255',
        'description' => 'required',
        'category_id' => 'required',
        'text' => 'required',
        'author_user_id' => 'required',
        ]);
        
        $post = Post::find($id);
        $post->name = $request->Title;
        $post->description = $request->Description;
        $post->category_id = $request->Category;
        $post->text = $request->Text;
        $post->author_user_id = $request->Author;
        $post->save();

        $post->tags()->sync($request->Tags);

        return redirect("post/".$id."/show");
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
        //dd($id);
        $post = Post::find($id);
        $post->delete();
        return redirect('post');
    }
}
