<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendSMSController extends Controller
{
    public	static	function	sendBySocket($type, $uri, $data)
	{

		$HttpSocket = new HttpSocket();

		if($type == 'xml')

		{

			$request = array(

				  'header' => array(

						'Accept' => 'application/xml', 

						'Content-Type' => 'application/xml; charset=UTF-8'

				  )

			 );

			 $xml = Xml::fromArray($data, 'tags');

			 $xml_data = $xml->asXML(); 

			 $response = $HttpSocket->post($uri, $xml_data, $request);

			 $response = new SimpleXMLElement($response->body()); 

			 $result = Xml::toArray($response);

			 return $result;

		}else //($type == 'json')

		{

			$request = array(

				  'header' => array(

						'Content-Type' => 'application/json'

				  )

			 );

			 $json_data = json_encode($data);

			 $response = $HttpSocket->post($uri, $json_data, $request);

			 $json = json_decode($response->body, true);

			 return $json;

		}

		

		return null;

	}


	public static function	VNP_send($content_data)
    {

		//pr($content_data);die();

		if ($content_data['ngayTaoTemplate'] > '2020-05-31') {
    		$uri=Configure::read('WebService.VNP_URL_SEND_NEW');
    	} else {
    		$uri=Configure::read('WebService.VNP_URL_SEND');
    	}

        $user=Configure::read('WebService.VNP_USERNAME');

        $pass=Configure::read('WebService.VNP_PASSWORD');

        $agentid=Configure::read('WebService.VNP_AGENTID');

        $agentusr=Configure::read('WebService.VNP_AGENTUSER');

		$labelID = $content_data['labelID'];

		$TEMPID = $content_data['templateID'];

		$mobilist = $content_data['phone_number'];

		//pr($mobilist);die();

		$type = 'xml';

		$params = array();
		$params[0] = array(
			"NUM" => 1,
			"CONTENT" => $content_data['message']
		);
		for ($i=0; $i < $content_data['soluong_param']; $i++) { 
			$params[$i] = array(
				"NUM" => $i + 1,
				"CONTENT" => $content_data['param_content_' . ($i + 1)]
			);
		}

		$data = array(

				"RQST" => array(

				"name" => "send_sms_list",

				"REQID" => time(), // unique ID , auto generated

				"LABELID" => $labelID,

				"TEMPLATEID" => $TEMPID,

				"ISTELCOSUB" => "0",

				"CONTRACTTYPEID" => "1",

				"SCHEDULETIME" => "",//date("d/m/Y H:i", time()),

				"MOBILELIST" => $mobilist,

				"AGENTID" => $agentid,

				"APIUSER" => $user,

				"APIPASS" => $pass,

				"USERNAME" => $agentusr,

				"CONTRACTID" => "407",

				// tham số params bắt buộc phải có, nếu ko có nên truyền vào tham số như dưới

				"PARAMS" => $params

					)

				);


	$status = SMSComponent::sendBySocket($type, $uri, $data);

	return $status['RPLY']['ERROR'];
    }
}
