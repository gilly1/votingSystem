<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\candidate;
use App\category;
use App\kura;
use App\voter;
use JavaScript;


class HomeController extends Controller
{
    protected $verificationCode;
    protected $phoneNo;

    public function index()
    {
        $category=category::all();
        $candidates=candidate::all();

        return view('main/index')->with('candidates',$candidates)->with('category',$category);
        
    }


    public function verify(Request $request)
    {

        $this->phoneNo='+254'.$request->input('no');

        $categories=category::pluck('cat_name')->toArray();
        $candidates=candidate::all();


        $categ=$request->all();


        $stdId=array();
        
        foreach($categ as $x=>$x_value){

            array_push($stdId,$x_value);
        }


        $request->session()->put('votedCandidate',$stdId);

        $request->session()->put('phoneNo',$request->input('no'));
        
        $candidate=candidate::whereIn('id',$stdId )->get();


        //dealing with the verification code

        $this->validateNo($request);

        //generating code
        $min = pow(10, 3);
        $max = $min * 10 - 1;
        $code=mt_rand($min, $max);

        $this->verificationCode=$code;

        $voterNo=new voter;
        $voterNo->country_code='+254';
        $voterNo->phone_no=$request->input('no');
        $voterNo->token=$code;
        $voterNo->save();

        //sending the code

        $this->sendSms();
        

        return view('main/verify')->with('candidate',$candidate);


    }

    protected function validateNo(Request $request)
    {
        $this->validate($request,[
            'no'=>'required|numeric|unique:voters,phone_no'
        ]);
    }


    public function sendSms()
    {
        $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
        $authToken  = config('app.twilio')['TWILIO_AUTH_TOKEN'];
        $appSid     = config('app.twilio')['TWILIO_APP_SID'];
        $client = new Client($accountSid, $authToken);
        try
        {
            // Use the client to do fun stuff like send text messages!
            $client->messages->create(
            // the number you'd like to send the message to
            $this->phoneNo,
           array(
                 // A Twilio phone number you purchased at twilio.com/console
                 'from' => '+15046082474',
                 // the body of the text message you'd like to send
                 'body' => "Your verification code is {$this->verificationCode}"
             )
         );
        }
        catch (Exception $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }

    

    public function getresults(){
        $categories=category::all();

        $main_array2=$this->barGraphs();

        JavaScript::put([
            'bargraph' => $main_array2
        ]);

        
    

        return view('main/results')->with('categories',$categories);
    }




    public function results(Request $request,kura $kura){

        $main_array2=$this->barGraphs();

        JavaScript::put([
            'bargraph' => $main_array2
        ]);

        $categories=category::all();

        $this->validate($request,[
            'code'=>'required|numeric',
        ]);
        
        $votedCandidate=array();
        $sessionValues=$request->session()->get('votedCandidate');
        foreach($sessionValues as $value){
            array_push($votedCandidate,$value);//adding session values to array
        }
        array_shift($votedCandidate);//removing first value as its a token
        array_pop($votedCandidate);//removing last value as its a voter phone no

        $candidate=candidate::whereIn('id',$votedCandidate )->get();



        $voterNo=$request->session()->get('phoneNo');
        $inputToken=$request->input('code');
        $voter=voter::where('phone_no',$voterNo)->first();

        $token=$voter->token;

        if($token==$inputToken){

            for($i=0;$i<count($candidate);$i++){
                $kura=kura::whereIn('candidate_id',$candidate[$i])->first();
                $allVotes=$kura->votes;
                $kura->votes=$allVotes+1;
                $kura->save();
            }

            session()->flash('success','voting successfull');

            return view('main/results')->with('categories',$categories);

        }else{

            session()->flash('error','the code did not match');

            return view('main/verify')->with('candidate',$candidate);
        }
    }

     protected function barGraphs(){

        $candidatesArray=array();
        $main_array2=array();
        $votesArray=array();

        $categories=category::pluck('cat_name')->toArray();

        for( $i=0;$i<count($categories);$i++){

            $candidates=candidate::where('category',$categories[$i])->pluck('fname')->toArray();
            array_push($candidatesArray,$candidates);

            $votes=kura::where('category',$categories[$i])->pluck('votes')->toArray();
            array_push($votesArray,$votes);

        }

        array_push($main_array2,$categories);
        array_push($main_array2,$candidatesArray);
        array_push($main_array2,$votesArray);

        return $main_array2;
    }

    
}
