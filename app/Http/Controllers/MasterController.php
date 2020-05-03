<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Supplier;

class MasterController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function supplier()
  {
    $comp_id=Auth::user()->company_id;
    $data=Supplier::where('comp_id',$comp_id)->paginate(2);
    return view('supplier',compact('data'));
  }

  public function add_supplier(Request $request)
  {
    return view('add_supplier');
  }

  public function post_add_supplier(Request $request)
  {
    $validator = Validator::make($request->all(),
    [
      'sup_name' => 'required',
      'sup_gst' => 'required',
      'sup_mobile' => 'required',
      'sup_address' => 'required',
      'sup_email' => 'required|email',
    ]);

    if($validator->fails())
    {
        return redirect('add-supplier')->withErrors($validator)->withInput();
    }
    $comp_id=Auth::user()->company_id;
    $count=Supplier::where('comp_id',$comp_id)->count();
    if($count!=0)
    {
      $id=Supplier::where('comp_id',$comp_id)->selectRaw("max(TRIM(TRAILING 'SUP' FROM sup_id )) as maxid")->get();
      $id=substr($id[0]->maxid,3)+1;
    }
    else {
      $id=1;
    }
    $sup_id='SUP'.str_pad(($id),5,"0",STR_PAD_LEFT);
    $supplier=Supplier::create([
        'comp_id' => $comp_id,
        'sup_id' => $sup_id,
        'sup_name' => $request->sup_name,
        'sup_address' => $request->sup_address,
        'sup_mobile' => $request->sup_mobile,
        'sup_email' => $request->sup_email,
        'sup_gst' => $request->sup_gst,
        'sup_details' => $request->sup_details,
        'status' => 'active',
    ]);
    if($supplier)
    {
      return redirect('add-supplier')->withErrors(['success']);
    }
    else {
      return redirect('add-supplier')->withErrors(['failed']);
    }

  }

  public function edit_supplier(Request $request,$id)
  {
    $sup_id=$id;
    $comp_id=Auth::user()->company_id;
    $data=Supplier::where('comp_id',$comp_id)->where('sup_id',$sup_id)->get();
    $data=$data[0];
    return view('edit_supplier',compact('data'));
  }

  public function update_supplier(Request $request,$id)
  {
    $sup_id=$id;
    $comp_id=Auth::user()->company_id;
    $data=Supplier::where('comp_id',$comp_id)->where('sup_id',$sup_id)->update(['sup_name' => $request->sup_name,
    'sup_address' => $request->sup_address,
    'sup_mobile' => $request->sup_mobile,
    'sup_email' => $request->sup_email,
    'sup_gst' => $request->sup_gst,
    'sup_details' => $request->sup_details]);

    return redirect('suppliers');
  }

  public function view_supplier(Request $request,$id)
  {
    $sup_id=$id;
    $comp_id=Auth::user()->company_id;
    $data=Supplier::where('comp_id',$comp_id)->where('sup_id',$sup_id)->get();
    $data=$data[0];
    return view('view_supplier',compact('data'));
  }

  public function delete_supplier(Request $request,$id)
  {
    $sup_id=$id;
    $comp_id=Auth::user()->company_id;
    $data=Supplier::where('comp_id',$comp_id)->where('sup_id',$sup_id)->forceDelete();
    return redirect('suppliers');
  }

}
