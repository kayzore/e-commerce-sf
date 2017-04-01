<?php

namespace Kay\Bundle\PlatformBundle\Controller;

use Kay\Bundle\PlatformBundle\Entity\Chapter;
use Kay\Bundle\PlatformBundle\Entity\Courses;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Course controller.
 *
 */
class CoursesController extends Controller
{
    /**
     * Lists all course entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $courseRepository = $em->getRepository('KayPlatformBundle:Courses');

        if ($tag = $request->query->get('tag')) {
            $courses = $courseRepository->getByTag($tag);
        } else {
            $courses = $courseRepository->getAll();
        }

        return $this->render('KayPlatformBundle:Courses:index.html.twig', array(
            'courses' => $courses,
        ));
    }

    /**
     * Creates a new course entity.
     *
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

        return $this->render('KayPlatformBundle:Courses:new.html.twig', array(
            'course' => $course,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a course entity.
     *
     */
    public function showAction(Courses $course)
    {
        $deleteForm = $this->createDeleteForm($course);

        $chapterForm = $this->createForm('Kay\Bundle\PlatformBundle\Form\ChapterType', new Chapter());

        return $this->render('KayPlatformBundle:Courses:show.html.twig', array(
            'course'        => $course,
            'delete_form'   => $deleteForm->createView(),
            'chapter_form'  => $chapterForm->createView()
        ));
    }

    /**
     * Displays a form to edit an existing course entity.
     *
     */
    public function editAction(Request $request, Courses $course)
    {
        $deleteForm = $this->createDeleteForm($course);
        $editForm = $this->createForm('Kay\Bundle\PlatformBundle\Form\CoursesType', $course);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('courses_edit', array('id' => $course->getId()));
        }

        return $this->render('KayPlatformBundle:Courses:edit.html.twig', array(
            'course' => $course,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a course entity.
     *
     */
    public function deleteAction(Request $request, Courses $course)
    {
        $form = $this->createDeleteForm($course);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($course);
            $em->flush();
        }

        return $this->redirectToRoute('courses_index');
    }

    /**
     * Creates a form to delete a course entity.
     *
     * @param Courses $course The course entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Courses $course)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('courses_delete', array('id' => $course->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
