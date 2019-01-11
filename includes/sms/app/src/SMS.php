<?php


class SMS
{
    public $source_msisdn;
    public $destination_msisdn;
    public $received_time;
    public $bearer;
    public $message_ref;
    public $message;

    /**
     *
     * @param $xml
     * @return SMS
     *Parses the data that we get from the EE M2M Server and formats it into a readable format for users
     */
    public static function parse($xml) {
        $smsArrayInfo = simplexml_load_string($xml);

        $sms = new SMS();
        $sms->source_msisdn = $smsArrayInfo->sourcemsisdn;
        $sms->destination_msisdn = $smsArrayInfo->destinationmsisdn;
        $sms->received_time = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $smsArrayInfo->receivedtime)));//Changes the format of the time received into a better readable format
        $sms->bearer = $smsArrayInfo->bearer;
        $sms->message_ref = $smsArrayInfo->messageref;
        $sms->message = $smsArrayInfo->message;

        return $sms;
    }
}