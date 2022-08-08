<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostCreateRequest;
use App\Contracts\Services\Post\PostServiceInterface;
use Auth;

class PostController extends Controller
{
    private $postService;
    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $postData = $this->postService->getpostList($request);
        return view('posts.index', ['postData' => $postData]);
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

    public function create_confirm(PostCreateRequest $request)
    {   
        $request->validate([
            
        ]);
        $createData = $this->postService->getPostConfirm($request);
        return view('posts.create_confirm', ['createData' => $createData]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['created_user_id'] = Auth::user()->id;
        $request['updated_user_id'] = Auth::user()->id;
        $post = $this->postService->getPostCreate($request);
        return redirect('/')->with('success', 'Post created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->postService->postEdit($id);
        return view('posts.edit', ['post' => $post]);
    }

    public function edit_confirm(PostCreateRequest $request)
    {
        $post = $this->postService->getEditConfirm($request);
        return view('posts.edit_confirm', ['post' => $post]);
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
        $this->postService->postUpdate($request, $id);
        return redirect('/')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $this->postService->postDelete($id);
       return redirect()->route('post.index')->with('success', 'Post deleted successfully');
    }

    public function restoreAll()
    {
       $posts = $this->postService->postRestore();
       return view('posts.restore', ['posts' => $posts]);
    }

    public function restoreItem($id)
    {
        $postRestore = $this->postService->restoreItem($id);
        return redirect()->route('post.index')->with('success', 'Post restored successfully');
    }
    public function search(Request $request)
    {
        $postData = $this->postService->postSearch($request->search);
        if(count($postData) > 0)
        {
            return view('posts.index', compact('postData'));
        }
        return redirect('/')->with('error', 'Result does not have in our records');
    }
    public function importFile()
    {
        return view('posts.import_file');
    }
}
