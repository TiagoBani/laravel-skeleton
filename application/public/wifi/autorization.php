<?php

class Autorization {

    const URL = "https://ws.iamspe.sp.gov.br/iamspe/beneficiario/services/BeneficiarioWS";
    const USER = 'MV';
    const PASS = 'ZU0mNSY';

    private static function SoapClient(){
        if (!extension_loaded('soap'))
            throw new SoapExtensionNotInstalled('The "soap" module must be enabled in your PHP installation. The "soap" module is required.');            
        
        $contextOptions = array('ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        ));

        $sslContext = stream_context_create($contextOptions);

        $params = array(
            'trace' => 1,
            'exceptions' => true,
            'cache_wsdl' => WSDL_CACHE_NONE,
            'stream_context' => $sslContext,
            'location' => self::URL
        );

        return new SoapClient(self::URL . '?wsdl', $params);
    }

    private static function ConsultaElegibilidadeMV($subscription, $date)
    {
        $arguments = array(
            'usuario' => self::USER,
            'senha' => self::PASS,
            'numeroInscricao' => substr($subscription, 0, -2),
            'sequenciaNumeroInscricao' => substr($subscription, -2),
            "dataNascimento" => $date->format('d/m/Y')
        );

        return self::SoapClient()->ConsultaElegibilidadeMV($arguments);
    }

    public static function validate($subscription, $birthday){
        if(empty($subscription) || strlen($subscription) < 2 || empty($birthday))
            return false;

        $date = new DateTime($birthday);
        $result = self::ConsultaElegibilidadeMV($subscription, $date);

        if($result->return->situacao == "S")
            return true;
        return false;
    }
}
