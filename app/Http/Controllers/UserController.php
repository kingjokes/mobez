<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use App\Services\ReviewService;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function ShopPage(UserService $userService, Request $request)
    {

        return $userService->shopPage($request->query('category'));
    }
    public function OrderCompletePage(UserService $userService, Request $request)
    {

        return $userService->OrderCompletePage($request->query('order_id'));
    }
    public function sendMessage(UserService $userService, Request $request)
    {

        return $userService->sendMessage($request->post());
    }

    public function ProductDetails(int $id, UserService $userService)
    {
        return $userService->productDetailsPage($id);
    }

    public function homePage(UserService $userService)
    {
        return $userService->homePage();
    }

    public function addReview(Request $request, ReviewService $reviewService)
    {
        return $reviewService->addReview($request->post());
    }

    public function addOrder(Request $request, OrderService $orderService)
    {

        return $orderService->addOrder($request->post());
    }
}
