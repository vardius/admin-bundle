<?php
/**
 * This file is part of the vardius/admin-bundle package.
 *
 * Created by Rafał Lorenz <vardius@gmail.com>.
 */

namespace Vardius\Bundle\AdminBundle\Controller\Factory;

use Symfony\Component\Form\AbstractType;
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
        $view = $view ?: 'VardiusAdminBundle:Actions:';

        return parent::get($entityName, '/admin' . $routePrefix, $listViewProvider, $formType, $view, $actions);
    }
}
