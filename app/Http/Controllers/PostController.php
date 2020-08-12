<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::join('users', 'author_id', '=', 'users.id')->orderBy('posts.created_at', 'desc')->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostRequest $request)
    {
        $post = new Post();
        Validator::make($request->all(), [
            'img' => 'required',
        ])->validate();
        $post->title = $request->title;
        $post->article = $request->article;
        $post->img = $request->img;
        $post->author_id = 1;
        $post->description = $request->description;

        if ($request->file('img')) {
            $path = Storage::putFile('public', $request->file('img'));
            $url = Storage::url($path);
            $post->img = $url;
        }

        $post->save();
        return redirect()->route('post.index');

    }

    public function upload(Request $request)
    {

        Validator::make($request->all(), [
            'file' => 'mimes:jpeg,jpg,webp,png',
        ])->validate();
        $path = Storage::putFile('public', $request->file('file'));
        $url = Storage::url($path);
        return (array('location' => $url));

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $post = Post::join('users', 'author_id', '=', 'users.id')->find($id);

        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostRequest $request, $id)
    {
        $post= Post::find($id);

        $post->title = $request->title;
        $post->article = $request->article;
        if ($request->img){
            $post->img = $request->img;
        }
        $post->author_id = 1;
        $post->description = $request->description;

        if ($request->file('img')) {
            $path = Storage::putFile('public', $request->file('img'));
            $url = Storage::url($path);
            $post->img = $url;
        }

        $post->update();
        return redirect()->route('post.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();
        return redirect()->route('post.index');
    }
}
