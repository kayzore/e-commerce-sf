<?php
namespace Kay\Bundle\TagBundle\Concern;

trait Taggable {
    /**
     * Add tag
     *
     * @param \Kay\Bundle\TagBundle\Entity\Tag $tag
     *
     * @return Courses
     */
    public function addTag(\Kay\Bundle\TagBundle\Entity\Tag $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Kay\Bundle\TagBundle\Entity\Tag $tag
     */
    public function removeTag(\Kay\Bundle\TagBundle\Entity\Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }
}