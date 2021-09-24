<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmergencyHelps extends Model
{
    protected $table = 'emergency_help';
    protected $fillable = ['user_id', 'location', 'description'];

    public static function CreateEmergencyhelp($request)
    {
        $emergency = new EmergencyHelps;
        $emergency->user_id = auth()->user()->id;
        $emergency->location_id = $request->get('location_id');
        $emergency->address = $request->get('address');
        $emergency->description = $request->get('description');
        $emergency->status = 0;
        $emergency->save();
    }

    public static function UpdateEmergencyhelp($request, $id)
    {
        $emergency = EmergencyHelps::find($id);

        $emergency->location_id = $request->get('location_id');
        $emergency->address = $request->get('address');
        $emergency->description = $request->get('description');
        $emergency->save();
    }
}