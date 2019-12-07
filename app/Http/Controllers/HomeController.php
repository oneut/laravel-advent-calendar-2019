<?php
/**
 * Created by PhpStorm.
 * User: Takashi
 * Date: 2019/11/14
 * Time: 16:22
 */

namespace App\Http\Controllers;


use App\Http\Repositories\HamburgerSetRepository;
use App\Http\Repositories\OrderRepository;
use App\Http\Repositories\OrderSubtotalRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\Home\IndexRequest;
use App\Repositories\GitHubOctocatRepositoryRepository;

class HomeController extends Controller
{
    private $userRepository;
    private $hamburgerRepository;
    private $orderSubtotalRepository;
    private $orderRepository;
    private $gitHubOctocatRepositoryRepository;

    public function __construct(
        UserRepository $userRepository,
        HamburgerSetRepository $hamburgerSetRepository,
        OrderSubtotalRepository $orderSubtotalRepository,
        OrderRepository $orderRepository,
        GitHubOctocatRepositoryRepository $gitHubOctocatRepositoryRepository
    ) {
        $this->userRepository                    = $userRepository;
        $this->hamburgerRepository               = $hamburgerSetRepository;
        $this->orderSubtotalRepository           = $orderSubtotalRepository;
        $this->orderRepository                   = $orderRepository;
        $this->gitHubOctocatRepositoryRepository = $gitHubOctocatRepositoryRepository;
    }

    public function index(IndexRequest $indexRequest)
    {
        $users                     = $this->userRepository->get();
        $hamburgerSets             = $this->hamburgerRepository->get();
        $orderItemPrices           = $this->orderSubtotalRepository->get();
        $orders                    = $this->orderRepository->get();
        $orderSubtotal             = $this->orderSubtotalRepository->findByOrderId(1);
        $gitHubOctocatRepositories = $this->gitHubOctocatRepositoryRepository->get();
        $gitHubOctocatRepository   = $this->gitHubOctocatRepositoryRepository->findByRepositoryName('Hello-World');

        $requestIds = $indexRequest->getIds();

        return view("index", [
            'users' => $users,
            'hamburgerSets' => $hamburgerSets,
            'orderItemPrices' => $orderItemPrices,
            'orderSubtotal' => $orderSubtotal,
            'orders' => $orders,
            'gitHubOctocatRepositories' => $gitHubOctocatRepositories,
            'gitHubOctocatRepository' => $gitHubOctocatRepository,
            'requestIds' => $requestIds
        ]);
    }
}
