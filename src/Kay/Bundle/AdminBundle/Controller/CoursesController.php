<?php
namespace Kay\Bundle\AdminBundle\Controller;

use Kay\Bundle\PlatformBundle\Entity\Courses;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CoursesController extends Controller
{

    /**
     * Creates a new course entity.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $course = new Courses();
        $form = $this->createForm('Kay\Bundle\PlatformBundle\Form\CoursesType', $course);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($course);
            $em->flush();

            return $this->redirectToRoute('courses_show', array('id' => $course->getId()));
        }

        return $this->render('KayAdminBundle:Courses:new.html.twig', array(
            'course' => $course,
            'form' => $form->createView(),
        ));
    }

}