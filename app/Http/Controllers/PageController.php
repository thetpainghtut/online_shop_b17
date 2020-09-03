<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Brand;
use App\Category;
use App\Subcategory;

class PageController extends Controller
{
  public function home($value='')
  {
    $discountItems = Item::where('discount','>',0)->take(6)->get();
    $brands = Brand::take(6)->get();
    $categories = Category::take(8)->get();

    return view('frontend.home',compact('discountItems','brands','categories'));
  }

  public function itemdetail($id)
  {
    $item = Item::find($id);
    return view('frontend.detail',compact('item'));
  }

  public function promotions($value='')
  {
    return view('frontend.promotions');
  }

  public function filteritems($id)
  {
    $subcategory = Subcategory::find($id);
    $subcategory->setRelation('items', $subcategory->items()->paginate(3));
    return view('frontend.filteritems',compact('subcategory'));
  }

  public function shoppingcart($value='')
  {
    return view('frontend.shoppingcart');
  }

  public function itemsbybrand($id)
  {
    $brand = Brand::find($id);
    return view('frontend.itemsbybrand',compact('brand'));
  }

  public function itemsbycategory($id)
  {
    $category = Category::find($id);
    return view('frontend.itemsbycategory',compact('category'));
  }

  public function login($value='')
  {
    return view('frontend.login');
  }

  public function register($value='')
  {
    return view('frontend.register');
  }
  
}
