<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';
    protected $primarykey = 'id';
    public $timestamps = false;

    public static function creator($request)
    {
        $location = new Location;

        $location->name = $request->name;
        $location->status = 0;

        $location->save();

        return $location;
    }
    public static function updator($request,$id)
    {
        $location = Location::find($id);

        $location->name = $request->name;
        $location->status = 0;

        $location->save();

        return $location;
    }

}
