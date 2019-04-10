<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JourneyRepository")
 */
class Journey
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $arrivezone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $departurezone;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $plusSpaces;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $bigSpaces;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $mediumSpaces;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $smallSpaces;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $miniSpaces;

    /**
     * @ORM\Column(type="datetime")
     */
    private $departureTime;

    /**
     * @ORM\Column(type="datetime")
     */
    private $arriveTime;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArrivezone(): ?string
    {
        return $this->arrivezone;
    }

    public function setArrivezone(string $arrivezone): self
    {
        $this->arrivezone = $arrivezone;

        return $this;
    }

    public function getDeparturezone(): ?string
    {
        return $this->departurezone;
    }

    public function setDeparturezone(string $departurezone): self
    {
        $this->departurezone = $departurezone;

        return $this;
    }

    public function getPlusSpaces(): ?int
    {
        return $this->plusSpaces;
    }

    public function setPlusSpaces(?int $plusSpaces): self
    {
        $this->plusSpaces = $plusSpaces;

        return $this;
    }

    public function getBigSpaces(): ?int
    {
        return $this->bigSpaces;
    }

    public function setBigSpaces(?int $bigSpaces): self
    {
        $this->bigSpaces = $bigSpaces;

        return $this;
    }

    public function getMediumSpaces(): ?int
    {
        return $this->mediumSpaces;
    }

    public function setMediumSpaces(?int $mediumSpaces): self
    {
        $this->mediumSpaces = $mediumSpaces;

        return $this;
    }

    public function getSmallSpaces(): ?int
    {
        return $this->smallSpaces;
    }

    public function setSmallSpaces(?int $smallSpaces): self
    {
        $this->smallSpaces = $smallSpaces;

        return $this;
    }

    public function getMiniSpaces(): ?int
    {
        return $this->miniSpaces;
    }

    public function setMiniSpaces(?int $miniSpaces): self
    {
        $this->miniSpaces = $miniSpaces;

        return $this;
    }

    public function getDepartureTime(): ?\DateTimeInterface
    {
        return $this->departureTime;
    }

    public function setDepartureTime(\DateTimeInterface $departureTime): self
    {
        $this->departureTime = $departureTime;

        return $this;
    }

    public function getArriveTime(): ?\DateTimeInterface
    {
        return $this->arriveTime;
    }

    public function setArriveTime(\DateTimeInterface $arriveTime): self
    {
        $this->arriveTime = $arriveTime;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
