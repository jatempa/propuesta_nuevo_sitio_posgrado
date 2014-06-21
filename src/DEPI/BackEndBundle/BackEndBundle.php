<?php

namespace DEPI\BackEndBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BackEndBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
