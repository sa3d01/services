<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\PackageUser;
use App\Models\Product;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Object_;

class ProductController extends MasterController
{
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }

    public function create()
    {
        $categories = Category::where('parent_id', null)->whereBanned(false)->get();
        return view('Web.provider-add', compact('categories'));
    }

    public function getCategoryChilds($id)
    {
        $cat=Category::find($id);
        if($cat->childs){
            $childs = $cat->childs;
        }else{
            $childs=new Object_();
        }
        return response()->json($childs);
    }

    public function store(Request $request)
    {
        $package_user=PackageUser::where('user_id',auth()->id())->latest()->first();
        if (!$package_user || ($package_user->status=='rejected'))
        {
            return view('Web.provider-addServMsg');
        }
        $data = $request->except('image');
        $data['user_id'] = auth()->id();
        $data['note'] = $request['product_note'];
        $product = Product::create($data);
        $data['note'] = $request['gallery_note'];
        $gallery = Gallery::create($data);
        $gallery->update([
            'image'=>$request['image']
        ]);
        return redirect()->route('home');
    }

    public function editProduct($id)
    {
        $product=Product::find($id);
        $categories = Category::where('parent_id', null)->get();
        return view('Web.provider-editServ',compact('product','categories'));
    }

    public function editGallery($id)
    {
        $gallery=Gallery::find($id);
        $categories = Category::where('parent_id', null)->get();
        return view('Web.provider-editWork',compact('gallery','categories'));
    }
    public function updateProduct($id,Request $request)
    {
        $data = $request->all();
        $product = Product::find($id)->update($data);
        return redirect()->route('home');
    }
    public function updateGallery($id,Request $request)
    {
        $data = $request->all();
        Gallery::find($id)->update($data);
        return redirect()->route('home');
    }
}
