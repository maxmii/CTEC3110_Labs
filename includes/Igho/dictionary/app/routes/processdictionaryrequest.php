<?php
/**
 * Created by PhpStorm.
 * User: cfi
 * Date: 20/11/15
 * Time: 14:01
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->post(
    '/processdictionaryrequest',
    function(Request $request, Response $response) use ($app)
    {
        $validated_word = false;
        //$validated_word_specialcharacters = false;
        $word_definitions = '';
        $no_definition = '';
        $definitions = '';

        $arr_tainted_params = $request->getParsedBody();

        $validator = $this->get('validator');
        $dictionary_model = $this->get('dictionary_model');

        if (isset($arr_tainted_params['word']))
        {
            $tainted_word = $arr_tainted_params['word'];
            $validated_word = $validator->validateWord($tainted_word);
//            $validated_word_specialcharacters = $validator->validateWord($tainted_word);
        }

        if ($validated_word)
        {
            $dictionary_model->setParameters($validated_word);

//      $xml_parser = $this->get('xml_parser');
//      $dictionary_model->setXmlParser($xml_parser);

            $dictionary_model->searchForMeaning();
            $word_definitions = $dictionary_model->getResult();
        }
/*
        if ($validated_word_specialcharacters == false)
        {
            $dictionary_model->setParameters($validated_word_specialcharacters);
            $dictionary_model->searchForMeaning();
            $word_definitions = $dictionary_model->getResult();
        }
*/

        if ($word_definitions === false || $word_definitions == null)
        {
            $selected_detail = 'service not available';
        }

        $word_entered = $word_definitions['word'];

        if ($word_definitions['count'] <= 0)
        {
            $no_definition = 'No results are available for the word you entered.  Please try again';
        }

        elseif (preg_match("/['^£$%&*()}{@#~?><>,|=_+¬-]/i", $word_entered, $match))
        {
            $word_entered = "Invalid Characters";
        }





            else
        {
            $definitions = $word_definitions['definitions'];
        }
        return $this->view->render($response,
            'display_result.html.twig',
            [
                'css_path' => CSS_PATH,
                'landing_page' => LANDING_PAGE,
                'initial_input_box_value' => null,
                'page_title' => APP_NAME,
                'page_heading_1' => APP_NAME,
                'page_heading_2' => 'Result of Dictionary Search',
                'word_entered' => $word_entered,
                'defn_count' => $word_definitions['count'],
                'no_definition' => $no_definition,
                'definitions' => $definitions,
            ]);
    });
