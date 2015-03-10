<?php

namespace Virgin\ChannelGuideBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Virgin\ChannelGuideBundle\Entity\RegionalisedChannel;
use Virgin\ChannelGuideBundle\Form\RegionalisedChannelType;

/**
 * RegionalisedChannel controller.
 *
 */
class RegionalisedChannelController extends Controller
{

    /**
     * Lists all RegionalisedChannel entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VirginChannelGuideBundle:RegionalisedChannel')->findAll();

        return $this->render('VirginChannelGuideBundle:RegionalisedChannel:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new RegionalisedChannel entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new RegionalisedChannel();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('regionalisedchannel_show', array('id' => $entity->getId())));
        }

        return $this->render('VirginChannelGuideBundle:RegionalisedChannel:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a RegionalisedChannel entity.
     *
     * @param RegionalisedChannel $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(RegionalisedChannel $entity)
    {
        $form = $this->createForm(new RegionalisedChannelType(), $entity, array(
            'action' => $this->generateUrl('regionalisedchannel_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new RegionalisedChannel entity.
     *
     */
    public function newAction()
    {
        $entity = new RegionalisedChannel();
        $form   = $this->createCreateForm($entity);

        return $this->render('VirginChannelGuideBundle:RegionalisedChannel:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a RegionalisedChannel entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VirginChannelGuideBundle:RegionalisedChannel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RegionalisedChannel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VirginChannelGuideBundle:RegionalisedChannel:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing RegionalisedChannel entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VirginChannelGuideBundle:RegionalisedChannel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RegionalisedChannel entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VirginChannelGuideBundle:RegionalisedChannel:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a RegionalisedChannel entity.
    *
    * @param RegionalisedChannel $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(RegionalisedChannel $entity)
    {
        $form = $this->createForm(new RegionalisedChannelType(), $entity, array(
            'action' => $this->generateUrl('regionalisedchannel_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing RegionalisedChannel entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VirginChannelGuideBundle:RegionalisedChannel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RegionalisedChannel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('regionalisedchannel_edit', array('id' => $id)));
        }

        return $this->render('VirginChannelGuideBundle:RegionalisedChannel:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a RegionalisedChannel entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VirginChannelGuideBundle:RegionalisedChannel')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find RegionalisedChannel entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('regionalisedchannel'));
    }

    /**
     * Creates a form to delete a RegionalisedChannel entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('regionalisedchannel_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
