<?php
/**
 * This file is part of the vardius/admin-bundle package.
 *
 * Created by Rafał Lorenz <vardius@gmail.com>.
 */

namespace Vardius\Bundle\AdminBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Vardius\Bundle\AdminBundle\VardiusAdminBundle
 *
 * @author Rafał Lorenz <vardius@gmail.com>
 */
class VardiusAdminBundle extends Bundle
{
    public function getParent()
    {
        return 'VardiusUserBundle';
    }
}
