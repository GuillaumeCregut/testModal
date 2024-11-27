<?php

namespace App\Controller;

use App\Entity\TodoItem;
use App\Entity\TodoList;
use App\Form\TodoListFormType;
use App\Repository\TodoListRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TodoListController extends AbstractController
{
    #[Route('/todo/{id}', name: 'app_todo_list', defaults: ['id'=>null])]
    public function index(
        Request $request,
        TodoListRepository $listRepo,
        ?TodoList $list=null
    ): Response
    {
        if(!$list) {
            $list = new TodoList();
            $list->addTodoItem(new TodoItem());
        }
        $form = $this->createForm(TodoListFormType::class, $list);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
           dd($form->getData());
           $this->addFlash('liveDemo','cool');
            return $this->redirectToRoute('app_todo_list',[
                'id' => $list->getId(),
            ]);
        }
        return $this->render('todo_list/index.html.twig', [
            'controller_name' => 'TodoListController',
            'form' => $form, 
            'todoList' => $list,
        ]);
    }
}
