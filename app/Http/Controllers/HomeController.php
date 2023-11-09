<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addProduct;
use App\Models\FeedBack;
use App\Models\Vote;

use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $item = addProduct::where('status',1)->get();
        return view('home',compact('item'));
    }
    public function detail($id)
    {
        $detail = AddProduct::with(['feedback.user'])->findOrFail($id);
        return view('item_detail',compact('detail'));
    }
    public function addFeedback()
    {
        return view('add.item');
    }
    public function storeFeedback(Request $req,$id)
    {
        $userId = Auth::user()->id;
        $this->validate($req,[
            'title'=>'required',
            'description'=>'required|max:1500',
            'category'=>'required',

        ]);
        $feed = new FeedBack;
        $data = ['title'=>$req->title,'description'=>$req->description,
        'category'=>$req->category,'product_id' => $id,'user_id' => $userId];
        $feed::create($data);
        return redirect()->back()->with('message','Thank For Your Feedback.');

    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function addItem()
    {
        return view('admin.add_item');
    }
    public function addProduct(Request $req)
    {
        $this->validate($req,[
            'title'=>'required',
            'description'=>'required|max:1500',
            'category'=>'required',
        ]);
        $product = new AddProduct;
        $data = ['title'=>$req->title,'description'=>$req->description,'category'=>$req->category];
        $product::create($data);
        return redirect()->back()->with('message','Product added.');
    }
    public function allItem()
    {
        $items = AddProduct::with(['feedback.user'])->get();
        return view('admin.all_item',compact('items'));
    }
    public function handleItem($id)
    {
        $detail = AddProduct::with(['feedback.user'])->findOrFail($id);
        return view('admin.view_item',compact('detail'));
    }
    public function disableItem($id)
    {
        $product = AddProduct::find($id);

        if ($product) {
            $product->status = $product->status == 1 ? 0 : 1;
            $product->save();
        }
        return redirect()->back()->with('message','Product disabled');
    }
    public function disableFeedback($id)
    {
        $feeds = Feedback::find($id);
        if ($feeds) {
            $feeds->status = $feeds->status == 1 ? 0 : 1;
            $feeds->save();
        }
        return redirect()->back()->with('message','Feedback disabled');
    }

}