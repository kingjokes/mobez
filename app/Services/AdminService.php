<?php

namespace App\Services;

use App\Interfaces\AdminInterface;
use App\Models\AdminModel;
use App\Models\CategoryModel;
use App\Models\OrdersModel;
use App\Models\ProductImagesModel;
use App\Models\ProductModel;
use App\Models\ProductRatingModel;
use App\Models\SettingsModel;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;

class AdminService implements AdminInterface
{

    public function dashboardPage()
    {

        return view('admin.dashboard', $this->getDashboardStat());
    }

    public function login(string $email, string $password)
    {



        $details = AdminModel::where('email', $email)->first();

        if ($details && Hash::check($password, $details->password)) {

            session()->put('admin', $details->id);

            session()->put('admin_name', $details->firstname . ' ' . $details->lastname);

            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Invalid login credentials');
    }

    public function changePassword(string $oldPassword, string $newPassword, string $cPass, $id)
    {

        if ($newPassword !== $cPass) return back()->with('error', 'Password does not match');
        $details = AdminModel::where('id', $id)->first();

        if (Hash::check($oldPassword, $details->password)) {

            $query = AdminModel::where('id', $id)->update([
                'password' => Hash::make($newPassword)
            ]);

            if ($query) return back()->with('status', 'Password updated successfully');

            return back()->with('error', 'Unable to update password');
        }
        return back()->with('error', 'Invalid current password');
    }


    public function getDashboardStat()
    {
        return [
            "products" => ProductModel::count(),
            "orders" => OrdersModel::count(),
            "product_images" => ProductImagesModel::count(),
            "reviews" => ProductRatingModel::count(),
            "categories" => CategoryModel::count(),

        ];
    }


    public function settingsPage()
    {

        $currency = SettingsModel::where('name', '=', 'currency')->first();

        return view('admin.settings', ['currency' => $currency]);
    }

    public function updateSettings($name, $value)
    {

        $query = SettingsModel::where('name', $name)->update([
            "value" => $value
        ]);

        if ($query)    return back()->with('status', 'Settings updated successfully');

        return back()->with('error', 'Unable to update settings');
    }

    public function Logout(){
        session()->remove('admin');
        session()->remove('admin_name');
        return redirect()->route('admin.login');
    }


    public  static function getCurrency()
    {
        $currency = SettingsModel::where('name', '=', 'currency')->first();
        return $currency->value ?? '$';

    }
}
