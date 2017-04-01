<?php
namespace Kay\Bundle\PlatformBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Kay\Bundle\TagBundle\Concern\Taggable;

/**
 * Courses
 */
class Courses
{
    use Taggable;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $introduction;

    /**
     * @var array
     */
    private $chapters;

    /**
     * @var string
     */
    private $imageName;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $comments;

    /**
     * @var \Kay\Bundle\PlatformBundle\Entity\Category
     */
    private $category;

    /**
     * @var array
     */
    private $tags;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->chapters = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->createdAt = new \DateTime();;
        $this->tags = new ArrayCollection();
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
     * @return Courses
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
     * Set introduction
     *
     * @param string $introduction
     *
     * @return Courses
     */
    public function setIntroduction($introduction)
    {
        $this->introduction = $introduction;

        return $this;
    }

    /**
     * Get introduction
     *
     * @return string
     */
    public function getIntroduction()
    {
        return $this->introduction;
    }

    /**
     * Set chapters
     *
     * @param array $chapters
     *
     * @return Courses
     */
    public function setChapters($chapters)
    {
        $this->chapters = $chapters;

        return $this;
    }

    /**
     * Get chapters
     *
     * @return array
     */
    public function getChapters()
    {
        return $this->chapters;
    }

    /**
     * Set imageName
     *
     * @param string $imageName
     *
     * @return Courses
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Courses
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
     * Add chapter
     *
     * @param \Kay\Bundle\PlatformBundle\Entity\Chapter $chapter
     *
     * @return Courses
     */
    public function addChapter(Chapter $chapter)
    {
        $this->chapters[] = $chapter;

        return $this;
    }

    /**
     * Remove chapter
     *
     * @param \Kay\Bundle\PlatformBundle\Entity\Chapter $chapter
     */
    public function removeChapter(Chapter $chapter)
    {
        $this->chapters->removeElement($chapter);
    }

    /**
     * Add comment
     *
     * @param \Kay\Bundle\PlatformBundle\Entity\Comment $comment
     *
     * @return Courses
     */
    public function addComment(Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \Kay\Bundle\PlatformBundle\Entity\Comment $comment
     */
    public function removeComment(Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set category
     *
     * @param \Kay\Bundle\PlatformBundle\Entity\Category $category
     *
     * @return Courses
     */
    public function setCategory(Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Kay\Bundle\PlatformBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }
}
