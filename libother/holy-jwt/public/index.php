<?php
/**
 *
 * @author:  leixu
 * @version: 1.0.0
 * @change:
 *    1. 2020/12/9 leixu: 创建；
 */

require __DIR__ . '/../vendor/autoload.php';


use \Firebase\JWT\JWT;

$key = "example_key";
$payload = array(
//    "iss" => "http://example.org",
//    "aud" => "http://example.com",
//    "iat" => time(),//签发时间
    "exp" => 1611405151,//过期时间
//    "nbf" => time(),//签发时间
    "uid" => '226',//面向的用户，比如用户id
);

/**
 * IMPORTANT:
 * You must specify supported algorithms for your application. See
 * https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40
 * for a list of spec-compliant algorithms.
 */
$jwt = JWT::encode($payload, $key);
print_r($jwt);

$decoded = JWT::decode($jwt, $key, array('HS256'));
$decoded =  json_decode( json_encode( $decoded),true);
print_r($decoded);die;

/*
 NOTE: This will now be an object instead of an associative array. To get
 an associative array, you will need to cast it as such:
*/

$decoded_array = (array) $decoded;

/**
 * You can add a leeway to account for when there is a clock skew times between
 * the signing and verifying servers. It is recommended that this leeway should
 * not be bigger than a few minutes.
 *
 * Source: http://self-issued.info/docs/draft-ietf-oauth-json-web-token.html#nbfDef
 */
JWT::$leeway = 60; // $leeway in seconds
$decoded = JWT::decode($jwt, $key, array('HS256'));