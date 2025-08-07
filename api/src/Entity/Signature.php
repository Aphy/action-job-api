<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;

/** A signature of a demand. */
#[ApiResource]
class Signature
{
    /** The ID of this signature. */
    private ?int $id = null;

    /** The author of the signature. */
    public string $author = '';

    /** The date of publication of this signature.*/
    public ?\DateTimeImmutable $publicationDate = null;

    /** The demand this signature is about. */
    public ?Demand $demand = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
