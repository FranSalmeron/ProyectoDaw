<?php

namespace App\Controller;

use App\Entity\Chat;
use App\Form\ChatType;
use App\Repository\ChatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/chat/car')]
class ChatCarController extends AbstractController
{
    #[Route('/', name: 'app_chat_car_index', methods: ['GET'])]
    public function index(ChatRepository $chatRepository): Response
    {
        return $this->render('chat_car/index.html.twig', [
            'chats' => $chatRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_chat_car_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $chat = new Chat();
        $form = $this->createForm(ChatType::class, $chat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($chat);
            $entityManager->flush();

            return $this->redirectToRoute('app_chat_car_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('chat_car/new.html.twig', [
            'chat' => $chat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_chat_car_show', methods: ['GET'])]
    public function show(Chat $chat): Response
    {
        return $this->render('chat_car/show.html.twig', [
            'chat' => $chat,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_chat_car_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Chat $chat, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ChatType::class, $chat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_chat_car_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('chat_car/edit.html.twig', [
            'chat' => $chat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_chat_car_delete', methods: ['POST'])]
    public function delete(Request $request, Chat $chat, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$chat->getId(), $request->request->get('_token'))) {
            $entityManager->remove($chat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_chat_car_index', [], Response::HTTP_SEE_OTHER);
    }
}
