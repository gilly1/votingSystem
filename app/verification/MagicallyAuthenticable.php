<?php

namespace App\verification;

use App\kura;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\Jwt\ClientToken;

trait MagicallyAuthenticable
{
    

    protected $code;

    

    public function storeToken()
    {
        $this->kura()->delete();

        $min = pow(10, 3);
        $max = $min * 10 - 1;
        $code=mt_rand($min, $max);

        $token =$this->kura()->create([
            
            'code'=>$code
        ]);

        $this->code=$code;
        return $this->code;
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
            $this->getPhoneNumber(),
           array(
                 // A Twilio phone number you purchased at twilio.com/console
                 'from' => '+15046082474',
                 // the body of the text message you'd like to send
                 'body' => "Your verification code is {$this->code}"
             )
         );
        }
        catch (Exception $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }


    public function isValid()
    {
        return ! $this->isUsed() && ! $this->isExpired();
    }

    public function isUsed()
    {
        return $this->used;
    }

    public function isExpired()
    {
        $durations=15;
        return $this->created_at->diffInMinutes(Carbon::now()) > static::$durations;
    }



    public function kura()
    {
        return $this->hasOne(kura::class);
    }

    public function getPhoneNumber()
    {
        return $this->country_code.$this->phone;
    }
}