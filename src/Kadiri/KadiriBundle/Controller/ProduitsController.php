<?php

namespace Kadiri\KadiriBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Kadiri\KadiriBundle\Entity\Produits;
use Kadiri\KadiriBundle\Form\ProduitsType;

/**
 * Produits controller.
 *
 */
class ProduitsController extends Controller
{
    /**
     * Lists all Produits entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $produits = $em->getRepository('KadiriBundle:Produits')->findAll();

        return $this->render('KadiriBundle:produits:index.html.twig', array(
            'produits' => $produits,
        ));
    }

    /**
     * Creates a new Produits entity.
     *
     */
    public function newAction(Request $request)
    {
        $produit = new Produits();
        $form = $this->createForm('Kadiri\KadiriBundle\Form\ProduitsType', $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($produit);
            $em->flush();

            return $this->redirectToRoute('produits_show', array('id' => $produit->getId()));
        }

        return $this->render('KadiriBundle:produits:new.html.twig', array(
            'produit' => $produit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Produits entity.
     *
     */
    public function showAction(Produits $produit)
    {
        $deleteForm = $this->createDeleteForm($produit);

        return $this->render('KadiriBundle:produits:show.html.twig', array(
            'produit' => $produit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Produits entity.
     *
     */
    public function editAction(Request $request, Produits $produit)
    {
        $deleteForm = $this->createDeleteForm($produit);
        $editForm = $this->createForm('Kadiri\KadiriBundle\Form\ProduitsType', $produit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($produit);
            $em->flush();

            return $this->redirectToRoute('produits_edit', array('id' => $produit->getId()));
        }

        return $this->render('KadiriBundle:produits:edit.html.twig', array(
            'produit' => $produit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Produits entity.
     *
     */
    public function deleteAction(Request $request, Produits $produit)
    {
        $form = $this->createDeleteForm($produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($produit);
            $em->flush();
        }

        return $this->redirectToRoute('produits_index');
    }

    /**
     * Creates a form to delete a Produits entity.
     *
     * @param Produits $produit The Produits entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Produits $produit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('produits_delete', array('id' => $produit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}