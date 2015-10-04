<?php
/**
 * This file is part of the vardius/admin-bundle package.
 *
 * (c) Rafał Lorenz <vardius@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vardius\Bundle\AdminBundle\Actions\Action;

/**
 * DeleteAction
 *
 * @author Rafał Lorenz <vardius@gmail.com>
 */
class DeleteAction extends \Vardius\Bundle\CrudBundle\Actions\Action\DeleteAction
{
    protected static $TEMPLATE_DIR = 'VardiusAdminBundle:Actions:';

    /**
     * @inheritDoc
     */
    public function getRouteDefinition()
    {
        $route = parent::getRouteDefinition();

        return array_merge($route, [
            'options' => ['i18n_prefix' => 'admin']
        ]);
    }
}
