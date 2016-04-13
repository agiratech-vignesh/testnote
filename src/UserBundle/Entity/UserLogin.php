<?php

namespace UserBundle\Entity;
use UserBundle\Entity\User;
use UserBundle\Entity\Ip;
use Doctrine\ORM\Mapping as ORM;


/**
 * UserLogin
 */
class UserLogin
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var int
     */
    private $userId;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     * @var int
     */
    private $user;

    /**
     * @var int
     */
    private $ipId;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Ip")
     * @JoinColumn(name="ip_id", referencedColumnName="id")
     * @var int
     */
    private $ip;

    /**
     * @var string
     */
    private $os;

    /**
     * @var string
     */
    private $browserAgent;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return UserLogin
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return UserLogin
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set ipId
     *
     * @param integer $ipId
     *
     * @return UserLogin
     */
    public function setIpId($ipId)
    {
        $this->ipId = $ipId;

        return $this;
    }

    /**
     * Get ipId
     *
     * @return int
     */
    public function getIpId()
    {
        return $this->ipId;
    }

    /**
     * Set os
     *
     * @param string $os
     *
     * @return UserLogin
     */
    public function setOs($os)
    {
        $this->os = $os;

        return $this;
    }

    /**
     * Get os
     *
     * @return string
     */
    public function getOs()
    {
        return $this->os;
    }

    /**
     * Set browserAgent
     *
     * @param string $browserAgent
     *
     * @return UserLogin
     */
    public function setBrowserAgent($browserAgent)
    {
        $this->browserAgent = $browserAgent;

        return $this;
    }

    /**
     * Get browserAgent
     *
     * @return string
     */
    public function getBrowserAgent()
    {
        return $this->browserAgent;
    }

    /**
     * Set user
     *
     * @param User $userId
     *
     * @return UserLogin
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set ip
     *
     * @param Ip $ip
     *
     * @return UserLogin
     */
    public function setIp(Ip $ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return Ip
     */
    public function getIp()
    {
        return $this->ip;
    }
}

