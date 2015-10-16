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

use Symfony\Component\OptionsResolver\OptionsResolver;
use Vardius\Bundle\CrudBundle\Controller\CrudController;

/**
 * ExportAction
 *
 * @author Rafał Lorenz <vardius@gmail.com>
 */
class ExportAction extends \Vardius\Bundle\CrudBundle\Actions\Action\ExportAction
{
    /**
     * @inheritDoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefault('options', ['i18n_prefix' => 'admin']);
    }

    /**
     * @inheritDoc
     */
    protected function getResponseHandler(CrudController $controller)
    {
        return $controller->get('vardius_admin.response.handler');
    }

}
