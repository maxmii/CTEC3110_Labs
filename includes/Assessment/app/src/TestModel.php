<?php
/**
 *Testing to create the SOAP client
 */


class TestModel
{
    public function __construct(){}

    public function __destruct(){}


    private function createSoapClient()
    {
        $obj_soap_client_handle = false;
        $wsdl = WSDL;
        $arr_soapclient = ['trace' => true, 'exceptions' => true];

        try
        {
        $obj_soap_client_handle = new SoapClient($wsdl, $arr_soapclient);
        }
        catch (SoapFault $obj_exception)
        {
            trigger_error($obj_exception);
        }

        return $obj_soap_client_handle;

    }




}