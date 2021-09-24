<?php

namespace App\Http\Controllers;

use App\Complaints;
use App\ComplaintCategory;
use Illuminate\Http\Request;
use App\Location;
use App\Feedbacks;
use App\User;
use App\EmergencyHelps;

class ComplaintsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request()->get('filterstatus') * 1 !== 10) {

            if (auth()->user()->role * 1 === 2) {
                $cols = 'complaints.status = ' . request()->get('filterstatus') * 1 . '
                    and complaints.user_id = ' . auth()->user()->id . ' and (
                    complaints.title like "%' . request()->get('search') . '%"
                    or complaints.complain_code like "%' . request()->get('search') . '%"
                    or locations.name like "%' . request()->get('search') . '%")';
            } else {
                $cols = 'complaints.status = ' . request()->get('filterstatus') * 1 . ' and (
                    complaints.title like "%' . request()->get('search') . '%"
                    or complaints.complain_code like "%' . request()->get('search') . '%"
                    or locations.name like "%' . request()->get('search') . '%")';
            }
        } else {
            if (auth()->user()->role * 1 === 2) {
                $cols = 'complaints.status != 3 
                    and complaints.user_id = ' . auth()->user()->id . ' and (
                    complaints.title like "%' . request()->get('search') . '%"
                    or complaints.complain_code like "%' . request()->get('search') . '%"
                    or locations.name like "%' . request()->get('search') . '%")';
            } else {
                $cols = 'complaints.status != 3 and (
                    complaints.title like "%' . request()->get('search') . '%"
                    or complaints.complain_code like "%' . request()->get('search') . '%"
                    or locations.name like "%' . request()->get('search') . '%")';
            }
        }
        $category = Complaints::join('locations', 'locations.id', '=', 'complaints.location_id')
            ->join('users', 'users.id', '=', 'complaints.user_id')
            ->select('complaints.*', 'locations.name AS location_name', 'users.email')
            ->whereRaw($cols)
            ->orderBy(request()->get('sortname'), request()->get('ordername'))
            ->paginate(10)->withPath(request()->fullUrl());

        return response()->json($category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ComplaintCategory::where('status', '=', null)->pluck('category_name', 'id');
        $location = Location::where('status', '!=', '2')->pluck('name', 'id');

        return response()->json([
            'categories' => $categories,
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
            'category_id' => 'required',
            'title' => 'required',
            'address' => 'required',
            'location_id' => 'required',
            'description' => 'required',
        ]);


        Complaints::CreateComplains($request);

        return response()->json(1);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Complaints  $complaints
     * @return \Illuminate\Http\Response
     */
    public function show(Complaints $complaints)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Complaints  $complaints
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $complaint = Complaints::findOrFail($id);
        $categories = ComplaintCategory::where('status', '=', null)->pluck('category_name', 'id');
        $location = Location::where('status', '!=', '2')->pluck('name', 'id');
        return response()->json([
            'categories' => $categories,
            'complaint' => $complaint,
            'location' => $location,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Complaints  $complaints
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'location_id' => 'required',
            'address' => 'required',
        ]);


        Complaints::UpdateComplains($request, $id);

        return response()->json(1);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Complaints  $complaints
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $complaint = Complaints::findOrFail($id);
        $complaint->status = 3;
        $complaint->save();

        return response()->json(1);
    }

    public function shortcuts()
    {

        $category = Complaints::join('users', 'users.id', '=', 'complaints.user_id')
            ->orderBy('complaints.created_at', "DESC")
            ->where('complaints.status', '=', 0)
            ->select('users.email AS user_email', 'complaints.*', 'complaints.id AS complaint_id')
            ->limit(10)->get();

        $feedback = Feedbacks::join('users', 'users.id', '=', 'feedback.user_id')
            ->orderBy('feedback.created_at', "DESC")
            ->select('users.email AS user_email', 'feedback.*', 'feedback.id AS feedback_id')
            ->limit(10)->get();


        $pendingcomplaints = Complaints::where('status', '=', 0)->whereDate('created_at', '=', date('Y-m-d'))->count();

        $totalUsersRegistered = User::where('role', '!=', 1)->where('status', '!=', 2)->count();

        $todayApprovals = User::where('role', '!=', 1)->where('status', '!=', 2)
            ->whereDate('created_at', '=', date('Y-m-d'))->count();

        $totalhelps = EmergencyHelps::where('status', '!=', 2)
            ->whereDate('created_at', '=', date('Y-m-d'))->count();


        return response()->json([
            'category' => $category,
            'pendingcomplaints' => $pendingcomplaints,
            'totalUsersRegistered' => $totalUsersRegistered,
            'todayApprovals' => $todayApprovals,
            'totalhelps' => $totalhelps,
            'feedbacks' => $feedback,
        ]);
    }
}
