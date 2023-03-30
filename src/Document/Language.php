<?php

declare(strict_types=1);

namespace App\Document;

use ApiPlatform\Doctrine\Odm\Filter\OrderFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use Doctrine\ODM\MongoDB\Mapping\Annotations\Document;
use Doctrine\ODM\MongoDB\Mapping\Annotations\Field;
use Doctrine\ODM\MongoDB\Mapping\Annotations\Id;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Url;

#[Document(collection: 'linguagens')]
#[ApiResource]
#[ApiFilter(OrderFilter::class, properties: ['name'], arguments: ['orderParameterName' => 'order'])]
class Language
{
    #[Id]
    private string $id;

    public function __construct(
        #[Field]
        #[NotBlank]
        public string $name,
        #[Field]
        #[NotBlank]
        #[Url]
        public string $image,
    ) { }

    public function getId(): string
    {
        return $this->id;
    }
}
