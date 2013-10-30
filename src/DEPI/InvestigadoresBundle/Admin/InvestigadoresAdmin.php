<?php

namespace DEPI\InvestigadoresBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

class InvestigadoresAdmin extends Admin
{
	protected function configureListFields(ListMapper $mapper)
	{
		$mapper
			->add('nombre')
			->add('apellidoPaterno')
			->add('apellidoMaterno')
			->add('email')
			->add('telefono')
		;
	}
}



