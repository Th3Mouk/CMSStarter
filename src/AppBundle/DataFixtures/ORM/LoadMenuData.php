<?php
/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 29/01/15
 * Time: 16:54
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Id4v\Bundle\MenuBundle\Entity\Menu;
use Id4v\Bundle\MenuBundle\Entity\MenuItem;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadMenuData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
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
        return 30;
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
        $menu = new Menu();
        $menu->setName("Menu");
        $menu->setSlug("menu");

        $menu->addItem($first = new MenuItem());
        $first->setActive(true);
        $first->setTitle("First");
        $first->setUrl("/");

        $first->addChild($chill = new MenuItem());
        $chill->setActive(true);
        $chill->setTitle("Chill First");
        $chill->setUrl("/");

        $chill->addChild($chilly = new MenuItem());
        $chilly->setActive(true);
        $chilly->setTitle("Chilly First");
        $chilly->setUrl("/");

        $first->addChild($chill = new MenuItem());
        $chill->setActive(true);
        $chill->setTitle("Chill Second");
        $chill->setUrl("/");

        $first->addChild($chill = new MenuItem());
        $chill->setActive(true);
        $chill->setTitle("Chill Third");
        $chill->setUrl("/");

        $menu->addItem($second = new MenuItem());
        $second->setActive(true);
        $second->setTitle("Second");
        $second->setUrl("/");

        $menu->addItem($third = new MenuItem());
        $third->setActive(true);
        $third->setTitle("Third");
        $third->setUrl("/");

        $menu->addItem($fourth = new MenuItem());
        $fourth->setActive(true);
        $fourth->setTitle("Fourth");
        $fourth->setUrl("/");

        $manager->persist($menu);
        $manager->flush();
    }

    /**
     * @return \Faker\Generator
     */
    public function getFaker()
    {
        return $this->container->get('faker.generator');
    }
}
