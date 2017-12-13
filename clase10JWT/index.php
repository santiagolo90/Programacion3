<?php
use \Firebase\JWT\JWT;
require '/vendor/autoload.php';

$key = "example_key";
$token = array(
    "iss" => "http://example.org",
    "aud" => "http://example.com",
    "iat" => 1356999524,
    "nbf" => 1357000000
);

/**
 * IMPORTANT:
 * You must specify supported algorithms for your application. See
 * https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40
 * for a list of spec-compliant algorithms.
 */
$jwt = JWT::encode($token, $key);
$decoded = JWT::decode($jwt, $key, array('HS256'));

//print_r($decoded);
//print_r ( $jwt);
//print_r(APACHE_REQUEST_HEADERS());
/*
$arrayConToken = $request->getHeader('miTokenUTNFRA');
$token=$arrayConToken[0];
$response->getBody()->write(" PHP :Su token es ".$token);  
*/
try {
    
    $arrayConToken = APACHE_REQUEST_HEADERS();//APACHE_REQUEST_HEADERS() duevuelve array con las Header
    //print_r($arrayConToken["miToken"]);
    $decoded = JWT::decode($arrayConToken["miToken"], $key, array('HS256'));
    
        } 
        catch (Exception $e) {
            print_r("Error");
          //$textoError="error ".$e->getMessage();
          //$error = array('tipo' => 'acceso','descripcion' => $textoError);
          //$newResponse = $response->withJson( $error , 403); 
    
        }


?>