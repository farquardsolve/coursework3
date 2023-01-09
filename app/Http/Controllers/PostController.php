<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Contracts\Session\Session;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create','edit','update','destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postObject = Post::orderBy('id','desc')->paginate(3);
        return view('posts.index')->with('posts',$postObject);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //Validation
        $this->validate($request,array(
            'title' => 'required|max:250',
            'message' => 'required'
        ));

        $postObject = new Post;

        $postObject->title = $request->title;
        $postObject->message = $request->message;

        $postObject->save();

        session()->flash('status','Operation Successful');

        return redirect()->route('posts.show',$postObject->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postObject = Post::find($id);
        return view('posts.show')->with('post',$postObject);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postObject = Post::find($id);
        return view('posts.edit')->with('post',$postObject);
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
        $this->validate($request,array(
            'title' => 'required|max:250',
            'message' => 'required'
        ));

        $postObject = Post::find($id);

        $postObject->title = $request->title;
        $postObject->message = $request->message;

        $postObject->save();

        session()->flash('status','Operation Successful');

        return redirect()->route('posts.show',$postObject->id);
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
