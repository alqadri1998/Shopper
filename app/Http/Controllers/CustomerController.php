<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $customer_active = Customer::where('status','!=','Blocked')->get();
        $customer_blocked = Customer::where('status','!=','Active')->get();
       
        return view('cms.customer.index',['customer_active'=>$customer_active,'customer_blocked'=>$customer_blocked]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cms.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
                'email' => 'required:string|email|unique:customers,email',
                'mobile' => 'required|string|numeric|unique:customers,mobile',
                'gender' => 'required|string|in:Male,Female',
                'password'=>'required|string|min:6',
                'age' => 'required|integer|gt:0',
                'status' => 'string|in:on,off'
        ]);
        $customer = new Customer();
        $customer->first_name = $request->get('first_name');
        $customer->last_name = $request->get('last_name');
        $customer->email = $request->get('email');
        $customer->mobile = $request->get('mobile');
        $customer->gender = $request->get('gender');
        $customer->age = $request->get('age');
        $customer->status = $request->get('status') == 'on' ? "Active" : "Blocked";
        $customer->password = Hash::make($request->get('password'));
        $isSaved = $customer->save();

        if ($isSaved) {
            return redirect()->route('cms.customer.index');
            session()->flash('status', 'alert-success');
            session()->flash('message', ' updated successfully');
        } else {
            session()->flash('status', 'alert-danger');
            session()->flash('message', ' update failed!');
        }
     //return view('cms.blocked');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $customer = Customer::find($id);
        return view('cms.customer.edit',['customer'=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->request->add(['id'=>$id]);
        $request->validate([
            'id'=>'required|exists:customers,id',
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
                'email' => 'required:string|email|unique:customers,email,'.$id,
                'mobile' => 'required|string|numeric|unique:customers,mobile,'.$id,
                'gender' => 'required|string|in:Male,Female',
                'age' => 'required|integer|min:16|max:100',
                'status' => 'string|in:on,off'
        ]);
        $customer = Customer::find($id);
        $customer->first_name = $request->get('first_name');
        $customer->last_name = $request->get('last_name');
        $customer->email = $request->get('email');
        $customer->mobile = $request->get('mobile');
        $customer->gender = $request->get('gender');
        $customer->age = $request->get('age');
        $customer->status = $request->get('status') == 'on' ? "Active" : "Blocked";
        $customer->password = Hash::make($request->get('password'));
        $isSaved = $customer->save();

        if ($isSaved) {
            return redirect()->back();
            session()->flash('status', 'alert-success');
            session()->flash('message', ' updated successfully');
        } else {
            session()->flash('status', 'alert-danger');
            session()->flash('message', 'Author update failed!');
        }
    
     //return view('cms.blocked');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $isDeleted = Customer::destroy($id);
        if($isDeleted){
            return redirect()->back();

        }else{

        }

    }
}
