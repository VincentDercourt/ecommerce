<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductsRepository::class)
 */
class Products
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private ?string $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $description;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $technical;
    /**
     * @ORM\Column(type="boolean", options={"default" : 0})
     */
    private bool $best_seller;
    /**
     * @ORM\Column(type="boolean", options={"default" : 0})
     */
    private bool $featured;
    /**
     * @ORM\Column(type="boolean", options={"default" : 0})
     */
    private bool $hot;
    /**
     * @ORM\Column(type="boolean", options={"default" : 0})
     */
    private bool $special;
    /**
     * @ORM\Column(type="datetime", options={"default" : "CURRENT_TIMESTAMP"})
     */
    private DateTime $created_at;
    /**
     * @ORM\Column(type="datetime", options={"default" : "CURRENT_TIMESTAMP"})
     */
    private DateTime $updated_at;

    /**
     * Many User have Many productType.
     * @ORM\ManyToMany(targetEntity="ProductType")
     * @ORM\JoinTable(name="content_product",
     *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="product_type_id", referencedColumnName="id")}
     *      )
     */
    private $productType;

    /**
     * Many User have Many productType.
     * @ORM\ManyToMany(targetEntity="Categories")
     * @ORM\JoinTable(name="content_category",
     *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id")}
     *      )
     */
    private $categories;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return $this
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return mixed
     * @return ?string
     */
    public function getTechnical(): ?string
    {
        return $this->technical;
    }

    /**
     * @param ?string $technical
     *
     * @return Products
     */
    public function setTechnical(?string $technical): self
    {
        $this->technical = $technical;

        return $this;
    }

    public function getBestSeller(): bool
    {
        return $this->best_seller;
    }

    /**
     * @param bool $best_seller
     * @return Products
     */
    public function setBestSeller(bool $best_seller): self
    {
        $this->best_seller = $best_seller;

        return $this;
    }

    /**
     * @return bool
     */
    public function isFeatured(): bool
    {
        return $this->featured;
    }

    /**
     * @param bool $featured
     * @return Products
     */
    public function setFeatured(bool $featured): self
    {
        $this->featured = $featured;

        return $this;
    }

    public function isHot(): bool
    {
        return $this->hot;
    }

    /**
     * @return Products
     */
    public function setHot(bool $hot): self
    {
        $this->hot = $hot;

        return $this;
    }

    public function isSpecial(): bool
    {
        return $this->special;
    }

    /**
     * @param bool $speial
     *
     * @return Products
     */
    public function setSpecial(bool $special): self
    {
        $this->special = $special;

        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }

    /**
     * @return Products
     */
    public function setCreatedAt(DateTime $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updated_at;
    }

    /**
     * @return Products
     */
    public function setUpdatedAt(DateTime $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
