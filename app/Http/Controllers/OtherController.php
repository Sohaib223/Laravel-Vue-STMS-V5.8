<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Customers;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Notifications;
use App\Complaints;

class OtherController extends Controller
{
    public function registerStore(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'contact_no' => 'required',
            'id_prove' => 'required'
        ]);

        $user = User::backendcreator($request);

        $image = $request->get('id_prove');
        $name = $user->email . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
        \Image::make($request->get('id_prove'))->save(public_path('uploads/') . $name);

        $customer = Customers::backCreator($request, $user->id, $name);

        return response()->json(1);
    }

    public function thankyou()
    {
        return view('thankyou');
    }
    public function verified()
    {
        return view('verifiedemail');
    }

    public function email_verification($reg_no)
    {
        $user = User::where('reg_no', '=', $reg_no)->first();

        if ($user->email_verified_at === null) {
            $user->email_verified_at = Carbon::now();
            $user->save();
        }

        return redirect('verified');
    }

    public function admin_profile($id)
    {
        $admin = User::findOrFail($id);

        return response()->json([
            'admin' => $admin
        ]);
    }

    public function update_profile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $admin = User::findOrFail($id);

        $admin->name = $request->name;
        if ($request->password !== null) {
            $admin->password = bcrypt($request->password);
        }

        $admin->save();

        return response()->json(1);
    }

    public function excel_download()
    {
        //dd(request()->all());
        if (request()->get('type') === 'user') {

            //dd(request()->all());
            $user = User::join('customers', 'users.id', '=', 'customers.user_id')
                ->where('users.role', 2)
                ->whereBetween('users.created_at', [date('Y-m-d', strtotime(request()->startDate)), date('Y-m-d', strtotime(request()->endDate))])
                ->select('users.*', 'customers.*', 'customers.id AS customer_id')
                ->get();

            //dd($user->toArray());

            return Excel::download(new class ($user) implements FromCollection
            {
                public function __construct($collection)
                {
                    $this->collection = $collection;
                }
                public function collection()
                {
                    return $this->collection;
                }
            }, 'users.xlsx');
        } elseif (request()->get('type') === 'complaint') {
            $complaint = Complaints::whereBetween('created_at', [date('Y-m-d', strtotime(request()->startDate)), date('Y-m-d', strtotime(request()->endDate))])
                ->where('status', '!=', 3)
                ->with('location', 'category')->get();

            return Excel::download(new class ($complaint) implements FromCollection
            {
                public function __construct($collection)
                {
                    $this->collection = $collection;
                }
                public function collection()
                {
                    return $this->collection;
                }
            }, 'complaints.xlsx');
        } elseif (request()->get('type') === 'notification') {
            $complaint = Notifications::join('users', 'users.id', '=', 'notifications.user_id')
                ->join('locations', 'locations.id', '=', 'notifications.location_id')
                ->whereBetween('notifications.created_at', [date('Y-m-d', strtotime(request()->startDate)), date('Y-m-d', strtotime(request()->endDate))])
                ->where('notifications.status', '!=', 2)
                ->select('users.name AS user_name', 'notifications.*', 'locations.name AS location_name')
                ->get();

            return Excel::download(new class ($complaint) implements FromCollection
            {
                public function __construct($collection)
                {
                    $this->collection = $collection;
                }
                public function collection()
                {
                    return $this->collection;
                }
            }, 'notification.xlsx');
        }
    }
}
