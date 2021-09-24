<?php

namespace App\Http\Controllers;

use App\ComplaintCategory;
use Illuminate\Http\Request;

class ComplaintCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = ComplaintCategory::whereRaw('status is null and category_name like "%' . request()->get('search') . '%"')

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
            'category_name' => 'required'
        ]);

        $category = ComplaintCategory::CreateCategory($request);

        return response()->json(1);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ComplaintCategory  $complaintCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ComplaintCategory $complaintCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ComplaintCategory  $complaintCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = ComplaintCategory::findOrFail($id);

        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ComplaintCategory  $complaintCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required'
        ]);

        $category = ComplaintCategory::UpdateCategory($request, $id);

        return response()->json(1);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ComplaintCategory  $complaintCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $complaintCategory = ComplaintCategory::findOrFail($id);

        $complaintCategory->status = 2;
        $complaintCategory->save();

        return response()->json(1);
    }
}