<?php

namespace DEPI\BackEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Usuario
 *
 * @ORM\Table(name="usuarios")
 * @ORM\Entity
 */
class Usuario extends BaseUser
{
	/**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
	protected $id;

	public function __construct()
	{
		parent::__construct();
	}

	public function addRole($rol)
	{
		if($rol == 1) {
			array_push($this->roles, 'ROLE_ADMIN');
		} else if($rol == 2) {
			array_push($this->roles, 'ROLE_USER');
		}
	}
}