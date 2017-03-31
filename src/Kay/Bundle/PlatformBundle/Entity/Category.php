<?php
namespace Kay\Bundle\PlatformBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 */
class Category
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $imageName;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $courses;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->courses = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Category
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
     * Set imageName
     *
     * @param string $imageName
     *
     * @return Category
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get imageName
     *
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Add course
     *
     * @param \Kay\Bundle\PlatformBundle\Entity\Courses $course
     *
     * @return Category
     */
    public function addCourse(Courses $course)
    {
        $this->courses[] = $course;

        return $this;
    }

    /**
     * Remove course
     *
     * @param \Kay\Bundle\PlatformBundle\Entity\Courses $course
     */
    public function removeCourse(Courses $course)
    {
        $this->courses->removeElement($course);
    }

    /**
     * Get courses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCourses()
    {
        return $this->courses;
    }
}
