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
    '/processtemperatureconversion',
    function(Request $request, Response $response) use ($app)
    {
        $arr_tainted_params = $request->getParsedBody();

        $validator = $this->get('validator');
        $tempconv_model = $this->get('tempconv_model');

        $tainted_conversion_type = $arr_tainted_params['conversion_type'];
        $validated_conversion_type = $validator->validateConversionType($tainted_conversion_type);
        $tainted_temperature = $arr_tainted_params['temperature'];
        $validated_temperature = $validator->validateTemperature($tainted_temperature);
        $tainted_windspeed = $arr_tainted_params['windspeed'];
        $validated_windspeed = $validator->validateWindspeed($tainted_windspeed);
        $tempconv_model->setConversionParameters(
            $validated_conversion_type,
            $validated_temperature,
            $validated_windspeed
        );

        $tempconv_model->performTemperatureConversion();
        $temperature_conversion_result = $tempconv_model->getResult();

        if ($temperature_conversion_result === false)
        {
            $temperature_conversion_result = 'not available';
        }

        $arr_temperature_units = TEMP_UNITS;

        return $this->view->render($response,
            'display_result.html.twig',
            [
                'css_path' => CSS_PATH,
                'landing_page' => LANDING_PAGE,
                'initial_input_box_value' => null,
                'page_title' => APP_NAME,
                'page_heading_1' => APP_NAME,
                'page_heading_2' => 'Result',

                'temperature' => $validated_temperature,
                'conversion' => $arr_temperature_units[$validated_conversion_type],
                'result' => $temperature_conversion_result,
            ]);
    });
