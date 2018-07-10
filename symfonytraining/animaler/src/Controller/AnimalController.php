<?php

namespace App\Controller;


use App\Entity\Animal;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AnimalController extends Controller
{

	/**
	 * @Route("/animal", name="animal")
	 */
	public function index()
	{
		return $this->render('animal/index.html.twig', [
			'controller_name' => 'AnimalController',
		]);
	}

	/**
	 * @Route("/animal/create/{name}/{race}", name="animal_create")
	 */
	public function create(string $name, string $race) {
		$session = new Session();

		$a = new Animal();
		$a->setName($name);
		$a->setRace($race);

		// $anims = array();
		$anims = (array)$session->get('animals');
		// $anims[] = $a;
		if (!$anims) {
			$anims = array();
		}
		$anims[] = $a;
		$session->set('animals', $anims);

		$session->getFlashBag()->add('notice', 'Animal created !');

		return $this->render('animal/list.html.twig', [
			'success' => true,
			'animals' => $anims,
		]);
	}

	/**
	 * @Route("/animal/list", name="animal")
	 */
	public function list()
	{
		$session = new Session();

		return $this->render('animal/list.html.twig', [
			'animals' => $session->get('animals'),
		]);
	}
}
