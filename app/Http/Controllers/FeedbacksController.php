<?php

namespace App\Http\Controllers;

use App\Feedbacks;
use Illuminate\Http\Request;

class FeedbacksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role * 1 === 2) {
            $feedback = Feedbacks::join('users', 'users.id', '=', 'feedback.user_id')
                ->whereRaw('feedback.user_id = ' . auth()->user()->id . ' and description like "%' . request()->get('search') . '%"')
                ->select('feedback.*', 'users.email')
                ->orderBy(request()->get('sortname'), request()->get('ordername'))
                ->paginate(10)->withPath(request()->fullUrl());
        } else {
            $feedback = Feedbacks::join('users', 'users.id', '=', 'feedback.user_id')
                ->whereRaw('description like "%' . request()->get('search') . '%"')
                ->select('feedback.*', 'users.email')
                ->orderBy(request()->get('sortname'), request()->get('ordername'))
                ->paginate(10)->withPath(request()->fullUrl());
        }



        return response()->json($feedback);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required'
        ]);

        $feedback = Feedbacks::CreateFeedback($request);

        return response()->json(1);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feedbacks  $feedbacks
     * @return \Illuminate\Http\Response
     */
    public function show(Feedbacks $feedbacks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feedbacks  $feedbacks
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feedback = Feedbacks::findOrFail($id);

        return response()->json($feedback);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feedbacks  $feedbacks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required'
        ]);

        $feedback = Feedbacks::UpdateFeedback($request, $id);

        return response()->json(1);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feedbacks  $feedbacks
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback = Feedbacks::find($id);
        $feedback->delete();
        return response()->json(1);
    }
}
