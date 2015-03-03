Vardius - Admin Bundle
======================================

Admin Bundle CMS

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/aeb8a350-e04c-4cc5-86cc-e1a207325fa0/big.png)](https://insight.sensiolabs.com/projects/aeb8a350-e04c-4cc5-86cc-e1a207325fa0)

ABOUT
==================================================
Contributors:

* [Rafał Lorenz](http://rafallorenz.com)

Want to contribute ? Feel free to send pull requests!

Have problems, bugs, feature ideas?
We are using the github [issue tracker](https://github.com/vardius/admin-bundle/issues) to manage them.

HOW TO USE
==================================================

Installation
----------------
1. Download using composer
2. Enable the VardiusAdminBundle
3. Add roles
4. Configure the VardiusAdminBundle
5. Add items to admin menu
6. Create crud actions under admin route

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

### 4. Configure the VardiusAdminBundle

If you want to enable username
config.yml

``` yaml
    #app/config/cinfig.yml
    
    twig:
        form:
            resources: ['bootstrap_3_horizontal_layout.html.twig']
    
    vardius_user:
        username: true #default false
        email_from: some@email.com #default hostname
```
        
routing.yml

``` yaml
    #app/config/routing.yml
    
    vardius_admin:
        resource: "@VardiusAdminBundle/Resources/config/routing.yml"
        prefix:   /
```
        
security.yml

``` yaml
    #app/config/security.yml
    
    encoders:
        Vardius\Bundle\UserBundle\Entity\User:
            algorithm: bcrypt
            cost: 12

    role_hierarchy:
        ROLE_ADMIN:       ROLE_USER
        ROLE_SUPER_ADMIN: [ ROLE_ADMIN, ROLE_ALLOWED_TO_SWITCH ]

    providers:
        vardius:
            id: vardius_user.user_provider

    firewalls:
        admin_area:
            pattern:    ^/admin
            anonymous: ~
            form_login:
                login_path: login_route
                check_path: login_check
                csrf_provider: form.csrf_provider
            logout:
                path:   logout_route
                target: login_route
                invalidate_session: true
            remember_me:
                key:      "%secret%"
                lifetime: 31536000 # 365 days in seconds
                path:     /admin
                domain:   ~ # Defaults to the current domain from $_SERVER

    access_control:
        - { path: ^/admin/login, roles: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: ^/admin/register, roles: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: ^/admin/password-reset, roles: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: ^/admin, roles: ROLE_ADMIN }
        - { path: ^/, roles: IS_AUTHENTICATED_ANONYMOUSLY }
```

### 5. Add items to admin menu
Follow the steps from documentation [Vardius Menu Bundle](https://github.com/Vardius/menu-bundle)
add menu items to `admin_menu`

``` php
    //AcmeBundle\EventListener\MenuSubscriber
    
    public static function getSubscribedEvents()
    {
        return array(
            MenuEvents::MENU => 'onMenu',
        );
    }
    
    public function onMenu(MenuEvent $event)
    {
        $menu = $event->getMenu();
        if ($menu->getName() === 'admin_menu') {
    
            $menu->addChild(new MenuItem('Page Name', 'page_path'));
        }
    }
```

### 6. Create crud actions under admin route
Follow the steps from documentation [Vardius User Bundle](https://github.com/Vardius/user-bundle)

use `vardius_admin.controller.factory` as a factory service

``` xml
    <service id="acme.crud_controller.product" class="%vardius_crud.controller.class%" factory-service="vardius_admin.controller.factory" factory-method="get">
        <argument>AcmeBundle:Product</argument>
        <argument>/products</argument>
        <argument type="service" id="acme.product.list_view"/>
        <argument type="service" id="acme.form.type.product"/>
    
        <tag name="vardius_crud.controller" />
    </service>
```

RELEASE NOTES
==================================================
**0.1.0**

- First public release of admin-bundle
