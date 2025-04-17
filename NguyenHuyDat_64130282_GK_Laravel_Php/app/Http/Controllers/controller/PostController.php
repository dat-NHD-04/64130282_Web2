<?php

namespace App\Http\Controllers\controller;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::latest();

        if (!empty($request->get('keyword'))) {
            $posts = $posts->where('title', 'like', '%' . $request->get('keyword') . '%');
        }

        $posts = $posts->paginate(5);

        return view('homeController.post.list', compact('posts'));
    }

    public function create()
    {
        return view('homeController.post.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if ($validator->passes()) {
            $post = new Post();
            $post->title = $request->title;
            $post->content = $request->content;
            $post->categoryId = $request->categoryId;
            $post->save();

            $request->session()->flash('success', 'Post added successfully!');

            return response()->json([
                'status' => true,
                'message' => 'Post added successfully!'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function view($postId, Request $request)
    {
        $post = Post::find($postId);

        if (empty($post)) {
            return redirect()->route('posts.index');
        }

        return view('homeController.post.view', compact('post'));
    }

    public function edit($postId, Request $request)
    {
        $post = Post::find($postId);

        if (empty($post)) {
            return redirect()->route('posts.index');
        }

        return view('homeController.post.edit', compact('post'));
    }

    public function update($postId, Request $request)
    {
        $post = Post::find($postId);

        if (empty($post)) {
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => 'Post not found!'
            ]);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if ($validator->passes()) {
            $post->title = $request->title;
            $post->content = $request->content;
            $post->categoryId = $request->categoryId;
            $post->save();

            $request->session()->flash('success', 'Post updated successfully!');

            return response()->json([
                'status' => true,
                'message' => 'Post updated successfully!'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function destroy($postId, Request $request)
    {
        $post = Post::find($postId);

        if (empty($post)) {
            return redirect()->route('posts.index');
        }

        $post->delete();

        $request->session()->flash('success', 'Post deleted successfully!');

        return response()->json([
            'status' => true,
            'message' => 'Post deleted successfully!'
        ]);
    }
}
