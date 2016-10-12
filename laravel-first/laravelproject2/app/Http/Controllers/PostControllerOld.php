<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Comment;
use App\Post;
use App\Category;
use App\Tag;


class PostControllerOld extends Controller
{
    //
    function index (){
        echo "Hola Fetu, te fuiste?" . "\n <br>";

      /*  $post = new Post;

        $post->name = "Guido";

        $post->save();
        */
/*
        $category = new Category();
        $category->name ="ManyToManyManies";
        $category->save();
        $id_categoria = $category->id;
        echo "<br>";
        echo $id_categoria;

        $post = new Post();
        $post->name = "Mesi el mas numero $id_categoria.";
        $post->description = "Mesi la rompe $id_categoria veces.";
        $post->category_id = $id_categoria;
        $post->text = "Mesi juega a la pelota muy bien y todos lo quieren porque es bueno, saludos.";
        $post->save();
        $post_id = $post->id;

        $tag = new Tag();
        $tag->name = "TagManyToMany";
        $tag->save();
        $tag->posts()->attach($post_id);

        $tag1 = new Tag();
        $tag1->name = "TagManyToManyManies";
        $tag1->save();
        $tag1->posts()->attach($post_id);

        $comment = new Comment;
        $comment->post_id = $post_id;
        $comment->user_id = 1;
        $comment->description = "Aguante el polo $post_id veces.";
        $comment->save();
*/
        $post = Tag::find(1);
        echo "\n <br>" . $post->name . "\n <br>";
        foreach ($post->posts as $tag) {
          echo "\n <br>" . $tag->name . " <br>  \n";
        }

/*
    Post::create([
      "name" => "Nombre Post.",
      "description" => "description del post.",
      "text" => "Texto del post.",
      "category_id" => $id_categoria

    ]);
    */
    }

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
        //
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
