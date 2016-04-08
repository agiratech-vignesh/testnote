<?php

namespace UserBundle\Entity;

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
     * @var int
     */
    private $ipId;

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
}

