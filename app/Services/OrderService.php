<?php

namespace App\Services;

use App\Interfaces\OrdersInterface;
use App\Mail\NotifyAdminMailer;
use App\Mail\OrderMailer;
use App\Models\OrdersModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderService implements OrdersInterface
{

    public function getOrders()
    {

        $query = DB::table('orders')

            ->get();

        return view('admin.orders', [
            "data" => $query
        ]);
    }

    public function deleteOrder(int $id)
    {
        $query = OrdersModel::where('id', $id)->delete();


        if ($query) return back()->with('status', 'Order deleted successfully');


        return back()->with('error', 'Unable to delete order');
    }

    public function updateOrder(int $id, int $status)
    {
        $query = OrdersModel::where('id', $id)->update([
            'status' => $status
        ]);

        if ($query) return back()->with('status', 'Orders updated successfully');


        return back()->with('error', 'Unable to update order');
    }


    public function orderDetails(int $id)
    {


        $query =  DB::table('orders')

            ->where('orders.id', $id)
            ->first();



        return view('admin.order-details', ["details" => $query]);
    }


    public function addOrder(array $details)
    {
        $query = OrdersModel::create([
            "firstname" => $details['firstname'],
            "lastname" => $details['lastname'],
            // "product_id" => $details['product_id'],
            "country" => $details['search-keyword'],
            'address' => $details['address'],
            'town' => $details['town'],
            'postal_code' => $details['postal_code'],
            'phone' => $details['phone'],
            'mail' => $details['mail'],
            'order_notes' => $details['order_notes'],
            'total' => $details['total'],
            'order_breakdown' => $details['order_breakdown'],
            'order_id' => uniqid()

        ]);



        if ($query) {
            $name = $details['firstname'] . ' ' . $details['lastname'];

            Mail::send(new OrderMailer($name, $details['phone'], $details['mail'],  $query->order_id));

            Mail::send(new NotifyAdminMailer($name, $details['phone'], $details['mail'],  $query->order_id));

            return response()->json(['status' => true, 'message' => 'Order placed successfully', 'order_id' => $query->order_id]);
        }

        return response()->json(['status' => false, 'message' => 'Unable to process order']);
    }
}
