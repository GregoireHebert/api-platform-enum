<?php

declare(strict_types=1);

namespace App\States\Provider;

use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\BlogPost;
use App\ApiResource\Status;
use Symfony\Component\Uid\UuidV4;

class BlogPostProvider implements ProviderInterface
{
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $blogpost = new BlogPost(
            new UuidV4(),
            'super title',
            Status::PUBLISHED
        );

        return $operation instanceof GetCollection ? [$blogpost] : $blogpost;
    }
}
