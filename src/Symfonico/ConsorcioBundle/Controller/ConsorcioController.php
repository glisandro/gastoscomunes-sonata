<?php

namespace Symfonico\ConsorcioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfonico\ConsorcioBundle\Entity\Consorcio;
use Symfonico\ConsorcioBundle\Entity\Propiedad;
use Symfonico\ConsorcioBundle\Form\ConsorcioType;

/**
 * Consorcio controller.
 *
 * @Route(
 *      path = "/consorcio",
 * )
 * @Security(
 *      "has_role('ROLE_ADMIN')"
 * )
 */
class ConsorcioController extends Controller
{

    /**
     * Lists all Consorcio entities.
     *
     * @Route(
     *      path = "/",
     *      name = "configuracion_consorcio",
     *      defaults = {"page" = 1}
     * )
     * @Route(
     *      path = "/page/{page}",
     *      name = "configuracion_consorcio_paginated",
     *      requirements = {"page" : "\d+"}
     * )
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page)
    {

        $query = $this
            ->getDoctrine()
            ->getRepository('Symfonico\ConsorcioBundle\:Consorcio')
            ->queryOrderByNombre();

        $paginator = $this->get('knp_paginator');
        $entities = $paginator->paginate($query, $page, Consorcio::NUM_ITEMS);
        $entities->setUsedRoute('configuracion_consorcio_paginated');

        return array('entities' => $entities);
    }
    /**
     * Creates a new Consorcio entity.
     *
     * @Route(
     *      "/", name="configuracion_consorcio_create")
     * @Method("POST")
     * @Template("Symfonico\ConsorcioBundle\:Consorcio:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Consorcio();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->addFlash('success', '¡Ha creado un nuevo consorcio.!');

            return $this->redirect($this->generateUrl('configuracion_consorcio'));
        }

        return array(
            'entity' => $entity,
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
    private function createCreateForm(Consorcio $entity)
    {
        $form = $this->createForm(new ConsorcioType(), $entity, array(
            'action' => $this->generateUrl('configuracion_consorcio_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Consorcio entity.
     *
     * @Route("/new", name="configuracion_consorcio_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Consorcio();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Consorcio entity.
     *
     * @Route("/{slug}", name="configuracion_consorcio_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction(Consorcio $entity)
    {
        //$em = $this->getDoctrine()->getManager();

        //$entity = $em->getRepository('Symfonico\ConsorcioBundle\:Consorcio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Consorcio entity.');
        }

        $deleteForm = $this->createDeleteForm($entity);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Consorcio entity.
     *
     * @Route("/{slug}/edit", name="configuracion_consorcio_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction(Consorcio $entity, $slug)
    {
        //$em = $this->getDoctrine()->getManager();

        //$entity = $em->getRepository('Symfonico\ConsorcioBundle\:Consorcio')->find($id);

        if (!$entity && $slug !== $entity->getSlug()) {
            throw $this->createNotFoundException('Unable to find Consorcio entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Consorcio entity.
    *
    * @param Consorcio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Consorcio $entity)
    {
        $form = $this->createForm(new ConsorcioType(), $entity, array(
            'action' => $this->generateUrl('configuracion_consorcio_update', array('slug' => $entity->getSlug())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Consorcio entity.
     *
     * @Route("/{slug}", name="configuracion_consorcio_update")
     * @Method("PUT")
     * @Template("Symfonico\ConsorcioBundle\:Consorcio:edit.html.twig")
     */
    public function updateAction(Request $request, Consorcio $entity)
    {
        $em = $this->getDoctrine()->getManager();
        
        //$entity = $em->getRepository('Symfonico\ConsorcioBundle\:Consorcio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Consorcio entity.');
        }

        $deleteForm = $this->createDeleteForm($entity);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            $this->addFlash('success', 'Se editó el consorcio correctamente.');

            return $this->redirect($this->generateUrl('configuracion_consorcio'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Consorcio entity.
     *
     * @Route("/{slug}", name="configuracion_consorcio_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Consorcio $entity)
    {
        $form = $this->createDeleteForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            ///$entity = $em->getRepository('Symfonico\ConsorcioBundle\:Consorcio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Consorcio entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('configuracion_consorcio'));
    }

    /**
     * Creates a form to delete a Consorcio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Consorcio $entity)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('configuracion_consorcio_delete', array('slug' => $entity->getSlug())))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    /**
     * Lists all Propiedades entities.
     *
     * @Route("/{slug}/propiedad", name="configuracion_consorcio_propiedad", defaults={"page" = 1})
     * @Route("/page/{page}", name="configuracion_consorcio_propiedad_paginated", requirements={"page" : "\d+"})
     * @Method("GET")
     * @Template()
     */
    public function propiedadAction(Consorcio $consorcio, $page)
    {

        $query = $this->getDoctrine()->getRepository('Symfonico\ConsorcioBundle\:Propiedad')->findByConsorcio($consorcio->getId());

        $paginator = $this->get('knp_paginator');
        $entities = $paginator->paginate($query, $page, Propiedad::NUM_ITEMS);
        $entities->setUsedRoute('configuracion_consorcio_paginated');

        return array('entities' => $entities);
    }


    /**
     * Displays a form to create a new Consorcio entity.
     *
     * @Route("/new", name="configuracion_consorcio_propiedad_new")
     * @Method("GET")
     * @Template()
     */
    public function newPropiedadAction()
    {
        $entity = new Consorcio();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Consorcio entity.
     *
     * @Route("/", name="configuracion_consorcio_propiedad_create")
     * @Method("POST")
     * @Template("Symfonico\ConsorcioBundle\:Consorcio:new.html.twig")
     */
    public function createPropiedadAction(Request $request)
    {
        $entity = new Consorcio();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->addFlash('success', '¡Ha creado una propiedad.!');

            return $this->redirect($this->generateUrl('configuracion_consorcio_propiedad'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
}
