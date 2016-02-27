<?php

namespace Symfonico\ConsorcioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfonico\ConsorcioBundle\Entity\Consorcio;
use Symfonico\ConsorcioBundle\Entity\Propiedad;
use Symfonico\ConsorcioBundle\Form\PropiedadType;

/**
 * Consorcio controller.
 *
 * @Route("/{consorcioSlug}/propiedad")
 * @Security("has_role('ROLE_ADMIN')")
 */
class PropiedadController extends Controller
{

    /**
     * Lists all Propiedades entities.
     *
     * @Route("/", name="configuracion_propiedad", defaults={"page" = 1})
     * @Route("/page/{page}", name="configuracion_propiedad_paginated", requirements={"page" : "\d+"})
     * @ParamConverter("consorcio", options = {"mapping": {"consorcioSlug": "slug"}})
     * @Method("GET")
     * @Template()
     */
    public function indexAction(Consorcio $consorcio, $consorcioSlug, $page)
    {

        $query = $this->getDoctrine()->getRepository('Symfonico\ConsorcioBundle\:Propiedad')->findByConsorcio($consorcio->getId());

        $paginator = $this->get('knp_paginator');
        $entities = $paginator->paginate($query, $page, Propiedad::NUM_ITEMS);
        $entities->setUsedRoute('configuracion_propiedad_paginated');

        return array(
            'entities' => $entities,
            'consorcio' => $consorcio,
        );
    }


    /**
     * Displays a form to create a new Consorcio entity.
     *
     * @Route("/new", name="configuracion_propiedad_new")
     * @ParamConverter("consorcio", options = {"mapping": {"consorcioSlug": "slug"}})
     * @Method("GET")
     * @Template()
     */
    public function newAction(Consorcio $consorcio)
    {
        $entity = new Propiedad();
        $form   = $this->createCreateForm($entity, $consorcio);

        return array(
            'entity' => $entity,
            'consorcio' => $consorcio,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Consorcio entity.
     *
     * @Route("/", name="configuracion_propiedad_create")
     * @ParamConverter("consorcio", options = {"mapping": {"consorcioSlug": "slug"}})
     * @Method("POST")
     * @Template("Symfonico\ConsorcioBundle\:Propiedad:new.html.twig")
     */
    public function createAction(Request $request, Consorcio $consorcio)
    {
        $entity = new Propiedad();
        $entity->setConsorcio($consorcio);
        $form = $this->createCreateForm($entity, $consorcio);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->addFlash('success', '¡Ha creado una propiedad.!');

            return $this->redirect(
                $this->generateUrl(
                    'configuracion_propiedad',
                    [
                        'consorcioSlug' => $consorcio->getSlug()
                    ]
                )
            );
        }

        return array(
            'entity' => $entity,
            'consorcio' => $consorcio,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Consorcio entity.
     *
     * @param Consorcio $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Propiedad $entity, Consorcio $consorcio)
    {
        $form = $this->createForm(new PropiedadType(), $entity, array(
            'action' => $this->generateUrl('configuracion_propiedad_create',array('consorcioSlug' => $consorcio->getSlug())),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }
}
