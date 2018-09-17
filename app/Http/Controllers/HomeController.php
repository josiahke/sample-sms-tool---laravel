<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\NumberParseException;

use DataTables;
use Carbon;
use Form;
use Log;
use Auth;

use App\library\Sender;
use App\Events\SmsSent;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function SendSms (Request $request){
        //dd($request);

        $phoneUtil = PhoneNumberUtil::getInstance();
        try {
            $NumberProto = $phoneUtil->parse($request->get('full_phone'), "KE");
            $isValid = $phoneUtil->isValidNumber($NumberProto);
            if (!$isValid) {
                $phone = $request->get('full_phone');
            }
            $internationalNumber = $phoneUtil->format($NumberProto, PhoneNumberFormat::E164);
            $phone = str_replace("+","",$internationalNumber);
        } catch (NumberParseException $e) {
            $phone = $request->get('full_phone');
        }

        $smsData = [];
        $sms_sender = new Sender();
        $smsData['sms'] = $request->get('sms');
        $sent = $sms_sender->ValidateAndSendSms([$phone], $smsData, 'sms' );

        Log::alert($sent);
        $smsData['phone'] = $request->get('full_phone');
        $smsData['created_by'] = auth()->user()->id;

        if ($sent[0]['status'] = 'Success') {
            $smsData['status'] = 1;
            event(new SmsSent(auth()->user(),$smsData));
            return redirect()->back()->withSuccess('sms was sent');
        }

        $smsData['status'] = 0;
        event(new SmsSent(auth()->user(),$smsData));

        return redirect()->back()->withError('sms was not sent');

    }

}
