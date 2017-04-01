<?php
namespace Kay\Bundle\TagBundle\Tests\Form\DataTransformer;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityRepository;
use Kay\Bundle\TagBundle\Entity\Tag;
use Kay\Bundle\TagBundle\Form\DataTransformer\TagsTransformer;
use PHPUnit\Framework\TestCase;

class TagsTransformerTest extends TestCase
{
    public function testCreateTagsArrayFromString()
    {
        $tags = $this
            ->getMockedTransformer()
            ->reverseTransform('Hello, Demo')
        ;
        $this->assertCount(2, $tags);
        $this->assertSame('Demo', $tags[1]->getName());
    }

    public function testUseAlreadyDefinedTag()
    {
        $tag = new Tag();
        $tag->setName('Chat');
        $transformer = $this->getMockedTransformer(array($tag));
        $tags = $transformer->reverseTransform('Chat, Chien');
        $this->assertCount(2, $tags);
        $this->assertSame($tag, $tags[0]);
    }

    public function testRemoveEmptyTags()
    {
        $tags = $this
            ->getMockedTransformer()
            ->reverseTransform('Hello,, Demo, , ,')
        ;
        $this->assertCount(2, $tags);
        $this->assertSame('Demo', $tags[1]->getName());
    }

    public function testRemoveDuplicateTags()
    {
        $tags = $this
            ->getMockedTransformer()
            ->reverseTransform('Demo,, Demo, , Demo,')
        ;
        $this->assertCount(1, $tags);
    }

    private function getMockedTransformer($result = array())
    {
        $tagRepository = $this
            ->getMockBuilder(EntityRepository::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;
        $tagRepository
            ->expects($this->any())
            ->method('findBy')
            ->will($this->returnValue($result))
        ;

        $em = $this
            ->getMockBuilder(ObjectManager::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;
        $em
            ->expects($this->any())
            ->method('getRepository')
            ->will($this->returnValue($tagRepository))
        ;

        return new TagsTransformer($em);
    }
}
