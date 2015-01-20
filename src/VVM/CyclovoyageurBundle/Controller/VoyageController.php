<?php

namespace VVM\CyclovoyageurBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use VVM\CyclovoyageurBundle\Entity\Voyage;
use VVM\CyclovoyageurBundle\Form\VoyageType;

/**
 * Voyage controller.
 *
 */
class VoyageController extends Controller
{

    /**
     * Lists all Voyage entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VVMCyclovoyageurBundle:Voyage')->findAll();

        return $this->render('VVMCyclovoyageurBundle:Voyage:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Voyage entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Voyage();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('voyage_show', array('id' => $entity->getId())));
        }

        return $this->render('VVMCyclovoyageurBundle:Voyage:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Voyage entity.
     *
     * @param Voyage $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Voyage $entity)
    {
        $form = $this->createForm(new VoyageType(), $entity, array(
            'action' => $this->generateUrl('voyage_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Voyage entity.
     *
     */
    public function newAction()
    {
        $entity = new Voyage();
        $form   = $this->createCreateForm($entity);

        return $this->render('VVMCyclovoyageurBundle:Voyage:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Voyage entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VVMCyclovoyageurBundle:Voyage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Voyage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VVMCyclovoyageurBundle:Voyage:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Voyage entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VVMCyclovoyageurBundle:Voyage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Voyage entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VVMCyclovoyageurBundle:Voyage:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Voyage entity.
    *
    * @param Voyage $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Voyage $entity)
    {
        $form = $this->createForm(new VoyageType(), $entity, array(
            'action' => $this->generateUrl('voyage_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Voyage entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VVMCyclovoyageurBundle:Voyage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Voyage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('voyage_edit', array('id' => $id)));
        }

        return $this->render('VVMCyclovoyageurBundle:Voyage:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Voyage entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VVMCyclovoyageurBundle:Voyage')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Voyage entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('voyage'));
    }

    /**
     * Creates a form to delete a Voyage entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('voyage_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
