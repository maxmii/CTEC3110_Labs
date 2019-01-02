<?php


class SMS
{
    public $source_msisdn;
    public $destination_msisdn;
    public $received_time;
    public $bearer;
    public $message_ref;
    public $message;

    public static function parse($xml) {
        $smsArrayInfo = simplexml_load_string($xml);

        $sms = new SMS();
        $sms->source_msisdn = $smsArrayInfo->sourcemsisdn;
        $sms->destination_msisdn = $smsArrayInfo->destinationmsisdn;
        $sms->received_time = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $smsArrayInfo->receivedtime)));
        $sms->bearer = $smsArrayInfo->bearer;
        $sms->message_ref = $smsArrayInfo->messageref;
        $sms->message = $smsArrayInfo->message;

        return $sms;
    }
}