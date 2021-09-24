<?php

namespace App\Http\Controllers;

use App\Customers;
use Illuminate\Http\Request;
use App\User;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customers::join('users', 'users.id', '=', 'customers.user_id')
            ->select('customers.*', 'customers.id AS customer_id', 'users.*');

        $cols = 'status != 2 and users.role = 2';
        $searchCol = ' and (first_name LIKE "%' . request()->get('search') . '%"';
        $searchCol .= ' or last_name LIKE "%' . request()->get('search') . '%"';
        $searchCol .= ' or contact_no LIKE "%' . request()->get('search') . '%"';
        $searchCol .= ' or users.email LIKE "%' . request()->get('search') . '%")';

        $cols .= $searchCol;

        $customer = $customer->whereRaw($cols)
            ->orderBy(request()->get('sortname'), request()->get('ordername'))
            ->paginate(10)->withPath(request()->fullUrl());


        return response()->json($customer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'contact_no' => 'required',
            'id_prove' => 'required'
        ]);

        $user = User::frontendcreator($request);

        $image = $request->get('id_prove');
        $name = $user->email . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
        \Image::make($request->get('id_prove'))->save(public_path('uploads/') . $name);

        $customer = Customers::backCreator($request, $user->id, $name);

        return response()->json(1);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(Customers $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customers::join('users', 'users.id', '=', 'customers.user_id')
            ->select('customers.*', 'customers.id AS customer_id', 'users.*')
            ->where('customers.id', '=', $id)->first();

        return response()->json([
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',

            'contact_no' => 'required',

        ]);
        $cust = Customers::join('users', 'users.id', '=', 'customers.user_id')
            ->where('customers.id', '=', $id)->first();


        if ($cust->email !== $request->email) {
            $request->validate([
                'email' => 'required|unique:users',
            ]);
        }


        if ($request->id_prove !== null) {
            $image = $request->get('id_prove');
            $name = $cust->email . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            \Image::make($request->get('id_prove'))->save(public_path('uploads/') . $name);
        } else {
            $name = $cust->id_prove;
        }


        $customer = Customers::backUpdator($request, $id, $name);

        $user = User::backUpdator($request, $customer->user_id);

        return response()->json(1);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customers $customers)
    {

        //



















    }
}