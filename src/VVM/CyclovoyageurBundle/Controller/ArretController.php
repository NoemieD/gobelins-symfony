<?php

namespace VVM\CyclovoyageurBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use VVM\CyclovoyageurBundle\Entity\Arret;
use VVM\CyclovoyageurBundle\Form\ArretType;

/**
 * Arret controller.
 *
 */
class ArretController extends Controller
{

    /**
     * Lists all Arret entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VVMCyclovoyageurBundle:Arret')->findAll();

        return $this->render('VVMCyclovoyageurBundle:Arret:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Arret entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Arret();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('arret_show', array('id' => $entity->getId())));
        }

        return $this->render('VVMCyclovoyageurBundle:Arret:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Arret entity.
     *
     * @param Arret $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Arret $entity)
    {
        $form = $this->createForm(new ArretType(), $entity, array(
            'action' => $this->generateUrl('arret_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Arret entity.
     *
     */
    public function newAction()
    {
        $entity = new Arret();
        $form   = $this->createCreateForm($entity);

        return $this->render('VVMCyclovoyageurBundle:Arret:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Arret entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VVMCyclovoyageurBundle:Arret')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Arret entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VVMCyclovoyageurBundle:Arret:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Arret entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VVMCyclovoyageurBundle:Arret')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Arret entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VVMCyclovoyageurBundle:Arret:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Arret entity.
    *
    * @param Arret $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Arret $entity)
    {
        $form = $this->createForm(new ArretType(), $entity, array(
            'action' => $this->generateUrl('arret_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Arret entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VVMCyclovoyageurBundle:Arret')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Arret entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('arret_edit', array('id' => $id)));
        }

        return $this->render('VVMCyclovoyageurBundle:Arret:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Arret entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VVMCyclovoyageurBundle:Arret')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Arret entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('arret'));
    }

    /**
     * Creates a form to delete a Arret entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('arret_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
