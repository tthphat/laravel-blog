<?php

namespace App\DTOs;

class PostDTO {
    public function __construct(public readonly string $title,
                                public readonly string $content,
                                public readonly ?string $excerpt,
                                public readonly ?string $featuredImage,
                                public readonly ?string $publishedAt,
                                public readonly bool $isPublished)
    {
    }
}
