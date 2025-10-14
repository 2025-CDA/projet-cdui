<?php

namespace App\DataProvider;

use ApiPlatform\State\ProviderInterface;
use ApiPlatform\Metadata\Operation;
use App\Entity\Dependency;
use Symfony\Component\Uid\Uuid;

class DependencyDataProvider implements ProviderInterface
{
    public function __construct(private string $rootPath)
    {
    }

    /**
     * Modern API Platform provider for Dependency resources.
     * @throws \JsonException
     */
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|null|array
    {
        $path = $this->rootPath . '/composer.json';
        $json = json_decode(file_get_contents($path), true, 512, JSON_THROW_ON_ERROR);
        $items = [];

        foreach ($json['require'] as $name => $version) {
            $items[] = new Dependency(
                uuid: Uuid::v4() ->toRfc4122(),
                name: $name,
                version: $version
            );
        }

        return $items;

        // For real use, you should map $json into Dependency objects if required.
        // Example:
        // return array_map(fn($item) => new Dependency(...), $json['dependencies'] ?? []);
    }
}
