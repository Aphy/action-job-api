<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/** A demand. */
#[ORM\Entity]
#[ApiResource]
class Demand
{
    /** The ID of this demand. */
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    private ?int $id = null;

    /** The title of this demand. */
    #[ORM\Column]
    public string $title = '';

    /** The content of this demand. */
    #[ORM\Column(type: 'text', nullable: true)]
    public string $content = '';

    /** The author of this demand. */
    #[ORM\Column(nullable: true)]
    public string $author = '';

    /** The publication date of this demand. */
    #[ORM\Column(nullable: true)]
    public ?\DateTimeImmutable $publicationDate = null;

    /** @var Signature[] Available signatures for this demand. */
    #[ORM\OneToMany(targetEntity: Signature::class, mappedBy: 'demand', cascade: ['persist', 'remove'])]
    public iterable $signatures;

    public function __construct()
    {
        $this->signatures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
