<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsersAccessToken
 *
 * @ORM\Table(name="users__access_token", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_E51CB7CC5F37A13B", columns={"token"})}, indexes={@ORM\Index(name="IDX_E51CB7CC19EB6921", columns={"client_id"}), @ORM\Index(name="IDX_E51CB7CCA76ED395", columns={"user_id"})})
 * @ORM\Entity
 */
class UsersAccessToken
{
    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255, nullable=false)
     */
    private $token;

    /**
     * @var integer
     *
     * @ORM\Column(name="expires_at", type="integer", nullable=true)
     */
    private $expiresAt;

    /**
     * @var string
     *
     * @ORM\Column(name="scope", type="string", length=255, nullable=true)
     */
    private $scope;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\UsersClient
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\UsersClient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     * })
     */
    private $client;

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
     * Set token
     *
     * @param string $token
     *
     * @return UsersAccessToken
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set expiresAt
     *
     * @param integer $expiresAt
     *
     * @return UsersAccessToken
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }

    /**
     * Get expiresAt
     *
     * @return integer
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * Set scope
     *
     * @param string $scope
     *
     * @return UsersAccessToken
     */
    public function setScope($scope)
    {
        $this->scope = $scope;

        return $this;
    }

    /**
     * Get scope
     *
     * @return string
     */
    public function getScope()
    {
        return $this->scope;
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
     * Set client
     *
     * @param \AppBundle\Entity\UsersClient $client
     *
     * @return UsersAccessToken
     */
    public function setClient(\AppBundle\Entity\UsersClient $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \AppBundle\Entity\UsersClient
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\UsersUser $user
     *
     * @return UsersAccessToken
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
}
