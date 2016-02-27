<?php

/*
 * This file is part of the Elcodi package.
 *
 * Copyright (c) 2014-2015 Elcodi.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 * @author Aldo Chiecchia <zimage@tiscali.it>
 * @author Elcodi Team <tech@elcodi.com>
 */

namespace Admin\CoreBundle\Controller\Abstracts;

use Closure;
use Doctrine\Common\Persistence\ObjectManager;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Elcodi\Component\Core\Entity\Interfaces\EnabledInterface;

/**
 * Class AbstractAdminController
 */
class AbstractAdminController extends Controller
{

    /**
     * Save an entity. To ensure the method is simple, the entity will be
     * persisted always
     *
     * @param mixed $entity Entity
     *
     * @return $this self Object
     */
    protected function flush($entity)
    {
        $em = $this->getDoctrine()->getManager();
        $em->persist($entity);
        $em->flush()

        return $this;
    }

}
