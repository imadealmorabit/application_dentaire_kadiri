<?php

namespace Kadiri\KadiriBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Kadiri\KadiriBundle\Entity\medecin;
use Kadiri\KadiriBundle\Form\medecinType;

/**
 * commande controller.
 *
 */
class commandeController extends Controller
{
    /**
     * Lists all medecin entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $medecins = $em->getRepository('KadiriBundle:medecin')->findAll();

        return $this->render('KadiriBundle:commande:index.html.twig', array(
            'medecins' => $medecins,
        ));
    }

    /**
     * Creates a new medecin entity.
     *
     */
    public function newAction(Request $request)
    {
        $medecin = new medecin();
        $form = $this->createForm('Kadiri\KadiriBundle\Form\medecinType', $medecin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($medecin);
            $em->flush();

            return $this->redirectToRoute('commande_show', array('id' => $medecin->getId()));
        }

        return $this->render('KadiriBundle:commande:new.html.twig', array(
            'medecin' => $medecin,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a medecin entity.
     *
     */
    public function showAction(medecin $medecin)
    {
        $deleteForm = $this->createDeleteForm($medecin);

        return $this->render('KadiriBundle:commande:show.html.twig', array(
            'medecin' => $medecin,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing medecin entity.
     *
     */
    public function editAction(Request $request, medecin $medecin)
    {
        $deleteForm = $this->createDeleteForm($medecin);
        $editForm = $this->createForm('Kadiri\KadiriBundle\Form\medecinType', $medecin);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($medecin);
            $em->flush();

            return $this->redirectToRoute('commande_edit', array('id' => $medecin->getId()));
        }

        return $this->render('KadiriBundle:commande:edit.html.twig', array(
            'medecin' => $medecin,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a medecin entity.
     *
     */
    public function deleteAction(Request $request, medecin $medecin)
    {
        $form = $this->createDeleteForm($medecin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($medecin);
            $em->flush();
        }

        return $this->redirectToRoute('commande_index');
    }

    /**
     * Creates a form to delete a medecin entity.
     *
     * @param medecin $medecin The medecin entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(medecin $medecin)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('commande_delete', array('id' => $medecin->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}