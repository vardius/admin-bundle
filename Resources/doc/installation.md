Vardius - Admin Bundle
======================================

Installation
----------------

### 1. Download using composer

Install the package through composer:

``` bash
    php composer.phar require vardius/admin-bundle:*
```

### 2. Enable the VardiusAdminBundle
Enable the bundle in the kernel:

``` php
    <?php
    // app/AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Vardius\Bundle\UserBundle\VardiusUserBundle(),
            new Vardius\Bundle\AdminBundle\VardiusAdminBundle(),
        );
        
        if (...) {
            // ...
            $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle();
        };
            
        // ...
    }
```
    
### 3. Add roles
Add roles to database:

``` bash
    php app/console doctrine:fixtures:load --fixtures=src/Vardius/Bundle/UserBundle/DataFixtures/ORM --append
```
