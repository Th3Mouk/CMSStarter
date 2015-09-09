<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

            // App
            new AppBundle\AppBundle(),

            // Sonata Core
            new Sonata\CoreBundle\SonataCoreBundle(),
            new Sonata\AdminBundle\SonataAdminBundle(),
            new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
            new Sonata\BlockBundle\SonataBlockBundle(),
            new Application\Sonata\BlockBundle\ApplicationSonataBlockBundle(),
            new Sonata\IntlBundle\SonataIntlBundle(),
            new Sonata\SeoBundle\SonataSeoBundle(),
            new Sonata\CacheBundle\SonataCacheBundle(),
            new Sonata\NotificationBundle\SonataNotificationBundle(),
            new Application\Sonata\NotificationBundle\ApplicationSonataNotificationBundle(),
            new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),

            // CMF Integration
            new Symfony\Cmf\Bundle\RoutingBundle\CmfRoutingBundle(),

            // Sonata User
            new FOS\UserBundle\FOSUserBundle(),
            new Sonata\UserBundle\SonataUserBundle('FOSUserBundle'),
            new Application\Sonata\UserBundle\ApplicationSonataUserBundle(),

            // Sonata Page
            new Sonata\PageBundle\SonataPageBundle(),

            // Sonata Formatter
            new Knp\Bundle\MarkdownBundle\KnpMarkdownBundle(),
            new Sonata\FormatterBundle\SonataFormatterBundle(),

            // CKEditor
            new Ivory\CKEditorBundle\IvoryCKEditorBundle(),

            // Sonata Media
            new Sonata\MediaBundle\SonataMediaBundle(),
            new Application\Sonata\MediaBundle\ApplicationSonataMediaBundle(),
            new JMS\SerializerBundle\JMSSerializerBundle(),
            new Liip\ImagineBundle\LiipImagineBundle(),

            // Fixtures
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
            new Bazinga\Bundle\FakerBundle\BazingaFakerBundle(),

            // Doctrine Extension
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),

            // Uploads
            new \Vich\UploaderBundle\VichUploaderBundle(),

            // API
            new FOS\RestBundle\FOSRestBundle(),
            new Nelmio\ApiDocBundle\NelmioApiDocBundle(),

            // Menu
            new Id4v\Bundle\MenuBundle\Id4vMenuBundle(),

            // CMS Starter
            new Th3Mouk\CMSCoreBundle\Th3MoukCMSCoreBundle(),
            new Th3Mouk\CMSPageBundle\Th3MoukCMSPageBundle(),
            new Application\Th3Mouk\CMSPageBundle\ApplicationTh3MoukCMSPageBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
