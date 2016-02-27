<?php
namespace Symfonico\ConsorcioBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Knp\Menu\ItemInterface as MenuItemInterface;
use Sonata\AdminBundle\Admin\AdminInterface;

class ConsorcioAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('nombre', 'text');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('slug')
            ->add('nombre')
            
            // add custom action links
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'propiedades' => array(
                        'template' => 'ConsorcioBundle:ConsorcioAdmin:list__action_propiedades.html.twig'
                    ),
                    'presupuestos' => array(
                        'template' => 'ConsorcioBundle:ConsorcioAdmin:list__action_presupuestos.html.twig'
                    )
                )
            ))

             ;
    }

    /**
     * @param \Symfony\Component\Security\Core\SecurityContextInterface $securityContext
     */
    public function setSecurityContext(SecurityContextInterface $securityContext)
    {
        //$this->securityContext = $securityContext;
    }
    /*
    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
    {
        if (!$childAdmin && !in_array($action, array('edit'))) {
            return;
        }

        $admin = $this->isChild() ? $this->getParent() : $this;
        $id = $admin->getRequest()->get('id');

        $menu->addChild(
            "View",
            array('uri' => $admin->generateUrl('edit', array('id' => $id)))
        );

        $menu->addChild(
            "propiedades",
            array('uri' => $admin->generateUrl('admin.propiedad.list', array('id' => $id)))
        );

    }*/
}