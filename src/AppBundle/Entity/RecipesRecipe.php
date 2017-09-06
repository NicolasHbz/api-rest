<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RecipesRecipe
 *
 * @ORM\Table(name="recipes__recipe", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_45A663E0989D9B62", columns={"slug"})}, indexes={@ORM\Index(name="IDX_45A663E0A76ED395", columns={"user_id"})})
 * @ORM\Entity
 */
class RecipesRecipe
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     */
    private $slug;

    /**
     * @var array
     *
     * @ORM\Column(name="step", type="array", nullable=false)
     */
    private $step;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\UsersUser
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\UsersUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\RecipesCategory", inversedBy="recipe")
     * @ORM\JoinTable(name="recipe_category",
     *   joinColumns={
     *     @ORM\JoinColumn(name="recipe_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     *   }
     * )
     */
    private $category;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->category = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set name
     *
     * @param string $name
     *
     * @return RecipesRecipe
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
     * Set slug
     *
     * @param string $slug
     *
     * @return RecipesRecipe
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
     * Set step
     *
     * @param array $step
     *
     * @return RecipesRecipe
     */
    public function setStep($step)
    {
        $this->step = $step;

        return $this;
    }

    /**
     * Get step
     *
     * @return array
     */
    public function getStep()
    {
        return array($this->step);
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
     * Set user
     *
     * @param \AppBundle\Entity\UsersUser $user
     *
     * @return RecipesRecipe
     */
    public function setUser(\AppBundle\Entity\UsersUser $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\UsersUser
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add category
     *
     * @param \AppBundle\Entity\RecipesCategory $category
     *
     * @return RecipesRecipe
     */
    public function addCategory(\AppBundle\Entity\RecipesCategory $category)
    {
        $this->category[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \AppBundle\Entity\RecipesCategory $category
     */
    public function removeCategory(\AppBundle\Entity\RecipesCategory $category)
    {
        $this->category->removeElement($category);
    }

    /**
     * Get category
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategory()
    {
        return $this->category;
    }
}
