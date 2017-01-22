<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use AppBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class DefaultController extends Controller
{
    /**
     * @Route("")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }



    /**
     * @Route("/listUser",name="list")
     * @Template()
     */
    public function listUserAction()
    {
        $users = $this->getDoctrine()->getRepository("AppBundle:User")->findAll();
        return array('users' => $users );
    }

    /**
     * @Route("/formUser",name="form")
     * @Template()
     */
    public function formUserAction(Request $request)
    {
        $user = new User();
        $form = $this->get('form.factory')->create(new UserType(), $user);
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $params = array(
                'users' => $em->getRepository(User::class)->findAll()
            );
            return $this->render('AppBundle:listUser.html.twig',$params);
        }


    }


    /**
     * @Route("/updateUser/{id}",name="update")
     * @Template()
     */
    public function updateUserAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->find($id);
        $form = $this->get('form.factory')->create(new UserType(), $user);
        if ($form->handleRequest($request)->isValid()) {
            //$em->persist($user);
            $em->flush();
            $params = array(
                'users' => $em->getRepository(User::class)->findAll()
            );
            return $this->render('AppBundle:listUser.html.twig',$params);
        }
        return array('form' => $form->createView());
    }


    /**
     * @Route("/deleteUser/{id}",name="delete")
     * @Template()
     */
    public function deleteUserAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->find($id);
        if(!$user)
        {
            throw $this->createNotFoundException('User avec l\'id' . ' n\'existe pas ');
        }
        $em->remove($user);
        $em->flush();

        $params = array(
            'users' => $em->getRepository(User::class)->findAll()
        );
        return $this->render('AppBundle:listUser.html.twig',$params);
    }




}
