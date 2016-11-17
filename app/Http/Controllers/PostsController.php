<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;
use Session;
use Gate;
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth', ['except' => 'show']);
    }

    public function index()
    {
        $posts = Post::orderBy('id', 'asc')->get();

        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validates form data
        $this->validate($request, array(
            'title' => 'required|max:70|min:5',
            'slug' => 'required|max:70|min:5|unique:posts',
            'body' => 'required',
        ));

        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;

        //$post->save();
        Auth::user()->posts()->save($post);
        Session::flash('Success', 'The post has been added');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

       
            return view('posts.show')->withPost($post);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        
            
        if(Gate::allows('update', $post)){
            return view('posts.edit')->withPost($post);
        }else{
            Session::flash('Error', 'You are not allowed to access this page.');
            return redirect()->route('posts.index');
        }
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

        $post = Post::findorFail($id);

        if($request->input('slug') == $post->slug){
            $this->validate($request, [
                    'title'=> 'required|min:5|max:25',
                    'body' => 'required'
                ]);
            
        }else{
            $this->validate($request, [
                    'title'=> 'required|min:5|max:25',
                    'slug' => 'required|min:5|max:255|unique:posts',
                    'body' => 'required'
                ]);
            
        }

        $post = Post::findorFail($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        $post->save();
        Session::flash('Success', 'The file has been edited');
        return redirect()->route('posts.index');
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
        $post = Post::findorFail($id);
        if(Gate::denies('destroy', $post)){
            $post->delete();
            Session::flash('Success', 'The data has been deleted');
            return redirect()->route('posts.index');
        }else{
            Session::flash('Error', '403');
            return redirect()->route('posts.index');
        }
    }
        
        
    
}
