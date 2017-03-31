<?php
namespace Kay\Bundle\PlatformBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Chapter
 */
class Chapter
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var array
     */
    private $subChapters;

    /**
     * @var \Kay\Bundle\PlatformBundle\Entity\Courses
     */
    private $courses;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->subChapters = new ArrayCollection();
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
     * Set title
     *
     * @param string $title
     *
     * @return Chapter
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set subChapters
     *
     * @param array $subChapters
     *
     * @return Chapter
     */
    public function setSubChapters($subChapters)
    {
        $this->subChapters = $subChapters;

        return $this;
    }

    /**
     * Get subChapters
     *
     * @return array
     */
    public function getSubChapters()
    {
        return $this->subChapters;
    }

    /**
     * Add subChapter
     *
     * @param \Kay\Bundle\PlatformBundle\Entity\SubChapter $subChapter
     *
     * @return Chapter
     */
    public function addSubChapter(SubChapter $subChapter)
    {
        $this->subChapters[] = $subChapter;

        return $this;
    }

    /**
     * Remove subChapter
     *
     * @param \Kay\Bundle\PlatformBundle\Entity\SubChapter $subChapter
     */
    public function removeSubChapter(SubChapter $subChapter)
    {
        $this->subChapters->removeElement($subChapter);
    }

    /**
     * Set courses
     *
     * @param \Kay\Bundle\PlatformBundle\Entity\Courses $courses
     *
     * @return Chapter
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
}
