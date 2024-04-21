<?php

namespace App\Http\Controllers;

use App\Services\AdminService;
use App\Services\CategoryService;
use App\Services\OrderService;
use App\Services\ProductService;
use App\Services\ReviewService;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function Index()
    {

        return view('admin.login');
    }

    public function dashboardPage(AdminService $adminService)
    {
        return $adminService->dashboardPage();
    }

    public function login(Request $request, AdminService $adminService)
    {

        return $adminService->login($request->login_email, $request->login_password);
    }

    public function categoryPage(CategoryService $categoryService)
    {
        return $categoryService->categoryPage();
    }

    public function categoryAddPage(CategoryService $categoryService)
    {
        return $categoryService->addNewCategoryPage();
    }

    public function addCategory(Request $request, CategoryService $categoryService)
    {
        return $categoryService->addCategory($request->name);
    }
    public function deleteCategory(int $id, CategoryService $categoryService)
    {
        return $categoryService->deleteCategory($id);
    }

    public function productPage(ProductService $productService)
    {
        return $productService->productPage();
    }

    public function editProductPage(int $id, ProductService $productService)
    {
        return $productService->editProductPage($id);
    }

    public function addProductPage(ProductService $productService)
    {
        return $productService->addProductPage();
    }

    public function addProduct(Request $request, ProductService $productService)
    {
        return $productService->addProduct($request->post(), $request->file('image'), $request->file('product_images'));
    }

    public function deleteProduct(int $id,  ProductService $productService)
    {
        return $productService->deleteProduct($id);
    }

    public function deleteProductImage(int $id,  ProductService $productService)
    {
        return $productService->deleteProductImage($id);
    }

    public function editProduct(Request $request, ProductService $productService)
    {
        return $productService->editProduct($request->post(), $request->file('image'), $request->file('product_images'));
    }

    public function ordersPage(OrderService $orderService)
    {
        return $orderService->getOrders();
    }


    public function deleteOrders(int $id, OrderService $orderService)
    {
        return $orderService->deleteOrder($id);
    }
    public function addOrders(Request $request, OrderService $orderService)
    {
        return $orderService->addOrder($request->post());
    }

    public function orderDetails(int $id, OrderService $orderService)
    {
        return $orderService->orderDetails($id);
    }
    public function updateOrder(Request $request, OrderService $orderService)
    {
        return $orderService->updateOrder($request->id, $request->status);
    }



    public function reviewsPage(ReviewService $reviewService)
    {
        return $reviewService->getReviews();
    }


    public function deleteReview(int $id, ReviewService $reviewService)
    {
        return $reviewService->deleteReview($id);
    }
    public function addReview(Request $request, ReviewService $reviewService)
    {
        return $reviewService->AddReview($request->post());
    }

    public function getProductReview(int $id, ReviewService $reviewService)
    {
        return $reviewService->getProductReview($id);
    }

    public function settingsPage(AdminService $adminService)
    {
        return $adminService->settingsPage();
    }

    public function updateSettings(Request $request, AdminService $adminService)
    {
        return $adminService->updateSettings($request->name, $request->value);
    }
    public function changePassword(Request $request, AdminService $adminService)
    {
        return $adminService->changePassword($request->oldPassword, $request->newPassword, $request->cPassword, session()->get('admin'));
    }

    public function logout(AdminService $adminService){
        return $adminService->Logout();
        
    }
}
