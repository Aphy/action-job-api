<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/** A signature of a demand. */
#[ORM\Entity]
#[ApiResource]
class Signature
{
    /** The ID of this signature. */
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    private ?int $id = null;

    /** The author of the signature. */
    #[ORM\Column]
    public string $author = '';

    /** The date of publication of this signature.*/
    #[ORM\Column]
    public ?\DateTimeImmutable $publicationDate = null;

    /** The demand this signature is about. */
    #[ORM\ManyToOne(inversedBy: 'signatures')]
    public ?Demand $demand = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
