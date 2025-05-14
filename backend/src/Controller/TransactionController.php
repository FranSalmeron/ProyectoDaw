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

    #[Route('/statistics', name: 'app_transaction_stats', methods: ['GET'])]
    public function statistics(): JsonResponse
    {
        return new JsonResponse(['message' => 'Funciona OK'], Response::HTTP_OK);
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

        if ($car->getCarSold() !== 'subido') {
            return new JsonResponse(['error' => 'Este coche no está disponible para la compra'], Response::HTTP_CONFLICT);
        }

        // Crear la transacción
        $transaction = new Transaction();
        $transaction->setBuyer($buyer);
        $transaction->setCar($car);
        $transaction->setPrice($price);
        $transaction->setStatus('comprado');
        $transaction->setTransactionDate(new \DateTime());

        // **Calcular comisión (20% del precio de venta)**
        $commission = $price * 0.20;
        $transaction->setCommission($commission);
        $transaction->setTotalIncome($commission);  // El total de ingresos es igual a la comisión

        // **Actualizar el estado del coche a "comprado"**
        $car->setCarSold('comprado');

        // Persistir la transacción y actualizar el coche
        $entityManager->persist($transaction);
        $entityManager->persist($car);  // Asegúrate de actualizar el estado del coche
        $entityManager->flush();

        return new JsonResponse(['message' => 'Transacción creada, comisión calculada y coche marcado como vendido'], Response::HTTP_CREATED);
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

    /*
    #[Route('/statistics', name: 'app_transaction_stats', methods: ['GET'])]
    public function statistics(
        TransactionRepository $transactionRepository,
        UserRepository $userRepository,
        CarRepository $carRepository
    ): JsonResponse {
        $transactions = $transactionRepository->findAll();

        // Total de ingresos
        $totalIncome = array_sum(array_map(fn($t) => $t->getTotalIncome(), $transactions));

        // Total de transacciones
        $totalTransactions = count($transactions);

        // Ganancias mensuales (agrupadas por mes y año)
        $monthlyEarnings = [];
        foreach ($transactions as $transaction) {
            $month = $transaction->getTransactionDate()->format('Y-m'); // ejemplo: 2024-05
            if (!isset($monthlyEarnings[$month])) {
                $monthlyEarnings[$month] = 0;
            }
            $monthlyEarnings[$month] += $transaction->getTotalIncome();
        }

        // Formatear para frontend
        $monthlyEarningsFormatted = [];
        foreach ($monthlyEarnings as $month => $income) {
            $monthlyEarningsFormatted[] = [
                'month' => $month,
                'income' => $income,
            ];
        }

        // Usuarios con más compras
        $topUsers = $userRepository->findTopBuyers();

        // Coches más vendidos
        $topCars = $carRepository->findTopSellingCars();

        // Transacciones por estado
        $transactionsByStatus = [
            'completed' => count(array_filter($transactions, fn($t) => $t->getStatus() === 'completed')),
            'pending' => count(array_filter($transactions, fn($t) => $t->getStatus() === 'pending')),
            'cancelled' => count(array_filter($transactions, fn($t) => $t->getStatus() === 'cancelled')),
            'comprado' => count(array_filter($transactions, fn($t) => $t->getStatus() === 'comprado')), // por si usas "comprado"
        ];

        // Devolver la respuesta
        return $this->json([
            'totalIncome' => $totalIncome,
            'totalTransactions' => $totalTransactions,
            'monthlyEarnings' => $monthlyEarningsFormatted,
            'topBuyers' => $topUsers,
            'topCars' => $topCars,
            'statusCount' => $transactionsByStatus,
        ]);
    }
    */
    #[Route('/{id}', name: 'app_transaction_delete', methods: ['POST'])]
    public function delete(Request $request, Transaction $transaction, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($transaction);
        $entityManager->flush();

        return $this->redirectToRoute('app_transaction_index', [], Response::HTTP_SEE_OTHER);
    }
}
