<?php

namespace App\Controller;

use App\Entity\Utili;
use App\Model\Utilisateur;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CtrlSecController extends Controller
{
    /**
     * @Route("/ctrl/sec", name="ctrl_sec")
     */
    public function index()
    {   
        // $nom = 'Say my name';
        $util = new Utilisateur("firstname", "lastname", "0102040506");
        return $this->render('ctrl_sec/index.html.twig', [
            'controller_name' => 'CtrlSecController',
            'util' => $util,
        ]);
    }
    /**
     * @Route("/ctrl/sec/whoami/{fname}/{lname}", name="whoami")
     */
    public function whoami(string $fname, string $lname) {
        return $this->render('ctrl_sec/whoami.html.twig', [
                                                            'fname' => $fname,
                                                            'lname' => $lname,
                                                        ]);
	 }
	 
	/** 
	 * @Route("/ctrl/sec/list", name="list")
	*/
	public function listAction()
	{
		 $u1 = new Utilisateur("Not", "Myname", "764646");
		 $u2 = new Utilisateur("Its", "Yourname", "6456456");
		 $u3 = new Utilisateur("Shut", "Up", "4564536456664");

		 $list = [
			$u1,
			$u2,
			$u3,
		 ];

		  return $this->render('ctrl_sec/list.html.twig', [
			  "data"	=> $list,
		  ]);
	 }

	/** 
	 * @Route("/ctrl/sec/tests", name="tests")
	*/
	public function tests() {
		$u1 = new Utili("Not", "Myname", "764646");
		$u2 = new Utili("Its", "Yourname", "6456456");
		$u3 = new Utili("Shut", "Up", "4564536456664");

		$list = [
			$u1,
			$u2,
			$u3,
		];

		return $this->render('ctrl_sec/tests.html.twig', [
			"data"	=> $list,
		]);
	}
}
