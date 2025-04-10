<?php

namespace App\Controller;

use App\Entity\Transaction;
use App\Form\TransactionType;
use App\Repository\CarRepository;
use App\Repository\TransactionRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/transaction')]
class TransactionController extends AbstractController
{
    #[Route('/', name: 'app_transaction_index', methods: ['GET'])]
    public function index(TransactionRepository $transactionRepository): Response
    {
        return $this->render('transaction/index.html.twig', [
            'transactions' => $transactionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_transaction_new', methods: ['POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $entityManager,
        UserRepository $userRepository,
        CarRepository $carRepository
    ): JsonResponse {
        $data = json_decode($request->getContent(), true);

        $carId = $data['carId'] ?? null;
        $userId = $data['userId'] ?? null;
        $price = $data['price'] ?? null;

        if (!$carId || !$userId || !$price) {
            return new JsonResponse(['error' => 'Faltan datos en la solicitud'], Response::HTTP_BAD_REQUEST);
        }

        $buyer = $userRepository->find($userId);
        $car = $carRepository->find($carId);

        if (!$buyer || !$car) {
            return new JsonResponse(['error' => 'Usuario o coche no encontrados'], Response::HTTP_NOT_FOUND);
        }

        if ($car->isCarSold()) {
            return new JsonResponse(['error' => 'Este coche ya fue vendido'], Response::HTTP_CONFLICT);
        }

        // Crear la transacción
        $transaction = new Transaction();
        $transaction->setBuyer($buyer);
        $transaction->setCar($car);
        $transaction->setPrice($price);
        $transaction->setStatus('comprado');
        $transaction->setTransactionDate(new \DateTime());

        // Marcar el coche como vendido
        $car->setCarSold(true);

        $entityManager->persist($transaction);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Transacción creada y coche marcado como vendido'], Response::HTTP_CREATED);
    }


    #[Route('/{id}', name: 'app_transaction_show', methods: ['GET'])]
    public function show(Transaction $transaction): Response
    {
        return $this->render('transaction/show.html.twig', [
            'transaction' => $transaction,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_transaction_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Transaction $transaction, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TransactionType::class, $transaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_transaction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('transaction/edit.html.twig', [
            'transaction' => $transaction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_transaction_delete', methods: ['POST'])]
    public function delete(Request $request, Transaction $transaction, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($transaction);
        $entityManager->flush();

        return $this->redirectToRoute('app_transaction_index', [], Response::HTTP_SEE_OTHER);
    }
}
