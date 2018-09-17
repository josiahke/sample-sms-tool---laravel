<?php

namespace App\library;

use App\library\AfricasTalkingGateway;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\NumberParseException;
use Illuminate\Support\Facades\Log;
use DB;

class Sender
{
    public static function t(){
        echo "one";
    }
    public function ValidateAndSendSms($numbers, $data, $type)
    {
        if (!$this->prepNumbers($numbers)) {
            return FALSE;
        }
        $recipients = $this->prepNumbers($numbers);
        $message = trans('messages.' . $type, $data);
        $result = self::sendMessage($recipients, $message);

        Log::alert('sending sms log : ' . json_encode($result));

        return $result;
    }

    public function prepNumbers($numbers)
    {
        $validNumbers = [];
        foreach ($numbers as $number) {
            if ($this->validatePhoneNumber($number)) {
                $validNumbers[] = $this->validatePhoneNumber($number);
            }
        }
        if (count($validNumbers) > 0) {
            Log::info(implode(",", $validNumbers));

            return implode(",", $validNumbers);
        }

        return FALSE;
    }

    public function sendMessage($recipients, $message)
    {
        $gateway = new AfricasTalkingGateway(config('services.africa.username'), config('services.africa.key'));
        try {
            $results = $gateway->sendMessage($recipients, $message, 'MOOKH');

            $response = [];
            foreach ($results as $key => $result) {
                $response[ $key ]['number'] = $result->number;
                $response[ $key ]['status'] = $result->status;

            }

            return $response;
        } catch (Exception $e) {
            return ["Encountered an error while sending: " . $e->getMessage()];
        }

    }

    public function ticketCount($data)
    {
        $d = DB::table('ticket_order_pivot')
            ->where('ticket_order_id', '=', $data['ticket_order_id'])
            ->where('ticket_category_id', '=', $data['ticket_category_id'])
            ->first();
        if ($d == null) {
            DB::table('ticket_order_pivot')->insert($data);
        }

        return TRUE;
    }

    public function validatePhoneNumber($number)
    {
        $phoneUtil = PhoneNumberUtil::getInstance();
        try {
            $NumberProto = $phoneUtil->parse($number, "KE");
            $isValid = $phoneUtil->isValidNumber($NumberProto);
            if (!$isValid) {
                return FALSE;
            }
            $internationalNumber = $phoneUtil->format($NumberProto, PhoneNumberFormat::E164);

            return $internationalNumber;
            Log::alert($internationalNumber);
        } catch (NumberParseException $e) {
            return FALSE;
        }

    }

}
