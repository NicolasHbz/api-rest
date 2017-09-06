<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RecipesCategory
 *
 * @ORM\Table(name="recipes__category")
 * @ORM\Entity
 */
class RecipesCategory
{
    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\RecipesRecipe", mappedBy="category")
     */
    private $recipe;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->recipe = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return RecipesCategory
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return RecipesCategory
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add recipe
     *
     * @param \AppBundle\Entity\RecipesRecipe $recipe
     *
     * @return RecipesCategory
     */
    public function addRecipe(\AppBundle\Entity\RecipesRecipe $recipe)
    {
        $this->recipe[] = $recipe;

        return $this;
    }

    /**
     * Remove recipe
     *
     * @param \AppBundle\Entity\RecipesRecipe $recipe
     */
    public function removeRecipe(\AppBundle\Entity\RecipesRecipe $recipe)
    {
        $this->recipe->removeElement($recipe);
    }

    /**
     * Get recipe
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRecipe()
    {
        return $this->recipe;
    }
}
