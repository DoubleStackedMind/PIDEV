<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\UserBundle\Controller;

use FOS\UserBundle\Event\FilterGroupResponseEvent;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseGroupEvent;
use FOS\UserBundle\Event\GroupEvent;
use FOS\UserBundle\Form\Factory\FactoryInterface;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Model\GroupInterface;
use FOS\UserBundle\Model\GroupManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * RESTful controller managing group CRUD.
 *
 * @author Thibault Duplessis <thibault.duplessis@gmail.com>
 * @author Christophe Coevoet <stof@notk.org>
 */
class GroupController extends Controller
{
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var FactoryInterface
     */
    private $formFactory;

    /**
     * @var GroupManagerInterface
     */
    private $groupManager;

    /**
     * @param EventDispatcherInterface $eventDispatcher
     * @param FactoryInterface         $formFactory
     * @param GroupManagerInterface    $groupManager
     */
    public function __construct(EventDispatcherInterface $eventDispatcher, FactoryInterface $formFactory, GroupManagerInterface $groupManager)
    {
        $this->eventDispatcher = $eventDispatcher;
        $this->formFactory = $formFactory;
        $this->groupManager = $groupManager;
    }

    /**
     * Show all groups.
     */
    public function listAction()
    {
        return $this->render('@FOSUser/Group/list.html.twig', array(
            'groups' => $this->groupManager->findGroups(),
        ));
    }

    /**
     * Show one group.
     *
     * @param string $groupName
     *
     * @return Response
     */
    public function showAction($groupName)
    {
        return $this->render('@FOSUser/Group/show.html.twig', array(
            'group' => $this->findGroupBy('name', $groupName),
        ));
    }

    /**
     * Edit one group, show the edit form.
     *
     * @param Request $request
     * @param string  $groupName
     *
     * @return Response
     */
    public function editAction(Request $request, $groupName)
    {
        $group = $this->findGroupBy('name', $groupName);

        $dispatcher = $this->eventDispatcher;

        $event = new GetResponseGroupEvent($group, $request);
        $dispatcher->dispatch(FOSUserEvents::GROUP_EDIT_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        $form = $this->formFactory->createForm();
        $form->setData($group);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $event = new FormEvent($form, $request);
            $dispatcher->dispatch(FOSUserEvents::GROUP_EDIT_SUCCESS, $event);

            $this->groupManager->updateGroup($group);

            if (null === $response = $event->getResponse()) {
                $url = $this->generateUrl('fos_user_group_show', array('groupName' => $group->getName()));
                $response = new RedirectResponse($url);
            }

            $dispatcher->dispatch(FOSUserEvents::GROUP_EDIT_COMPLETED, new FilterGroupResponseEvent($group, $request, $response));

            return $response;
        }

        return $this->render('@FOSUser/Group/edit.html.twig', array(
            'form' => $form->createView(),
            'group_name' => $group->getName(),
        ));
    }

    /**
     * Show the new form.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function newAction(Request $request)
    {
        $groupManager = $this->groupManager;
        $dispatcher = $this->eventDispatcher;

        $group = $groupManager->createGroup('');

        $dispatcher->dispatch(FOSUserEvents::GROUP_CREATE_INITIALIZE, new GroupEvent($group, $request));

        $form = $this->formFactory->createForm();
        $form->setData($group);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $event = new FormEvent($form, $request);
            $dispatcher->dispatch(FOSUserEvents::GROUP_CREATE_SUCCESS, $event);

            $groupManager->updateGroup($group);

            if (null === $response = $event->getResponse()) {
                $url = $this->generateUrl('fos_user_group_show', array('groupName' => $group->getName()));
                $response = new RedirectResponse($url);
            }

            $dispatcher->dispatch(FOSUserEvents::GROUP_CREATE_COMPLETED, new FilterGroupResponseEvent($group, $request, $response));

            return $response;
        }

        return $this->render('@FOSUser/Group/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * Delete one group.
     *
     * @param Request $request
     * @param string  $groupName
     *
     * @return RedirectResponse
     */
    public function deleteAction(Request $request, $groupName)
    {
        $group = $this->findGroupBy('name', $groupName);
        $this->groupManager->deleteGroup($group);

        $response = new RedirectResponse($this->generateUrl('fos_user_group_list'));

        $this->eventDispatcher->dispatch(FOSUserEvents::GROUP_DELETE_COMPLETED, new FilterGroupResponseEvent($group, $request, $response));

        return $response;
    }

    /**
     * Find a group by a specific property.
     *
     * @param string $key   property name
     * @param mixed  $value property value
     *
     * @throws NotFoundHttpException if user does not exist
     *
     * @return GroupInterface
     */
    protected function findGroupBy($key, $value)
    {
        if (!empty($value)) {
            $group = $this->groupManager->{'findGroupBy'.ucfirst($key)}($value);
        }

        if (empty($group)) {
            throw new NotFoundHttpException(sprintf('The group with "%s" does not exist for value "%s"', $key, $value));
        }

        return $group;
    }
}
