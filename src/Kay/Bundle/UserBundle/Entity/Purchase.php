<?php

namespace Kay\Bundle\UserBundle\Entity;

/**
 * Purchase
 */
class Purchase
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var array
     */
    private $coursesIdList;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \Kay\Bundle\UserBundle\Entity\User
     */
    private $user;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }


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
     * Set coursesIdList
     *
     * @param array $coursesIdList
     *
     * @return Purchase
     */
    public function setCoursesIdList(array $coursesIdList)
    {
        $this->coursesIdList = $coursesIdList;

        return $this;
    }

    /**
     * Get coursesIdList
     *
     * @return array
     */
    public function getCoursesIdList()
    {
        return $this->coursesIdList;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Purchase
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set user
     *
     * @param \Kay\Bundle\UserBundle\Entity\User $user
     *
     * @return Purchase
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Kay\Bundle\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
