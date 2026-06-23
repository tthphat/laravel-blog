<?php

namespace App\Http\Controllers\Admin;

use App\DTOs\PostDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Service\Post\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(private PostService $postService)
    {}

    public function index()
    {
        $posts = Post::with('author')->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(StorePostRequest $request)
    {
        $dto = new PostDTO(
            title: $request->validated('title'),
            content: $request->validated('content'),
            excerpt: $request->validated('excerpt'),
            featuredImage: $request->validated('featured_image'),
            publishedAt: $request->validated('published_at'),
            isPublished: $request->boolean('is_published'),
        );

        $post = $this->postService->create($dto, auth()->id());

        return redirect()->route('admin.post.index')->with('success', 'Post created!')
            // ->with('key', 'value')	Flash message vào session
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(StorePostRequest $request, Post $post)
    {
        // TODO: update logic
        return redirect()->route('admin.posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted!');
    }
}
