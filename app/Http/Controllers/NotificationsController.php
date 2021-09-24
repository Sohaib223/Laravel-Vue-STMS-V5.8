<?php

namespace App\Http\Controllers;

use App\Notifications;
use Illuminate\Http\Request;
use App\Location;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cols = 'notifications.status != 2 and (
            notifications.title like "%' . request()->get('search') . '%"
            or notifications.id like "%' . request()->get('search') . '%"
            or locations.name like "%' . request()->get('search') . '%")';

        $notifications = Notifications::join('locations', 'locations.id', '=', 'notifications.location_id')
            ->select('notifications.*', 'locations.name AS location_name')
            ->whereRaw($cols)
            ->orderBy(request()->get('sortname'), request()->get('ordername'))
            ->paginate(5)->withPath(request()->fullUrl());

        return response()->json($notifications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $location = Location::where('status', '!=', '2')->pluck('name', 'id');

        return response()->json([
            'location' => $location,
        ]);
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

            'title' => 'required',
            'address' => 'required',
            'location_id' => 'required',
            'description' => 'required',
        ]);


        Notifications::CreateNotifications($request);

        return response()->json(1);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notifications  $notifications
     * @return \Illuminate\Http\Response
     */
    public function show(Notifications $notifications)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notifications  $notifications
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notification = Notifications::findOrFail($id);
        $location = Location::where('status', '!=', '2')->pluck('name', 'id');
        return response()->json([
            'notification' => $notification,
            'location' => $location,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notifications  $notifications
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'title' => 'required',
            'description' => 'required',
            'location_id' => 'required',
            'address' => 'required',
        ]);


        Notifications::UpdateNotifications($request, $id);

        return response()->json(1);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notifications  $notifications
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noti = Notifications::findOrFail($id);
        $noti->status = 2;
        $noti->save();

        return response()->json(1);
    }

    public function usernotifications()
    {

        $notifications = Notifications::join('users', 'users.id', '=', 'notifications.user_id')
            ->join('locations', 'locations.id', '=', 'notifications.location_id')
            ->orderBy('notifications.created_at', "DESC")
            ->where('notifications.status', '=', 0)
            ->select('users.email AS user_email', 'notifications.*', 'locations.name AS locationname')
            ->limit(10)->get();


        return response()->json([
            'notifications' => $notifications,
        ]);
    }
}
