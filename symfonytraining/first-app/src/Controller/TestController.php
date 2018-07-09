<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class TestController extends Controller {

	/**
	 * @Route("/home",name="home")
	 */
	public function home()
	{
		 return $this->render('index.html.twig', [
																	'test'	=> true,
																]);
		// return new Response('test');
	}
	
}
