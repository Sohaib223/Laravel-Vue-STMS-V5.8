<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaints extends Model
{
    protected $fillable = ['user_id', 'complain_code', 'title', 'description', 'category_id', 'status'];

    public function location()
    {
        return $this->hasOne('App\Location', 'id', 'location_id');
    }

    public function category()
    {
        return $this->hasOne('App\ComplaintCategory', 'id', 'category_id');
    }

    public static function CreateComplains($request)
    {

        $complain = new Complaints;
        $complain->user_id = auth()->user()->id;
        $complain->complain_code = 'CM-' . mt_rand(100000, 999999) . auth()->user()->id;
        $complain->title = $request->get('title');
        $complain->description = $request->get('description');
        $complain->address = $request->get('address');
        $complain->category_id = $request->get('category_id');
        $complain->location_id = $request->get('location_id');
        $complain->status = $request->get('status');
        $complain->save();
    }

    public static function UpdateComplains($request, $id)
    {

        $complain = Complaints::find($id);

        $complain->title = $request->get('title');
        $complain->description = $request->get('description');
        $complain->address = $request->get('address');
        $complain->category_id = $request->get('category_id');
        $complain->location_id = $request->get('location_id');
        $complain->status = $request->get('status');
        $complain->save();
    }
}
