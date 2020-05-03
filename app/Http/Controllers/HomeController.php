<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\State;

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
      if(Auth::user()->gst_no=='')
      {
        return redirect('/CompanyDetails');
      }
      elseif (Auth::user()->mobile_no=='')
      {
        return redirect('/PersonalDetails');
      }
      else {
        return view('home');
      }
    }

    public function dashboard()
    {
      if(Auth::user()->gst_no=='')
      {
        return redirect('/CompanyDetails');
      }
      elseif (Auth::user()->mobile_no=='')
      {
        return redirect('/PersonalDetails');
      }
      else {
        return redirect('/home');
      }
    }

    public function CompanyDetails()
    {
      $states=State::all();
      return view('auth.company',compact('states'));
    }

    public function UpdateCompany(Request $request)
    {
      $validator = Validator::make($request->all(),
      [
        'company_name' => 'required',
        'gst_no' => 'required',
        'website' => 'required|url',
        'address' => 'required',
        'state' => 'required',
      ]);

      if($validator->fails())
      {
          return redirect('CompanyDetails')->withErrors($validator)->withInput();
      }
      $user=User::where('id', Auth::user()->id)->update(['company_name'=>$request->company_name,'gst_no'=>$request->gst_no,'website'=>$request->website,'address'=>$request->address,'state'=>$request->state]);
      if($user)
      {
        return redirect('PersonalDetails');
      }
      else {
        return redirect('CompanyDetails')->withInput('Record not Updated');
      }
    }

    public function PersonalDetails()
    {
      return view('auth.personal');
    }

    public function UpdatePersonal(Request $request)
    {
      $validator = Validator::make($request->all(),
      [
        'owner_name' => 'required',
        'mobile_no' => 'required',
      ]);

      if($validator->fails())
      {
          return redirect('PersonalDetails')->withErrors($validator)->withInput();
      }
      $user=User::where('id', Auth::user()->id)->update(['owner_name'=>$request->owner_name,'mobile_no'=>$request->mobile_no]);
      if($user)
      {
        return redirect('home');
      }
      else {
        return redirect('CompanyDetails')->withInput('Record not Updated');
      }
    }
}
