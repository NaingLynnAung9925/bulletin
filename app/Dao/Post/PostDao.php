<?php

namespace App\Dao\Post;
use App\Contracts\Dao\Post\PostDaoInterface;
use Auth;
use App\Models\User;
use App\Models\Post;

class PostDao implements PostDaoInterface
{
    public function getPostList($request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        if($user->type == 0)
        {
            $data = Post::where('deleted_at', null)->simplePaginate(5);
        }else
        {
            $data = Post::where('deleted_at', null)->where('created_user_id',$id)->simplePaginate(5);
        }
        return $data;
    }
    public function getPostConfirm($request)
    {
        $postData = [
            'title' => $request->title,
            'description' => $request->description
        ];
        return $postData;
    }
    public function getPostCreate($request)
    {
        
        $post = new Post([
            'title' => $request->title,
            'description' => $request->description,
            'created_user_id' => $request->created_user_id,
            'updated_user_id' => $request->created_user_id
        ]);
        
        $post->save();
        return $post;
    }
    public function postDelete($id)
    {
        $post = Post::find($id);
        $post->deleted_user_id = Auth::user()->id;
        $post->delete();
        $post->save();
        return $post;
    }
    public function postEdit($id)
    {
        $post = Post::find($id);
        return $post;
    }
    public function getEditConfirm($request)
    {
        $post = [
            'id' => $request->id,
            'title' => $request->title,
            'description' => $request->description
        ];
        return $post;
    }
    public function postUpdate($request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->updated_user_id = Auth::user()->id;
        $post->update();
        return $post;
    }
    public function postRestore()
    {
        $post = Post::onlyTrashed()->get();
        return $post;
    }
    public function restoreItem($id)
    {
        $post = Post::onlyTrashed()->find($id)->restore();
        return $post;
    }
}
