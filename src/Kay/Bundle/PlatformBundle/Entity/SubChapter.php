<?php

namespace Kay\Bundle\PlatformBundle\Entity;

/**
 * SubChapter
 */
class SubChapter
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
     * @var string
     */
    private $introduction;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \Kay\Bundle\PlatformBundle\Entity\Chapter
     */
    private $chapters;


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
     * @return SubChapter
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
     * @return SubChapter
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
     * Set content
     *
     * @param string $content
     *
     * @return SubChapter
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
     * Set chapters
     *
     * @param \Kay\Bundle\PlatformBundle\Entity\Chapter $chapters
     *
     * @return SubChapter
     */
    public function setChapters(Chapter $chapters = null)
    {
        $this->chapters = $chapters;

        return $this;
    }

    /**
     * Get chapters
     *
     * @return \Kay\Bundle\PlatformBundle\Entity\Chapter
     */
    public function getChapters()
    {
        return $this->chapters;
    }
}
