<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Competitions;
use App\Rules;
use DB;
use App\Contact_Us;
use App\CompetitionProblem;
use App\AboutApp;
use App\CatGift;
use App\Ads;
use App\Mail\Confirm;
use Illuminate\Support\Facades\Mail;
use App\Setting;
class ApiController extends Controller
{
    use MessagatApi;
    use ApiReturn;
    
    public function __construct()
    {
        date_default_timezone_set('Asia/Riyadh');
    }
    public function SendPhoneCode(Request $request)
    {
        $Mobiles="966599476414";
        $Sender="forceAD";
        $msg="السلام عليكم";
        $code=rand(1000,9999);
       // $this->send_smsapi($Mobiles, $msg, $Sender);

       $phone = $request->input('phone');

       $check = User::where(['email' => $phone])->count();

       if($check < 0)
        {
           return $this->apiResponse(null,'هذا البريد الالكتروني غير موجود',400);
        }
        $mail_details = ['body' => $code,
                    'subject' => 'confirm message',
                    'email' => $request->phone,

                ];
        Mail::send(new Confirm($mail_details));
        $message=$code;


       return $this->apiResponse(null,$message,201);
       
    }
    
    public function RegisterUser(Request $request)
    {
       
        $validator = Validator::make($request->all(),[
            'name' => 'required', 
            'email' => 'required|email|unique:users', 
            'password' => 'required|min:|confirmed',
            'phone'=>'required|unique:users',
            'full_name'=>'required',
            
        ]);
        if($validator->fails())
        {
            return $this->apiResponse(
                 $validator->errors()->first(), 404
            );

        }
        else
        {
            $user = User::create([
                'name' => $request->name, 
                'email' => $request->email, 
                'password' => bcrypt($request->password),
                'phone'=>$request->phone,
                'full_name'=>$request->full_name,
                'type'=>$request->type,
            
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
            // var_dump($user);die();
            // $user = $request->user();
            
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            
            // return $this->apiResponse(
            //     $user, $tokenResult->accessToken, 201
            // );

            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'user' =>$user
            ]);

            

        }

    }

    public function LoginUser(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials1 = [
            'phone'=>$request->phone,
            'password'=>$request->password
        ];
        $credentials2 = [
            'email'=>$request->phone,
            'password'=>$request->password
        ];
        if(Auth::attempt($credentials2) || Auth::attempt($credentials1)) 
        {

            $user = $request->user();
            if($user->blocked==1)
            {
                $tokenResult = $user->createToken('Personal Access Token');
                $token = $tokenResult->token;
                if ($request->remember_me)
                    $token->expires_at = Carbon::now()->addWeeks(1);
                $token->save();
                $expires_at= Carbon::parse($tokenResult->token->expires_at)->toDateTimeString();
                    
                
                return response()->json([
                    'access_token' => $tokenResult->accessToken,
                    'token_type' => 'Bearer',
                    'expires_at' =>$expires_at
                ]);
            }
            else
            {
                return $this->apiResponse(
                    'المستخدم غير مفعل' , 401
               );
            }
            
        }
        else
        {
            return $this->apiResponse(
                'البيانات غير صحيحه' , 401
           );
        }
        
    }

