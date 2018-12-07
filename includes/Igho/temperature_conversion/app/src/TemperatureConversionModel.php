<?php
/**
 * Created by PhpStorm.
 * User: slim
 * Date: 24/10/17
 * Time: 10:01
 * This phpfile contains functions that enables the entered parameters to be processed by the processtemperatureconversion
 * class, to compute and display temperature conversion results
 *
 */



class TemperatureConversionModel
{
    private $c_conversion_type;
    private $c_temperature;
    private $c_windspeed;
    private $c_result;

    public function __construct(){}

    public function __destruct(){}

    public function setConversionParameters($conversion_type, $temperature, $windspeed)
    {
        $this->c_conversion_type = $conversion_type;
        $this->c_temperature = $temperature;
        $this->c_windspeed = $windspeed;
    }

    public function performTemperatureConversion()
    {
        $result = null;
        $obj_soap_client_handle = null;
        $obj_soap_client_handle = $this->createSoapClient();

        if ($obj_soap_client_handle !== false)
        {
            $result = $this->convertTemperature($obj_soap_client_handle);
        }
        $this->c_result = $result;
    }

    private function createSoapClient()
    {
        $obj_soap_client_handle = false;
        $wsdl = WSDL;
        $arr_soapclient = ['trace' => true, 'exceptions' => true];

        try
        {
            $obj_soap_client_handle = new SoapClient($wsdl, $arr_soapclient);
//            var_dump($obj_soap_client_handle->__getFunctions());
//            var_dump($obj_soap_client_handle->__getTypes());
        }
        catch (SoapFault $obj_exception)
        {
            trigger_error($obj_exception);
        }

        return $obj_soap_client_handle;
    }


    private function convertTemperature($obj_soap_client_handle)
    {
        $conversion_result = new stdClass();
        $temperature = false;

        $conversion_required = $this->c_conversion_type;

        $parameters = $this->createParameterString($conversion_required);

        try
        {
            $conversion_result = $obj_soap_client_handle->{$conversion_required}($parameters);
            $temperature = $this->extractResult($conversion_required, $conversion_result);

//      var_dump($obj_soap_client_handle->__getLastRequest());
//      var_dump($obj_soap_client_handle->__getLastResponse());
//      var_dump($obj_soap_client_handle->__getLastRequestHeaders());
//      var_dump($obj_soap_client_handle->__getLastResponseHeaders());
        }
        catch (SoapFault $obj_exception)
        {
            trigger_error($obj_exception);
        }

        return $temperature;
    }

    private function createParameterString($conversion_required)
    {
        $temperature = $this->c_temperature;
        $windspeed = $this->c_windspeed;
        $parameters = new stdClass();
        switch ($conversion_required)
        {
            case 'CelsiusToFahrenheit':
                $parameters->nCelsius = $temperature;
                break;
            case 'FahrenheitToCelsius':
                $parameters->nFahrenheit = $temperature;
                break;
            case 'WindChillInCelsius':
                $parameters->nCelsius = $temperature;
                $parameters->nWindSpeed = $windspeed;
                break;
            case 'WindChillInFahrenheit':
                $parameters->nFahrenheit = $temperature;
                $parameters->nWindSpeed = $windspeed;
                break;
        }

        return $parameters;
    }

   private function extractResult($conversion_required, $conversion_result)
    {
        $temperature = null;

        switch ($conversion_required)
        {
            case 'CelsiusToFahrenheit':
                $temperature = $conversion_result->CelsiusToFahrenheitResult;
                break;
            case 'FahrenheitToCelsius':
                $temperature = $conversion_result->FahrenheitToCelsiusResult;
                break;
            case 'WindChillInCelsius':
                $temperature = $conversion_result->WindChillInCelsiusResult;
                break;
            case 'WindChillInFahrenheit':
                $temperature = $conversion_result->WindChillInFahrenheitResult;
                break;
        }
        return $temperature;
    }

    public function getResult()
    {
        return $this->c_result;
    }
}