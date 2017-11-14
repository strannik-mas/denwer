<?php
	//try{
		$client = new SoapClient("http://localhost/denwer/soap/stock.wsdl", array('compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP));
		var_dump( $client->__getFunctions());
		var_dump( $client);
		// Создать SOAP-клиента
		$result = $client->getStock("20");
		echo $result;
		// Послать SOAP-запрос c получением результат
		
	/*}catch (SoapFault $exception){
		echo $exception->getMessage()."<br>";
	}
		*/
	
?>