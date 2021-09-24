<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedbacks extends Model
{
    protected $table = 'feedback';
    protected $primarykey = 'id';
    public $timestamps = true;

    protected $fillable = ['user_id', 'description'];

    public static function CreateFeedback($request)
    {
        $feedback = new Feedbacks;
        $feedback->user_id = $request->get('user_id');
        $feedback->description = $request->get('description');
        $feedback->save();
    }

    public static function UpdateFeedback($request, $id)
    {
        $feedback = Feedbacks::find($id);
        $feedback->user_id = $request->get('user_id');
        $feedback->description = $request->get('description');
        $feedback->save();
    }
}
