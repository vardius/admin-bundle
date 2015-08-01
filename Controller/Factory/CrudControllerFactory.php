<?php
/**
 * This file is part of the vardius/admin-bundle package.
 *
 * Created by Rafał Lorenz <vardius@gmail.com>.
 */

namespace Vardius\Bundle\AdminBundle\Controller\Factory;

use Symfony\Component\Form\AbstractType;
use Vardius\Bundle\CrudBundle\Manager\CrudManagerInterface;
use Vardius\Bundle\ListBundle\ListView\Provider\ListViewProviderInterface;

/**
 * CrudControllerFactory
 *
 * @author Rafał Lorenz <vardius@gmail.com>
 */
class CrudControllerFactory extends \Vardius\Bundle\CrudBundle\Controller\Factory\CrudControllerFactory
{
    public function get($entityName, $routePrefix = '', ListViewProviderInterface $listViewProvider = null, AbstractType $formType = null, CrudManagerInterface $crudManager = null, $view = null, array $actions = [])
    {
        return parent::get($entityName, '/admin' . $routePrefix, $listViewProvider, $formType, $crudManager, $view, $actions);
    }

}
