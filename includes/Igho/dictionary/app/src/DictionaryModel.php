<?php
/**
 * Created by PhpStorm.
 * User: slim
 * Date: 24/10/17
 * Time: 10:01
 */


class DictionaryModel
{
    private $word;
    private $definition;
    private $count_definitions;
//    private $obj_xml_parser;

    public function __construct(){}

    public function __destruct(){}

    public function setParameters($word)
    {
        $this->word = $word;
    }

//    public function setXmlParser($obj_xml_parser)
//    {
//        $this->obj_xml_parser = $obj_xml_parser;
//    }

    public function searchForMeaning()
    {
        $soapcallresult = null;
        $definitions = null;
        $obj_soap_client_handle = null;
        $obj_soap_client_handle = $this->createSoapClient();

        if ($obj_soap_client_handle !== false)
        {
            $soapcallresult = $this->retrieveDefinition($obj_soap_client_handle);
        }

        if ($soapcallresult)
        {
            $definitions = $this->processDefinitions($soapcallresult);

//            $this->obj_xml_parser->set_xml_string_to_parse($soapresult);
//            $this->obj_xml_parser->parse_the_xml_string();
//            $definition = $this->obj_xml_parser->get_parsed_data();
        }

        $this->result['word'] = $this->word;
        $this->result['count'] = $this->count_definitions;
        $this->result['definitions'] = $definitions;
    }

    private function createSoapClient()
    {
        $obj_soap_client_handle = false;

        $arr_soapclient = ['trace' => true, 'exceptions' => true];
        $wsdl = WSDL;

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

    /**
     * @param $obj_soap_client_handle
     * @return null
     */
    private function retrieveDefinition($obj_soap_client_handle)
    {
        $result = null;
        $parameters = new stdClass();

        $webservicefunction = 'Define';
        $parameters->word = $this->word;

        try
        {
            $result = $obj_soap_client_handle->{$webservicefunction}($parameters);

//      var_dump($obj_soap_client_handle->__getLastRequest());
//      var_dump($obj_soap_client_handle->__getLastResponse());
//      var_dump($obj_soap_client_handle->__getLastRequestHeaders());
//      var_dump($obj_soap_client_handle->__getLastResponseHeaders());
        }
        catch (SoapFault $obj_exception)
        {
            trigger_error($obj_exception);
        }

        return $result;
    }

    /**
     * all returned definitions (there may be more than one)
     * need to be converted into an array for outputting.
     *
     * The web service also returns the particular dictionary in which a definition
     * was located.
     *
     * Note how the returned values are structured within an object.
     *
     * @param $soap_call_result
     * @return array
     */

    private function processDefinitions($soap_call_result)
    {
        $results = [];
        $count_definitions = 0;

        if (isset($soap_call_result->DefineResult->Definitions->Definition))
        {
            $soap_call_result_array = $soap_call_result->DefineResult->Definitions->Definition;

            foreach ($soap_call_result_array as $definition)
            {
                $count_definitions++;
                $dictionary_id = $definition->Dictionary->Id;
                $dictionary_name = $definition->Dictionary->Name;
                $word_definition = $definition->WordDefinition;

                $results[$count_definitions]['dictionary_id'] = $dictionary_id;
                $results[$count_definitions]['dictionary_name'] = $dictionary_name;
                $results[$count_definitions]['word_definition'] = $word_definition;
            }
        }

        $this->count_definitions = $count_definitions;
        return $results;
    }

    public function getResult()
    {
        return $this->result;
    }

    private function selectDetail()
    {

    }
}