    public function logoutUser(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'تم تسجيل الخروج بنجاح'
        ]);
    }
    
    public function User(Request $request)
    {
        
       if($request->user())
        {
            $user=$request->user();
            return $this->apiResponse(
                $user, 201
            );
        }
        else
        {
            return $this->apiResponse(
                'يجب تسجيل الدخول اولا', 201
            );
        }
    }

    public function UpdateUser(Request $request)
    {
        $user=$request->user();
       
        User::where(['id' => $user->id])->update($request->except(['token','photo']));

        $user1 = User::where('id',$id)->first();
        if ($request->hasFile('photo'))
        {
            $image = $request->file('photo');
            $name ='/upload/'.time(). $image->getClientOriginalName();
            $destinationPath = 'upload/';
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $user1->photo = $name;
        }

        $user1->save();
        $data=User::where(['id' => $user->id])->first();
        if($data)
        {
            return $this->apiResponse($data, 'تم التعديل بنجاح', 201);
            
        }
        else
        {
            return $this->apiResponse(
                'فشل في التعديل', 404
            );
        }
    }

    public function UpdatePassword(Request $request)// when user want to update password but he still login
    {
        $validator = Validator::make($request->all(),[
            'password' => 'required|min:|confirmed',
        ]);
        if($validator->fails())
        {
            return $this->apiResponse(
                 $validator->errors() , 404
            );

        }
        else
        {
            $user=$request->user();
            $update_password = $user->update(array( 'password' => bcrypt($request->password) ));
            return $this->apiResponse(
                $user, 'تم تعديل كلمه المرور بنجاح', 201
            );
       }
    }

    public function ForgetPassword(Request $request)
    {
        $user = User::where('email',$request->phone)->first();
        if($user)
        {
            $validator = Validator::make($request->all(),[
                'password' => 'required|min:|confirmed',
            ]);
            if($validator->fails())
            {
                return $this->apiResponse(
                     $validator->errors() , 404
                );
    
            }
            else
            {

                User::where('email',$request->phone)->update(array( 'password' => bcrypt($request->password) ));
                return $this->apiResponse(
                    $user, 'تم تعديل كلمه المرور بنجاح', 201
                );
            }
        }
        else
        {
            return $this->apiResponse(
                 'رقم الهاتف غير صحيح', 404
            );
        }
        
    }

    public function UpdatePhone(Request $request)
    {
        $user=$request->user();
        $update_phone = $user->update(array( 'phone' => $request->phone ));
        return $this->apiResponse(
            $user, 'تم تغير رقم الهاتف بنجاح', 201
        );
    }

    public function AddCompetition(Request $request)
    {
                            
        $validator = Validator::make($request->all(),[
            'title' => 'required', 
            'type' => 'required', 
            'expire_date' => 'required',
            'expire_time'=>'required',
            'country'=>'required',
            'gift_cate'=>'required',
            'gift'=>'required',
            
            
        ]);
        if($validator->fails())
        {
            return $this->apiResponse(
                $validator->errors() , 404
            );

        }
        else
        {
            if(isset($request['facebook'])&& !empty($request['facebook']))
            {
                $facebook=$request['facebook'];
            }
            else
            {
                $facebook="";
            }

            if(isset($request['twitter'])&& !empty($request['twitter']))
            {
                $twitter=$request['twitter'];
            }
            else
            {
                $twitter="";
            }

            if(isset($request['instagram'])&& !empty($request['instagram']))
            {
                $instagram=$request['instagram'];
            }
            else
            {
                $instagram="";
            }
            if(isset($request['tik_tok'])&& !empty($request['tik_tok']))
            {
                $tik_tok=$request['tik_tok'];
            }
            else
            {
                $tik_tok="";
            }

            if(isset($request['snapchat'])&& !empty($request['snapchat']))
            {
                $snapchat=$request['snapchat'];
            }
            else
            {
                $snapchat="";
            }
            if(isset($request['internet'])&& !empty($request['internet']))
            {
                $internet=$request['internet'];
            }
            else
            {
                $internet="";
            }
            $first_user=Competitions::where('user_id',$request->user_id)->first();
            
            $social_links=array('facebook'=>$facebook,
                             'twitter'=>$twitter,
                            'instagram'=>$instagram,
                            'tik_tok'=>$tik_tok,'snapchat'=>$snapchat ,'internet'=>$internet); 
            $competitions=Competitions::create($request->except(['token']));
            $competitions->social_links=json_encode($social_links);
            $competitions->approved=1;
            $competitions->save();
            return $this->apiResponse(
                $competitions, 'تمت الاضافه بنجاح', 201
            );
        }
    }

    public function GetCompetition(Request $request)
    {
        date_default_timezone_set('Asia/Riyadh');
        $competitions=Competitions::where('approved',1)->where(DB::raw("CONCAT(expire_date,' ',expire_time)"), '>=',date("Y-m-d H:i:s"))->get();
        
        foreach($competitions as $competition)
        {
            $competition->cat=CatGift::where('id',$competition->gift_cate)->first();
        }
        return $this->apiResponse(
            $competitions, 201
        );
    }

    public function GetNewerCompetitions(Request $request)
    {
        $competitions=Competitions::where('approved',1)->orderBy('id','desc')->where(DB::raw("CONCAT(expire_date,' ',expire_time)"), '>=',date("Y-m-d H:i:s"))->get();
        foreach($competitions as $competition)
        {
            $competition->cat=CatGift::where('id',$competition->gift_cate)->first();
        }
        return $this->apiResponse(
            $competitions, 201
        );
    }

    public function GetfirstCompetitions(Request $request)
    {
        $competitions=Competitions::where('approved',1)->where(DB::raw("CONCAT(expire_date,' ',expire_time)"), '>=',date("Y-m-d H:i:s"))->orderBy('expire_date','asc')->orderBy('expire_time','asc')->first();
        $competitions->cat=CatGift::where('id',$competitions->gift_cate)->first();
        
        return $this->apiResponse(
            $competitions, 201
        );
    }

    public function GetCloserTimeCompetitions(Request $request)
    {
        $competitions=Competitions::where('approved',1)->orderBy('expire_date','asc')->where(DB::raw("CONCAT(expire_date,' ',expire_time)"), '>=',date("Y-m-d H:i:s"))->orderBy('expire_time','asc')->get();
        foreach($competitions as $competition)
        {
            $competition->cat=CatGift::where('id',$competition->gift_cate)->first();
            
        }
        return $this->apiResponse(
            $competitions, 201
        );
    }

    public function GetCloserAddressCompetitions(Request $request)
    {
        $lat=$request->lat;
        $lon=$request->long;
        $competitions = Competitions::where('approved',1)->where(DB::raw("CONCAT(expire_date,' ',expire_time)"), '>=',date("Y-m-d H:i:s"))->where('latitude','!=','null')->where('longitude','!=','null')->select(DB::raw('*, ( 6367 * acos( cos( radians('.$lat.') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('.$lon.') ) + sin( radians('.$lat.') ) * sin( radians( latitude ) ) ) ) AS distance'))
        ->orderBy('distance')
        ->get();

        foreach($competitions as $competition)
        {
            $competition->cat=CatGift::where('id',$competition->gift_cate)->first();
            
        }
        return $this->apiResponse(
            $competitions, 201
        );
    }

    public function GetOneCompetition(Request $request)
    {
        $competitions=Competitions::where('approved',1)->where(DB::raw("CONCAT(expire_date,' ',expire_time)"), '>=',date("Y-m-d H:i:s"))->where('id',$request->competition_id)->get();
        foreach($competitions as $competition)
        {
            $competition->cat=CatGift::where('id',$competition->gift_cate)->first();
        }
        return $this->apiResponse(
            $competitions, 201
        );
    }

    public function GetSpecialCompetitions(Request $request)
    {
        $comp=Competitions::where('approved',1)->where(DB::raw("CONCAT(expire_date,' ',expire_time)"), '>=',date("Y-m-d H:i:s"))->orderBy('id','desc')->where('installed',1)->count();
        if($comp)
        {
            $competitions=Competitions::where('approved',1)->where(DB::raw("CONCAT(expire_date,' ',expire_time)"), '>=',date("Y-m-d H:i:s"))->orderBy('id','desc')->where('installed',1)->get();
            foreach($competitions as $competition)
            {
                $competition->cat=CatGift::where('id',$competition->gift_cate)->first();
            }
        }
        else
        {
            $competitions=Competitions::where('approved',1)->where(DB::raw("CONCAT(expire_date,' ',expire_time)"), '>=',date("Y-m-d H:i:s"))->orderBy('id','desc')->take(10)->get();
            foreach($competitions as $competition)
            {
                $competition->cat=CatGift::where('id',$competition->gift_cate)->first();
            }
        }
        
        return $this->apiResponse(
            $competitions, 201
        );
    }
    
    public function DeleteCompetition(Request $request)
    {
        $Competitions= Competitions::where('id',$request->competition_id)->delete();
        
        if($Competitions)
        {
            return $this->apiResponse(
                'تم الحذف بنجاح', 201
            );
        }
        else
        {
            return $this->apiResponse(
                'فشل في الحذف', 404
            );
        }
    }

    public function UpdateCompetition(Request $request)
    {
        $competition_id=$request->competition_id;
        $Comp=Competitions::where(['id' => $competition_id])->first();
        $social=json_decode($Comp['social_links'], true);
            if(isset($request['facebook'])&& !empty($request['facebook']))
            {
                $facebook=$request['facebook'];
            }
            else
            {
                $facebook=$social['facebook'];
            }

            if(isset($request['twitter'])&& !empty($request['twitter']))
            {
                $twitter=$request['twitter'];
            }
            else
            {
                $twitter=$social['twitter'];
            }

            if(isset($request['instagram'])&& !empty($request['instagram']))
            {
                $instagram=$request['instagram'];
                //var_dump($instagram);die();
            }
            else
            {
                $instagram=$social['instagram'];
            }
            if(isset($request['tik_tok'])&& !empty($request['tik_tok']))
            {
                $tik_tok=$request['tik_tok'];
            }
            else
            {
                $tik_tok=$social['tik_tok'];
            }

            if(isset($request['snapchat'])&& !empty($request['snapchat']))
            {
                $snapchat=$request['snapchat'];
            }
            else
            {
                $snapchat=$social['snapchat'];
            }
            if(isset($request['internet'])&& !empty($request['internet']))
            {
                $internet=$request['internet'];
            }
            else
            {
                $internet=$social['internet'];
            }
            $social_links=array('facebook'=>$facebook,
                             'twitter'=>$twitter,
                            'instagram'=>$instagram,
                            'tik_tok'=>$tik_tok,'snapchat'=>$snapchat ,'internet'=>$internet);
                            $request->social_links=json_encode($social_links);;
        $Competitions=Competitions::where(['id' => $competition_id])->update($request->except(['token','competition_id','facebook','twitter','internet','snapchat','tik_tok','instagram']));
        Competitions::where(['id' => $competition_id])->update(array( 'social_links' => $social_links ));
        if($Competitions)
        {
            return $this->apiResponse(
                'تم التعديل بنجاح', 201
            );
        }
        else
        {
            return $this->apiResponse(
                'فشل في التعديل', 404
            );
        }
        
            
    }
    
    public function GetUserCompetitions(Request $request)
    {
        $competitions=Competitions::where('user_id',$request->user()->id)->where(DB::raw("CONCAT(expire_date,' ',expire_time)"), '>=',date("Y-m-d H:i:s"))->get();
        foreach($competitions as $competition)
        {
            $competition->cat=CatGift::where('id',$competition->gift_cat)->first();
        }
        return $this->apiResponse(
            $competitions, 201
        );
    }

    public function Rules(Request $request)
    {
        $rules=Rules::first();
        return $this->apiResponse(
            $rules, 201
        );
    }

    public function ContactUs(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required', 
            'email' => 'required|email', 
            'phone' => 'required',
            'subject'=>'required',    
        ]);
        if($validator->fails())
        {
            return $this->apiResponse(
                $validator->errors() , 404
            );

        }
        else
        {
        
           Contact_Us::create($request->except(['token']));
           
            return $this->apiResponse(
                'تم ارسال طلبك بنجاح', 201
            );
        }
    }
    
    public function CompetitionProblem(Request $request)
    {
        $user=$request->user();
        $validator = Validator::make($request->all(),[
            'competition_id' => 'required', 
            'reason' => 'required',  
        ]);
        if($validator->fails())
        {
            return $this->apiResponse(
                $validator->errors() , 404
            );

        }
        else
        {
            $comp= CompetitionProblem::create($request->except(['token']));
            $comp->user_id=$user->id;
            $comp->save();
           
            return $this->apiResponse(
                'تم ارسال الابلاغ بنجاح', 201
            );
        }
    }

    public function GetAboutApp(Request $request)
    {
        $about=AboutApp::orderBy('id','desc')->get();
        return $this->apiResponse(
            $about, 201
        );
    }

    public function CatGift(Request $request)
    {
        $data=CatGift::orderBy('id','desc')->get();
        return $this->apiResponse(
            $data, 201
        );
    }

    public function GetAds(Request $request)
    {
        $data=Ads::orderBy('id','desc')->get();
        return $this->apiResponse(
            $data, 201
        );
    }

    public function AppConfig()
    {
        $data= Setting::where('id',1)->first();
        return $this->apiResponse(
            $data, 201
        );
    }
    
}
