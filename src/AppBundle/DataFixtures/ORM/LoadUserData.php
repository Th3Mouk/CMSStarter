<?php

/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 29/01/15
 * Time: 16:54.
 */
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 6;
    }

    /**
     * {@inheritdoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $manager = $this->getUserManager();
        $faker = $this->getFaker();

        $user = $manager->createUser();
        $user->setUsername('admin');
        $user->setEmail($faker->safeEmail);
        $user->setPlainPassword('admin');
        $user->setEnabled(true);
        $user->setSuperAdmin(true);
        $user->setLocked(false);
        $user->addGroup($this->getReference('admin-group'));

        $manager->updateUser($user);
        $this->addReference('user-admin', $user);

        $user = $manager->createUser();
        $user->setUsername('user');
        $user->setEmail($faker->safeEmail);
        $user->setPlainPassword('user');
        $user->setEnabled(true);
        $user->setSuperAdmin(false);
        $user->setLocked(false);
        $user->addGroup($this->getReference('user-group'));

        $manager->updateUser($user);
        $this->setReference('user-user', $user);

        foreach (range(1, 3) as $id) {
            $user = $manager->createUser();
            $user->setUsername($faker->userName.$id);
            $user->setEmail($faker->safeEmail);
            $user->setPlainPassword($user->getUsername());
            $user->setEnabled(true);
            $user->setLocked(false);
            $user->addGroup($this->getReference('user-group'));

            $manager->updateUser($user);
        }

//        // Behat testing purpose
//        $user = $manager->createUser();
//        $user->setUsername('behat_user');
//        $user->setEmail($faker->safeEmail);
//        $user->setEnabled(true);
//        $user->setPlainPassword('behat_user');
//
//        $manager->updateUser($user);
    }

    /**
     * @return \FOS\UserBundle\Model\UserManagerInterface
     */
    public function getUserManager()
    {
        return $this->container->get('fos_user.user_manager');
    }

    /**
     * @return \Faker\Generator
     */
    public function getFaker()
    {
        return $this->container->get('faker.generator');
    }
}
