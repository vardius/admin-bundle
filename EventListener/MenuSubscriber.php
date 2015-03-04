<?php
/**
 * This file is part of the vardius/admin-bundle package.
 *
 * Created by Rafał Lorenz <vardius@gmail.com>.
 */

namespace Vardius\Bundle\AdminBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Vardius\Bundle\MenuBundle\Event\MenuEvent;
use Vardius\Bundle\MenuBundle\Event\MenuEvents;
use Vardius\Bundle\MenuBundle\Menu\Item\MenuItem;

/**
 * Vardius\Bundle\AdminBundle\EventListener\MenuSubscriber
 *
 * @author Rafał Lorenz <vardius@gmail.com>
 */
class MenuSubscriber implements EventSubscriberInterface
{
    /**
     * {@inheritdoc}
     */
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

            $menu->addChild(new MenuItem('menu.dashboard', 'dashboard', [], 'fa-tachometer'));
        }
    }
}
