<?php

namespace App\Http\Controllers;

use App\Post; // ! Post Model in use here ! //
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
	 * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	 * %             INDEX             %
	 * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	 * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$posts = Post::all();
        return view('posts.index',compact('posts'));
    }

    /**
	 * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	 * %            CREATE             %
	 * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	 * 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
	 * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	 * %             STORE             %
	 * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	 * 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validation($request);

		$data = $request->all();
		$new_post = new Post();
		$new_post->fill($data);
		$new_post->save(); 	// ! DB writing here !

		@dump('');
		return redirect()->route('posts.index')->with('status','New Post Succesfully Created');
    }

    /**
	 * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	 * %             SHOW              %
	 * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	 * 
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    /**
	 * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	 * %             EDIT              %
	 * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	 * 
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
	 * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	 * %            DESTROY            %
	 * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	 * 
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
		$post->delete();
		return redirect()->route('posts.index')->with('status','Post Succesfully Deleted');
    }






	/**
	 * Data validation
	 * 
	 * https://laravel.com/docs/7.x/validation
	 * errors shown in EDIT/CREATE view
	 * 
	 * @param  \Illuminate\Http\Request  $req
	 */
	protected function validation($req) {
		$req->validate([
			'author'	=> 'required|max:50',
			'date'		=> 'required|date',
			'title'		=> 'required|max:100',
			'text'		=> 'required'
		]);
	}
}
