<?php
/**
 * This file is part of the vardius/admin-bundle package.
 *
 * Created by Rafał Lorenz <vardius@gmail.com>.
 */

namespace Vardius\Bundle\AdminBundle\Controller\Factory;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Component\Form\AbstractType;
use Vardius\Bundle\CrudBundle\Controller\CrudController;
use Vardius\Bundle\CrudBundle\Data\Provider\Doctrine\DataProvider;
use Vardius\Bundle\ListBundle\ListView\Provider\ListViewProviderInterface;

/**
 * Vardius\Bundle\AdminBundle\Controller\Factory\CrudControllerFactory
 *
 * @author Rafał Lorenz <vardius@gmail.com>
 */
class CrudControllerFactory extends \Vardius\Bundle\CrudBundle\Controller\Factory\CrudControllerFactory
{
    /**
     * @inheritDoc
     */
    public function get($entityName, $routePrefix = '', ListViewProviderInterface $listViewProvider = null, AbstractType $formType = null, $view = null, array $actions = [])
    {
        return parent::get($entityName, '/admin' . $routePrefix, $listViewProvider, $formType, $view, $actions);
    }
}
