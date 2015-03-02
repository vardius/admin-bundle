<?php
/**
 * This file is part of the vardius/admin-bundle package.
 *
 * Created by Rafał Lorenz <vardius@gmail.com>.
 */

namespace Vardius\Bundle\AdminBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Vardius\Bundle\AdminBundle\Controller\DashboardController
 *
 * @author Rafał Lorenz <vardius@gmail.com>
 *
 * @Route("/dashboard")
 */
class DashboardController extends Controller
{
    /**
     * @Template()
     * @Route("/", name="dashboard")
     * @return array
     */
    public function indexAction()
    {
        return [];
    }
}
