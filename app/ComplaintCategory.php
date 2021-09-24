<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplaintCategory extends Model
{
    protected $table = 'complaint_category';
    protected $primarykey = 'id';
    public $timestamps = false;

    protected $fillable = ['category_name'];
    
    public static function CreateCategory($request){

        $category = new ComplaintCategory;
        $category->category_name = $request->get('category_name');
        $category->save();
    }

    public static function UpdateCategory($request,$id){
        $category = ComplaintCategory::find($id);
        $category->category_name = $request->get('category_name');
        $category->save();
    }
}
