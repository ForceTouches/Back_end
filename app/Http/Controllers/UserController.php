<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Setting;
use Session;
use App\Competitions;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users']=User::orderBy('id','desc')->where('type',1)->get();
        $data['managers']=User::orderBy('id','desc')->where('type',2)->get();
        return view('back.users.view',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'email' => $request->email, 
            'password' => bcrypt($request->password),
            'type'=>2,
            'name' => '',
            'phone'=>'',
            'full_name'=>'',
        
        ]);
        if ($request->hasFile('photo'))
                {
                    $image = $request->file('photo');
                    $name ='/upload/'.time(). $image->getClientOriginalName();
                    $destinationPath = 'upload/';
                    $imagePath = $destinationPath. "/".  $name;
                    $image->move($destinationPath, $name);
                    $user->photo = $name;
                }
        $user->save();

        return redirect()->back()->with('success', ' تم تعديل بيانات المستخدم بنجاح');
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
        $user=auth()->user();
        User::where(['id' => $user->id])->update($request->except(['_token','photo','remaning_time','primary_color','second_color','text_color']));
        if ($request->hasFile('photo'))
        {
            $image = $request->file('photo');
            $name ='/upload/'.time(). $image->getClientOriginalName();
            $destinationPath = 'upload/';
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            // $user->photo = $name;
            User::where(['id' => $user->id])->update(['photo' => $name]);
        }
        $set= Setting::where(['id' =>1])->first();
        if($set)
        {
            Setting::where(['id' =>1])->update(['remaning_time'=>$request->remaning_time,'primary_color'=>$request->primary_color,'second_color'=>$request->second_color,'text_color'=>$request->text_color]);
        }
        else
        {
            Setting::create([
                'remaning_time'=>$request->remaning_time, 
                'primary_color'=>$request->primary_color,
                'second_color'=>$request->second_color,
                'text_color'=>$request->text_color, 
            
            ]); 
        }
        
        return redirect()->back()->with('info', ' تم تعديل بيانات المستخدم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect()->back()->with('error', ' تم تعديل بيانات المستخدم بنجاح');
    }

    public function users_details(Request $request,$id)
    {
        $data['user']=User::where('id',$id)->first();
        $data['competitions']=Competitions::orderBy('id','desc')->where('user_id',$id)->get();
        return view('back.users.users_details',$data);
    }

    public function setting(Request $request)
    {
        $data['setting']=Setting::where('id',1)->first();
        return view('back.setting',$data);
    }

    public function user_status(Request $request,$id,$status)
    {
        if($status==1)
        {
            User::where(['id' => $id])->update(array( 'blocked' => 0 )); 
            return redirect()->back()->with('notblocked', ' تم تعديل بيانات المستخدم بنجاح'); 
        }
        else
        {
            User::where(['id' => $id])->update(array( 'blocked' => 1 ));
            return redirect()->back()->with('blocked', ' تم تعديل بيانات المستخدم بنجاح'); 
        }
    }
}
