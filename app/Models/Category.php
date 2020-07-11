<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function parent()
    {
       return $this-> belongsTo(Category::class, 'parent_id');
    }

    public function products()
    {
       return $this-> hasMany(Product::class);
    }



    // Checking wheather its parent or a category

    public static function ParentOrNotCategory($parent_id, $child_id){
        
     $categories = Category::where('id', $child_id)-> where ('parent_id',$parent_id)->get();
     if(!is_Null($categories)){
         return true;
     }
     else{
         return false;
     }
        
    }
}
