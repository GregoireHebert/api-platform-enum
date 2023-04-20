<?php

declare(strict_types=1);

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;

#[
    ApiResource(
        types: ['https://schema.org/Enumeration'],
        normalizationContext: ['groups' => ['read']],
        description: "Status used for a blog article"
    ),
    GetCollection(provider: Status::class.'::getCases'),
    Get(provider: Status::class.'::getCase')
]
enum Status: int
{
    case DRAFT = 0;
    case PUBLISHED = 1;
    case ARCHIVED = 2;

    use EnumApiResourceTrait;
}
