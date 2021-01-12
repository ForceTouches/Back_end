<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ads;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['ads']=Ads::orderBy('id','desc')->get();
        return view('back.ads.view',$data);
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
        $ads=Ads::create($request->except(['_token','image']));
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $name ='/upload/'.time(). $image->getClientOriginalName();
            $destinationPath = 'upload/';
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            Ads::where(['id' => $ads->id])->update(['image' => $name]);
        }
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
        Ads::where(['id' => $id])->update($request->except(['_token','image']));
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $name ='/upload/'.time(). $image->getClientOriginalName();
            $destinationPath = 'upload/';
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            Ads::where(['id' => $id])->update(['image' => $name]);
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
        Ads::where('id',$id)->delete();
        return redirect()->back()->with('error', ' تم تعديل بيانات المستخدم بنجاح');
    }
}
