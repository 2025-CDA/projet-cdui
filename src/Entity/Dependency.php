<?php

namespace App\Entity;


use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\DataProvider\DependencyDataProvider;

#[ApiResource(
    operations: [
        new Get(),
        new GetCollection()
    ],
    order: ['name' => 'ASC'],
    paginationEnabled: false,
    provider: DependencyDataProvider::class,
)]
class Dependency
{
    public function __construct(string $uuid, string $name, string $version) {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->version = $version;
    }

    #[ApiProperty(identifier: true)]
    private string $uuid = '';

    #[ApiProperty(
        description: "Dependency name",
        openapiContext: [
            'example' => '"^19.1.1"'
        ]
    )]
    private string $name;

    #[ApiProperty(
        description: "Dependency version",
        openapiContext: [
            'example' => '"^19.1.1"'
        ]
    )]
    private string $version;

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }
}
