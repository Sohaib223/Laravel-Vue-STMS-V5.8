<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Complaints;
use App\Notifications;

class ReportingController extends Controller
{
    public function report(Request $request)
    {
        if ($request->has('table') && $request->has('startDate') && $request->has('endDate')) {
            if ($request->table == 'user') {
                $user = User::join('customers', 'users.id', '=', 'customers.user_id')
                    ->where('users.role', 2)
                    ->whereBetween('users.created_at', [date('Y-m-d', strtotime($request->startDate)), date('Y-m-d', strtotime($request->endDate))])
                    ->select('users.*', 'customers.*', 'customers.id AS customer_id')
                    ->get();
                return response()->json($user);
            } elseif ($request->table == 'complaint') {
                $complaint = Complaints::whereBetween('created_at', [date('Y-m-d', strtotime($request->startDate)), date('Y-m-d', strtotime($request->endDate))])
                    ->where('status', '!=', 3)
                    ->with('location', 'category')->get();
                return response()->json($complaint);
            } elseif ($request->table == 'notification') {
                $complaint = Notifications::join('users', 'users.id', '=', 'notifications.user_id')
                    ->join('locations', 'locations.id', '=', 'notifications.location_id')
                    ->whereBetween('notifications.created_at', [date('Y-m-d', strtotime($request->startDate)), date('Y-m-d', strtotime($request->endDate))])
                    ->where('notifications.status', '!=', 2)
                    ->select('users.name AS user_name', 'notifications.*', 'locations.name AS location_name')
                    ->get();
                return response()->json($complaint);
            }
        }
        // return response($request);
    }
}
