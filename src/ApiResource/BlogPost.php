<?php

declare(strict_types=1);

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\States\Provider\BlogPostProvider;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Constraints\Length;

#[
    ApiResource(
        types: ['http://schema.org/Blogpost'],
        description: "A blog article",
        provider: BlogPostProvider::class
    ),
    GetCollection, Get
]
class BlogPost
{
    public function __construct(
        #[ApiProperty(types: ['http://schema.org/identifier'])]
        public Uuid $id,
        #[ApiProperty(types: ['http://schema.org/name'])]
        #[Length(min: 3)]
        public string $title,
        public Status $status
    )
    {
    }
}
