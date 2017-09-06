<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsersAuthCode
 *
 * @ORM\Table(name="users__auth_code", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_C3C4DEA55F37A13B", columns={"token"})}, indexes={@ORM\Index(name="IDX_C3C4DEA519EB6921", columns={"client_id"}), @ORM\Index(name="IDX_C3C4DEA5A76ED395", columns={"user_id"})})
 * @ORM\Entity
 */
class UsersAuthCode
{
    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255, nullable=false)
     */
    private $token;

    /**
     * @var string
     *
     * @ORM\Column(name="redirect_uri", type="text", nullable=false)
     */
    private $redirectUri;

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
     * @return UsersAuthCode
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
     * Set redirectUri
     *
     * @param string $redirectUri
     *
     * @return UsersAuthCode
     */
    public function setRedirectUri($redirectUri)
    {
        $this->redirectUri = $redirectUri;

        return $this;
    }

    /**
     * Get redirectUri
     *
     * @return string
     */
    public function getRedirectUri()
    {
        return $this->redirectUri;
    }

    /**
     * Set expiresAt
     *
     * @param integer $expiresAt
     *
     * @return UsersAuthCode
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
     * @return UsersAuthCode
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
     * @return UsersAuthCode
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
     * @return UsersAuthCode
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
