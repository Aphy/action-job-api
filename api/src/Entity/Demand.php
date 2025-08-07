<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/** A demand. */
#[ApiResource]
class Demand
{
    /** The ID of this demand. */
    private ?int $id = null;

    /** The title of this demand. */
    public string $title = '';

    /** The content of this demand. */
    public string $content = '';

    /** The author of this demand. */
    public string $author = '';

    /** The publication date of this demand. */
    public ?\DateTimeImmutable $publicationDate = null;

    /** @var Signature[] Available signatures for this book. */
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
