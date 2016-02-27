<?php
namespace Symfonico\ConsorcioBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use Sonata\AdminBundle\Admin\AdminInterface;

class PropiedadAdmin extends Admin
{
    protected $parentAssociationMapping = 'consorcio';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
                ->add('consorcio','sonata_type_model_hidden',array('class' => 'Symfonico\ConsorcioBundle\Entity\Consorcio'))
            /*->add('consorcio', 'sonata_type_model_list', array(
                ), array(
                    'placeholder' => 'No author selected'
                ))*/
            /*->add('consorcio', 'sonata_type_model_list', array(
                    'btn_add'       => 'Add author',      //Specify a custom label
                    'btn_list'      => 'button.list',     //which will be translated
                    'btn_delete'    => false,             //or hide the button.
                    'btn_catalogue' => 'Symfonico\ConsorcioBundle\' //Custom translation domain for buttons
                ))*/
            //->add('consorcio', 'sonata_type_admin', array(), array(
            //    'admin_code' => 'sonata.admin.consorcio'
            //))
                //->add('consorcio', 'sonata_type_admin')
                ->add('denominacion', 'text')
            ->end()
            ->with('Coeficientes')
                
                ->add('coeficiente1','text')
                ->add('coeficiente2','text')
                ->add('coeficiente3','text')
                ->add('coeficiente4','text')
                ->add('coeficiente5','text')
                ->add('coeficiente6','text')
                ->add('coeficiente7','text')
                ->add('coeficiente8','text')
                ->add('coeficiente8','text')
                ->add('coeficiente10','text');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('denominacion');
        $listMapper->add('coeficiente1');
        $listMapper->add('coeficiente2');
        $listMapper->add('coeficiente3');
        $listMapper->add('coeficiente4');
        $listMapper->add('coeficiente5');
        $listMapper->add('coeficiente6');
        $listMapper->add('coeficiente7');
        $listMapper->add('coeficiente8');
        $listMapper->add('coeficiente9');
        $listMapper->add('coeficiente10');

    }

    public function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('coeficiente1');
        $datagridMapper->add('coeficiente2');
        $datagridMapper->add('coeficiente3');
        $datagridMapper->add('coeficiente4');
        $datagridMapper->add('coeficiente5');
        $datagridMapper->add('coeficiente6');
        $datagridMapper->add('coeficiente7');
        $datagridMapper->add('coeficiente8');
        $datagridMapper->add('coeficiente9');
        $datagridMapper->add('coeficiente10');
    }

   /* public function getNewInstance()
    {
        $instance = parent::getNewInstance();
       
        //Pre-set consorcio
        if ($consorcio = $this->getPersistentParameter('consorcio')) {

            $instance->setCategory($consorcio);
        }
        //dump($consorcio);exit;
        return $instance;
    }*/

    public function getPersistentParameters()
    {
        if (!$this->hasRequest()) {
            return array();
        }
     
        $consorcio = $this->getRequest()->get('consorcio');
         //dump($consorcio);exit;
        return array('consorcio' => $consorcio);
    }

    /*protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('consorcio', null, array('show_filter' => true))
        ;

    }*/


    /**
     * @return array
     */
    //public function getFilterParameters()
    //{
       // $parameters = parent::getFilterParameters();
       // dump($parameters);
        /*return array_merge($parameters, array(
            'consorcio' => array('value' => $this->getThread()->getId())
        ));*/
    //}

    /**
     * @return CommentableInterface
     */
    /*protected function getParentObject()
    {
       // var_dump($this->getParent()->getObject());exit;
        return $this->getParent()->getObject($this->getParent()->getRequest()->get('id'));
    }*/

    /**
     * @return object Thread
     */
    protected function getConsorcio()
    {
        /** @var $threadRepository ThreadRepository */
        //var_dump($this->getParentObject()->getName());exit;
        $threadRepository = $this->em->getRepository('Symfonico\ConsorcioBundle\:Consorcio');
//dump($this->getParentObject());exit;
        return $threadRepository->findOneBy(array(
            'consorcios' => '1'
        ));
    }

    /**
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function setEntityManager($em)
    {
        $this->em = $em;
    }

    protected function configureTabMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
    {
        $menu->addChild('consorcio');
        $menu['consorcio']->addChild('propiedad');
    }

    
}