<?php

namespace App\Controller;


use App\Entity\Animal;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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

	/**
	 * @Route("/animal/add", name="add_animal")
	 */
	public function add(Request $request) {$a = new Animal();

		$form = $this->createFormBuilder($a)
			->add('name', TextType::class)
			->add('race', TextType::class)
			->add('create', SubmitType::class, ['label' => 'Add animal'])
			->getForm();
		
		return $this->render('animal/add.html.twig', ['form' => $form->createView()]);
	}


	/**
	 * @Route("animal/new", name="animal_new")
	 */
	public function new(Request $req) {
		$session = new Session();
		$session->start();
		
		$a = new Animal();

		$form = $this->createFormBuilder()
			->add('name', TextType::class)
			->add('race', TextType::class)
			->add('create', SubmitType::class, ['label' => 'Add animal'])
			->getForm();
		
		$form->handleRequest($req);

		if($form->isSubmitted() && $form->isValid()){
			// $form->getData() holds the submitted values
			// but, the original `$a` variable has also been updated
			$a = $form->getData();

			// ... perform some action, such as saving the task to the database
			// for example, if Task is a Doctrine entity, save it!
			// $entityManager = $this->getDoctrine()->getManager();
			// $entityManager->persist($task);
			// $entityManager->flush();
			$session->getFlashBag()->add(
				'success',
				'Animal added !'
			);
			return $this->render('animal/success.html.twig', ['animal' => $a]);
		}
		$session->getFlashBag()->add(
			'warning',
			'Failed :('
		);

		return $this->render('animal/new.html.twig', array(
			'form' => $form->createView(),
	  ));
	}
}
