<?php 

namespace App\Helper\Activity;

use Intervention\Image\Facades\Image;
use App\Helper\Service;
use App\Models\Attributes\Attribute;
use App\Models\Category\Category;
use App\Models\Category\Subcategory;
use App\Models\Product\Product;
use App\Models\Product\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use App\Models\Activity\Activity;

trait SaveActivity{
    public static function saveProductAttributeActivity($data){
        $activity = new Activity();
        $activity->title = 'Edit Product Attribute';
        $activity->description = json_encode($data);
        $activity->user_id = Auth::user()->id;
        $activity->create_place = 'Product Attribute Section';
        $activity->save();
        return $activity->id;
    }
}


?>