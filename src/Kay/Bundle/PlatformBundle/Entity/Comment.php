<?php
namespace Kay\Bundle\PlatformBundle\Entity;

use Kay\Bundle\UserBundle\Entity\User;

/**
 * Comment
 */
class Comment
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $content;

    /**
     * @var integer
     */
    private $rating;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \Kay\Bundle\PlatformBundle\Entity\Courses
     */
    private $courses;

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
     * Set content
     *
     * @param string $content
     *
     * @return Comment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Comment
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
     * Set rating
     *
     * @param integer $rating
     *
     * @return Comment
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return integer
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set courses
     *
     * @param \Kay\Bundle\PlatformBundle\Entity\Courses $courses
     *
     * @return Comment
     */
    public function setCourses(Courses $courses = null)
    {
        $this->courses = $courses;

        return $this;
    }

    /**
     * Get courses
     *
     * @return \Kay\Bundle\PlatformBundle\Entity\Courses
     */
    public function getCourses()
    {
        return $this->courses;
    }

    /**
     * Set user
     *
     * @param \Kay\Bundle\UserBundle\Entity\User $user
     *
     * @return Comment
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
