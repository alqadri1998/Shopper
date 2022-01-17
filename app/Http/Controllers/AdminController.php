<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{


    public function index()
    {
        //

        $admin_active = Admin::where('status','!=','Blocked')->orderBy('name','desc')->get();
        $admin_blocked = Admin::where('status','!=','Active')->orderBy('name','desc')->get();

        return view('cms.admin.index',['admin_active'=>$admin_active,'admin_blocked'=>$admin_blocked]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cms.admin.create');
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
            'name' => 'required|string|min:3',
                'email' => 'required:string|email|unique:admins,email',
                'mobile' => 'required|string|numeric|unique:admins,mobile',
                'gender' => 'required|string|in:Male,Female',
                'password'=>'required|string|min:6',
                'age' => 'required|integer|gt:0',
                'status' => 'string|in:on,off'
        ]);
        $admin = new Admin();
        $admin->name = $request->get('name');
        $admin->email = $request->get('email');
        $admin->mobile = $request->get('mobile');
        $admin->gender = $request->get('gender');
        $admin->age = $request->get('age');
        $admin->status = $request->get('status') == 'on' ? "Active" : "Blocked";
        $admin->password = Hash::make($request->get('password'));
        $isSaved = $admin->save();

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
        $admins = Admin::find($id);
        return view('cms.admin.edit',['admins'=>$admins]);
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
            'id'=>'required|exists:admins,id',
            'name' => 'required|string|min:3',
                'email' => 'required:string|email|unique:admins,email,'.$id,
                'mobile' => 'required|string|numeric|unique:admins,mobile,'.$id,
                'gender' => 'required|string|in:Male,Female',
                'age' => 'required|integer|min:16|max:100',
                'status' => 'string|in:on,off'
        ]);
        $admin = Admin::find($id);
        $admin->name = $request->get('name');
        $admin->email = $request->get('email');
        $admin->mobile = $request->get('mobile');
        $admin->gender = $request->get('gender');
        $admin->age = $request->get('age');
        $admin->status = $request->get('status') == 'on' ? "Active" : "Blocked";
        $admin->password = Hash::make($request->get('password'));
        $isSaved = $admin->save();

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
        $isDeleted = Admin::destroy($id);
        if($isDeleted){
            return redirect()->back();

        }else{

        }

    }
}
