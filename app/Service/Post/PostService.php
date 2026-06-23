<?php

namespace App\Service\Post;

use App\DTOs\PostDTO;
use App\Models\Post;
use Illuminate\Support\Str;

class PostService
{
    private function generateSlug(string $title): string
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    public function create(PostDTO $dto, int $authorId): Post
    {
        return Post::create([
            'author_id' => $authorId,
            'title' => $dto->title,
            'slug' => $this->generateSlug($dto->title),
            'content' => $dto->content,
            'excerpt' => $dto->excerpt,
            'featured_image' => $dto->featuredImage,
            'published_at' => $dto->publishedAt,
            'is_published' => $dto->isPublished,
        ]);
    }
}
