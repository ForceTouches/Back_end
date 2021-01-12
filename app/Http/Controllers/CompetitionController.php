<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Competitions;
use App\CatGift;
use App\User;
use App\CompetitionProblem;
class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $data['competitions_location']=Competitions::orderBy('id','desc')->where('type',1)->get();
        $data['competitions_social']=Competitions::orderBy('id','desc')->where('type',2)->get();
        foreach ($data['competitions_social'] as $key) 
        {
            $key->social = json_decode($key['social_links'], true);
           
        }
        return view('back.competitions.view',$data);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Competitions::where('id',$id)->delete();
       
            CompetitionProblem::where('competition_id',$id)->delete();
        
        return redirect()->back()->with('error', ' تم تعديل بيانات المستخدم بنجاح');
    }

    public function change_status(Request $request,$id,$approved)
    {
        if($approved==1)
        {
            Competitions::where(['id' => $id])->update(array( 'approved' => 0 )); 
            return redirect()->back()->with('notapproved', ' تم تعديل بيانات المستخدم بنجاح'); 
        }
        else
        {
            Competitions::where(['id' => $id])->update(array( 'approved' => 1 ));
            return redirect()->back()->with('approved', ' تم تعديل بيانات المستخدم بنجاح'); 
        }
        
    }

    public function star(Request $request,$id,$installed)
    {
        if($installed==1)
        {
            Competitions::where(['id' => $id])->update(array( 'installed' => 0 )); 
            return redirect()->back()->with('notinstall', ' تم تعديل بيانات المستخدم بنجاح'); 
        }
        else
        {
            Competitions::where(['id' => $id])->update(array( 'installed' => 1 ));
            return redirect()->back()->with('install', ' تم تعديل بيانات المستخدم بنجاح'); 
        }
       
    }

    public function details(Request $request,$id)
    {
        $data['competition']=Competitions::where(['id' => $id])->first(); 
        $data['competition']->social = json_decode($data['competition']['social_links'], true);
        // var_dump( $data['competition']['social_links']);die();
        $data['gift']=CatGift::where('id',$data['competition']['gift_cate'])->first();
        $data['user']=User::where('id',$data['competition']['user_id'])->first();
        $date1 = strtotime(date('d-m-Y'));  
        $date2 =strtotime($data['competition']['expire_date']);
        $diff = abs($date2 - $date1);
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        $hours = floor(($diff - $years * 365*60*60*24  - $months*30*60*60*24 - $days*60*60*24) / (60*60));                  
        $data['days']=$days;
        
        date_default_timezone_set('Asia/Riyadh');
        $time1 = strtotime(date("H:i:s"));
        $time2 = strtotime($data['competition']['expire_time']);
        $difference = round(abs($time2 - $time1) / 3600,0);
        $data['hours']= $difference;
        return view('back.competitions.details',$data);
    }
}
