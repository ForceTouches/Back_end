<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Competitions;
use App\User;
use App\CompetitionProblem;
use App\Ads;
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
        $data['competitions']=Competitions::count();
        $data['user']=User::count();
        $data['competitionProblem']=CompetitionProblem::count();
        $data['ads']=Ads::count();
        return view('back.welcome',$data);

    }

    public function competitionProblem(Request $request)
    {
        $data['competitionProblem']=CompetitionProblem::get();
        foreach($data['competitionProblem'] as $key )
        {
            $comp=Competitions::where('id',$key['competition_id'])->first();
            $key->social = json_decode($key['social_links'], true);
            $user=User::where('id',$comp['user_id'])->first();
            $key->name=$comp['title'];
            $key->number=$comp['id'];
            $key->user_name=$user['name'];
            if($comp['type']==1)
            {
                $key->type="مسابقات علي حسب الموقع";
            }
            else
            {
                $key->type="مسابقات منصات التواصل";
            }
            $key->date=$comp['expire_date'];
            
        }
        return view('back.problem',$data);
    }

    public function problem_details(Request $request,$id)
    {
        $data['competitionProblem']=CompetitionProblem::where('id',$id)->first();
        $data['user']=User::where('id',$data['competitionProblem']['user_id'])->first();
        $data['comp']=Competitions::where('id',$data['competitionProblem']['competition_id'])->first();
        $data['comp']->social = json_decode($data['comp']['social_links'], true);
        return view('back.problem_details',$data);
    }

    
}
