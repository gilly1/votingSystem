<?php

namespace  App\verification;

use App\User;
use Illuminate\Http\Request;

class MagicAuthentication
{
    protected $request;
    protected $identifier='phone';

    public function __construct(Request $request)
    {
        $this->request=$request;
    }

    public function requestToken()
    {
        $user=$this->getUserByIdentifier($this->request->get($this->identifier));

        $user->storeToken();
        $user->sendSms();
    }

    protected function getUserByIdentifier($value)
    {
        return kura::where($this->identifier,$value)->firstOrFail();
    }
}