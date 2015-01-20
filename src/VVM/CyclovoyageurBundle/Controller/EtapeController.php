<?php

namespace VVM\CyclovoyageurBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use VVM\CyclovoyageurBundle\Entity\Etape;
use VVM\CyclovoyageurBundle\Form\EtapeType;

/**
 * Etape controller.
 *
 */
class EtapeController extends Controller
{

    /**
     * Lists all Etape entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VVMCyclovoyageurBundle:Etape')->findAll();

        return $this->render('VVMCyclovoyageurBundle:Etape:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Etape entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Etape();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('etape_show', array('id' => $entity->getId())));
        }

        return $this->render('VVMCyclovoyageurBundle:Etape:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Etape entity.
     *
     * @param Etape $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Etape $entity)
    {
        $form = $this->createForm(new EtapeType(), $entity, array(
            'action' => $this->generateUrl('etape_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Etape entity.
     *
     */
    public function newAction()
    {
        $entity = new Etape();
        $form   = $this->createCreateForm($entity);

        return $this->render('VVMCyclovoyageurBundle:Etape:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Etape entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VVMCyclovoyageurBundle:Etape')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Etape entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VVMCyclovoyageurBundle:Etape:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Etape entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VVMCyclovoyageurBundle:Etape')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Etape entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VVMCyclovoyageurBundle:Etape:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Etape entity.
    *
    * @param Etape $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Etape $entity)
    {
        $form = $this->createForm(new EtapeType(), $entity, array(
            'action' => $this->generateUrl('etape_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Etape entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VVMCyclovoyageurBundle:Etape')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Etape entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('etape_edit', array('id' => $id)));
        }

        return $this->render('VVMCyclovoyageurBundle:Etape:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Etape entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VVMCyclovoyageurBundle:Etape')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Etape entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('etape'));
    }

    /**
     * Creates a form to delete a Etape entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('etape_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
