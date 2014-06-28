<?php

namespace Acme\Bundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\Bundle\BlogBundle\Entity\Task;
use Symfony\Component\HttpFoundation\Response;


class IndexController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeBlogBundle:Index:index.html.twig');
    }

    public function formAction()
    {
        $request = $this->getRequest();
        //object
        $task = new Task();
        $task->setTask("first task");
        $task->setDueDate(new \DateTime('now'));

        //form
        $form = $this->createFormBuilder($task)
            ->add('task', 'text')
            ->add('dueDate', 'date')
            ->add('save', 'submit')
            ->getForm();

        if ($request->getMethod() == 'POST') {
            //$data = $this->getQuery();
            //$data = $request->query->get('FOO');
             $data = $request->request->all();
            //$data = $request->getParameter('task');
            //$data = $request->request->getParameter('task');
            //var_dump(get_class_methods($data));
            var_dump($data);
        }

        return $this->render('AcmeBlogBundle:Index:form.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function successAction(Request $request)
    {
        $task = new Task();

        $form = $this->createFormBuilder($task)
            ->add('task', 'text')
            ->add('dueDate', 'date')
            ->add('save', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            // guardar la tarea en la base de datos
            //return $this->redirect($this->generateUrl('task_success'));
            echo "form valido"; exit;
        } else {
            echo "form no valido"; exit;
        }

        // ...
    }

}
