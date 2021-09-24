<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $fillable = ['user_id', 'title', 'description', 'location', 'latitude', 'longitude'];

    public static function CreateNotifications($request)
    {

        $notification = new Notifications;
        $notification->user_id = auth()->user()->id;
        $notification->title = $request->get('title');
        $notification->description = $request->get('description');
        $notification->address = $request->get('address');
        $notification->status = 0;
        $notification->location_id = $request->get('location_id');
        $notification->save();
    }

    public static function UpdateNotifications($request, $id)
    {
        $notification = Notifications::find($id);

        $notification->title = $request->get('title');
        $notification->description = $request->get('description');

        $notification->address = $request->get('address');

        $notification->location_id = $request->get('location_id');

        $notification->save();
    }
}