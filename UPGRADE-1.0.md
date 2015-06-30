UPGRADE 1.0
===============

## The simpliest way to apply the following patchs, is to take the various changes through the commits on this repo

## 1.0.1

### __Composer Updated__

### __Configuration__

Fix critical of `SonataMediaBundle` [7d404a0](https://github.com/Th3Mouk/CMSStarter/commit/7d404a0f9b74b2989637a97f6ce75c7d69720875)

## 1.0.2

### __Dependencies__

Change version dependency of `CMSCoreBundle` to ~1.0

### __Rights__

Modifying rights on files :  [3335a91](https://github.com/Th3Mouk/CMSCoreBundle/commit/3335a919376a523f777389b13f5d5be655473eaa)

## 1.0.3

### __Composer Updated__

### __Configuration__

Modifying provided configuration [8fa886f](https://github.com/Th3Mouk/CMSStarter/commit/8fa886fe8d10170437111f7fef5d0045d39e6655)

### __Fixtures__

Fix the initial set due to error on `LoadPageData.php` [36f4f1c](https://github.com/Th3Mouk/CMSStarter/commit/36f4f1cc27cf0908f0e0f6ea9b1f66b747c175eb)

## 1.0.4

### __Composer Updated__

### __Dependencies__

Update the `AppKernel.php` file [1d5edda](https://github.com/Th3Mouk/CMSStarter/commit/1d5edda654a0142e90f995fa15cb3b64bfd1e4a0)

## 1.0.5

### __Composer Updated__

### __Dependencies__

Add the `Id4vMenuBundle` [901bd3c](https://github.com/Th3Mouk/CMSStarter/commit/901bd3c38a5076f4b0cfba9e3c6146e567c0ce93)

### __Fixtures__

Modifying fixtures :

* [6e122b4](https://github.com/Th3Mouk/CMSStarter/commit/6e122b4de209b3054eb62e088e3e8ad543b01d56)
* [2ff405a](https://github.com/Th3Mouk/CMSStarter/commit/2ff405a1259b843533ba806d6de490a87c76464d)

## 1.0.6

### __Composer Updated__

### __Dependencies__

Remove the [SonataFormatterBundle](https://sonata-project.org/bundles/formatter/master/doc/index.html) cause he was unused in favore of [IvoryCKEditorBundle](https://github.com/egeloen/IvoryCKEditorBundle)
``` php
# Delete this in AppKernel.php
new Knp\Bundle\MarkdownBundle\KnpMarkdownBundle(),
new Sonata\FormatterBundle\SonataFormatterBundle(),
```

### __Configuration__

The configuration of IvoryCKEditorBundle no longer part of default Core configuration, to leave it simply accessed.

``` yaml
# Add this line in app/config/config.yml
 - { resource: @Th3MoukCMSCoreBundle/Resources/config/bundles/ivory_ckeditor.yml }
# Remove this
 - 'SonataFormatterBundle:Form:formatter.html.twig'
```

### __Graphic__

Modification of the Super Admin Block

## 1.0.7

### __Upgrade on Symfony 2.7 LTS__

### __Composer Dependencies__

Resume the file `composer.json [63aaa12](https://github.com/Th3Mouk/CMSStarter/commit/63aaa12ffabf50d099755d1ecd02394117f4f00e)
