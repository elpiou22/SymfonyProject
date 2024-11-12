<?php

namespace App\Entity;

use App\Repository\MovieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: MovieRepository::class)]
#[Vich\Uploadable]
class Movie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;


    #[ORM\Column(type: 'integer')]
    private ?int $ageRequirement = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $releaseDate = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $synopsis = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $director = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $coverImage = null;

    #[Vich\UploadableField(mapping: 'cover_images', fileNameProperty: 'coverImage')]
    private ?File $coverImageFile = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $movieFile = null;

    #[Vich\UploadableField(mapping: 'movies', fileNameProperty: 'movieFile')]
    private ?File $movieFileFile = null;

    /**
     * @return string|null
     */
    public function getCoverImage(): ?string
    {
        return $this->coverImage;
    }

    /**
     * @param string|null $coverImage
     */
    public function setCoverImage(?string $coverImage): void
    {
        $this->coverImage = $coverImage;
    }

    /**
     * @return File|null
     */
    public function getCoverImageFile(): ?File
    {
        return $this->coverImageFile;
    }

    /**
     * @param File|null $coverImageFile
     */
    public function setCoverImageFile(?File $coverImageFile): void
    {
        $this->coverImageFile = $coverImageFile;
    }

    /**
     * @return string|null
     */
    public function getMovieFile(): ?string
    {
        return $this->movieFile;
    }

    /**
     * @param string|null $movieFile
     */
    public function setMovieFile(?string $movieFile): void
    {
        $this->movieFile = $movieFile;
    }

    /**
     * @return File|null
     */
    public function getMovieFileFile(): ?File
    {
        return $this->movieFileFile;
    }

    /**
     * @param File|null $movieFileFile
     */
    public function setMovieFileFile(?File $movieFileFile): void
    {
        $this->movieFileFile = $movieFileFile;
    }




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $name): static
    {
        $this->title = $name;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getAgeRequirement(): ?int
    {
        return $this->ageRequirement;
    }

    /**
     * @param int|null $ageRequirement
     */
    public function setAgeRequirement(?int $ageRequirement): void
    {
        $this->ageRequirement = $ageRequirement;
    }



    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(?\DateTimeInterface $releaseDate): static
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    public function setSynopsis(string $synopsis): static
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getDirector(): ?string
    {
        return $this->director;
    }

    public function setDirector(?string $director): static
    {
        $this->director = $director;

        return $this;
    }
}
