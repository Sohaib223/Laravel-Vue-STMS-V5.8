<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = 'customers';
    public $timestamps = false;

    public static function backCreator($request, $user_id, $filename)
    {
        $customer = new Customers;

        $customer->user_id = $user_id;
        $customer->id_prove = $filename;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->contact_no = $request->contact_no;
        $customer->address = $request->address;

        $customer->save();

        return $customer;
    }
    public static function backUpdator($request, $id, $filename)
    {
        $customer = Customers::findOrFail($id);


        $customer->id_prove = $filename;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->contact_no = $request->contact_no;
        $customer->address = $request->address;

        $customer->save();

        return $customer;
    }
}