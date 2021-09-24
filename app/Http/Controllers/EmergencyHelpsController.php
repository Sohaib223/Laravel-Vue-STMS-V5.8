<?php

namespace App\Http\Controllers;

use App\EmergencyHelps;
use Illuminate\Http\Request;
use App\Location;

class EmergencyHelpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role * 1 === 2) {
            $cols = 'emergency_help.status != 2 and emergency_help.user_id = ' . auth()->user()->id . ' and (
                emergency_help.id like "%' . request()->get('search') . '%"
                or locations.name like "%' . request()->get('search') . '%")';
        } else {
            $cols = 'emergency_help.status != 2 and (
                emergency_help.id like "%' . request()->get('search') . '%"
                or locations.name like "%' . request()->get('search') . '%")';
        }


        $help = EmergencyHelps::join('locations', 'locations.id', '=', 'emergency_help.location_id')
            ->join('users', 'users.id', '=', 'emergency_help.user_id')
            ->select('emergency_help.*', 'locations.name AS location_name', 'users.email')
            ->whereRaw($cols)
            ->orderBy(request()->get('sortname'), request()->get('ordername'))
            ->paginate(10)->withPath(request()->fullUrl());

        return response()->json($help);
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


            'address' => 'required',
            'location_id' => 'required',
            'description' => 'required',
        ]);


        EmergencyHelps::CreateEmergencyhelp($request);

        return response()->json(1);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmergencyHelps  $emergencyHelps
     * @return \Illuminate\Http\Response
     */
    public function show(EmergencyHelps $emergencyHelps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmergencyHelps  $emergencyHelps
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $help = EmergencyHelps::findOrFail($id);
        $location = Location::where('status', '!=', '2')->pluck('name', 'id');

        return response()->json([
            'help' => $help,
            'location' => $location,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmergencyHelps  $emergencyHelps
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([


            'address' => 'required',
            'location_id' => 'required',
            'description' => 'required',
        ]);


        EmergencyHelps::UpdateEmergencyhelp($request, $id);

        return response()->json(1);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmergencyHelps  $emergencyHelps
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $help = EmergencyHelps::findOrFail($id);
        $help->status = 2;
        $help->save();

        return response()->json(1);
    }
}
