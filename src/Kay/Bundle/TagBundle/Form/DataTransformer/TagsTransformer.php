<?php
namespace Kay\Bundle\TagBundle\Form\DataTransformer;

use Doctrine\Common\Persistence\ObjectManager;
use Kay\Bundle\TagBundle\Entity\Tag;
use Symfony\Component\Form\DataTransformerInterface;

class TagsTransformer implements DataTransformerInterface
{
    /**
     * @var ObjectManager
     */
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @param mixed $value
     * @return string
     */
    public function transform($value)
    {
        return implode(',', $value);
    }

    /**
     * @param mixed $str
     * @return array
     */
    public function reverseTransform($str)
    {
        $names = array_unique(array_filter(array_map('trim', explode(',', $str))));
        $tags = $this->manager->getRepository('KayTagBundle:Tag')->findBy(array(
            'name' => $names
        ));
        $newNames = array_diff($names, $tags);
        foreach ($newNames as $name) {
            $tag = new Tag();
            $tag->setName($name);
            $tags[] = $tag;
        }

        return $tags;
    }
}