<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\Bundle\DemoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Sonata\MediaBundle\Model\GalleryInterface;
use Sonata\MediaBundle\Model\MediaInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Finder\Finder;

class LoadMediaData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 10;
    }

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
//        $gallery = $this->getGalleryManager()->create();
//
//        $manager = $this->getMediaManager();
//
//        $contenus = Finder::create()->name('*')->in(__DIR__.'/../../../../web/images/contenu');
//
//        $i = 0;
//        foreach ($contenus as $file) {
//            $media = $manager->create();
//            $media->setBinaryContent($file);
//            $media->setEnabled(true);
//            $media->setName($file->getFileName());
//            $media->setDescription('');
//            $media->setAuthorName('');
//            $media->setCopyright('');
//
//            $this->addReference('sonata-media-contenu-'.($i++), $media);
//
//            $manager->save($media, 'contenu', 'sonata.media.provider.image');
//
//            $this->addMedia($gallery, $media);
//        }
//
//        $gallery->setEnabled(true);
//        $gallery->setName($faker->sentence(4));
//        $gallery->setDefaultFormat('small');
//        $gallery->setContext('default');
//
//        $this->getGalleryManager()->update($gallery);
//
//        $this->addReference('media-gallery', $gallery);
    }

    /**
     * @param  \Sonata\MediaBundle\Model\GalleryInterface $gallery
     * @param  \Sonata\MediaBundle\Model\MediaInterface   $media
     * @return void
     */
    public function addMedia(GalleryInterface $gallery, MediaInterface $media)
    {
        $galleryHasMedia = new \Application\Sonata\MediaBundle\Entity\GalleryHasMedia();
        $galleryHasMedia->setMedia($media);
        $galleryHasMedia->setPosition(count($gallery->getGalleryHasMedias()) + 1);
        $galleryHasMedia->setEnabled(true);

        $gallery->addGalleryHasMedias($galleryHasMedia);
    }

    /**
     * @return \Sonata\MediaBundle\Model\MediaManagerInterface
     */
    public function getMediaManager()
    {
        return $this->container->get('sonata.media.manager.media');
    }

    /**
     * @return \Sonata\MediaBundle\Model\MediaManagerInterface
     */
    public function getGalleryManager()
    {
        return $this->container->get('sonata.media.manager.gallery');
    }
}
