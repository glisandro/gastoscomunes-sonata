<?php
namespace Symfonico\ConsorcioBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use Sonata\AdminBundle\Admin\AdminInterface;

class PresupuestoAdmin extends Admin
{
    protected $parentAssociationMapping = 'consorcio';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
                ->add('consorcio','sonata_type_model',array('class' => 'Symfonico\ConsorcioBundle\Entity\Consorcio'))
                ->add('periodo', 'sonata_type_date_picker', array(
                        'dp_pick_time'       => true,
                        'dp_pick_time'       => false
                ))
            ->end()
            ->with('Presupuestos')
                ->add('presupuesto1','text')
                ->add('presupuesto2','text')
                ->add('presupuesto3','text')
                ->add('presupuesto4','text')
                ->add('presupuesto5','text')
                ->add('presupuesto6','text');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('periodo')
            ->add('presupuesto1')
            ->add('presupuesto2')
            ->add('presupuesto3')
            ->add('presupuesto4')
            ->add('presupuesto5');
    }

    public function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('periodo', 'doctrine_orm_date_range', array(
                'field_type' => 'sonata_type_date_range_picker',
            ))
            ->add('presupuesto1')
            ->add('presupuesto2')
            ->add('presupuesto3')
            ->add('presupuesto4')
            ->add('presupuesto5');
    }

    /**
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function setEntityManager($em)
    {
        $this->em = $em;
    }
    
}