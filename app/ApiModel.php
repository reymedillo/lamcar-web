<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Exception;
use App\Exceptions\AjaxException;
use App\ApiResponse;

class ApiModel
{

    static function call($method, $url, $params=array(), $ajax=false)
    {
        try{
            $client = new Client();
            $params['client_name']         = env('API_CLIENT_NAME');
            $params['client_secret']     = env('API_SECRET');
                        
            if($method == "GET"){
                $count = 0;
                $lastItem = count($params) - 1;
                foreach($params as $key => $param) {
                    if($count == 0) $url .= '?';
                    $url .= $key."=".$param;
                    if($count != $lastItem) $url .= '&';
                    $count++;
                }
            }
            
            $res = $client->request($method, $url, [
                'form_params' => $params,
                'headers' => [
                    'Accept-Language' => \App::getLocale(),
                ],
            ]);
                       
            return new ApiResponse($res);

        }catch (RequestException $e) {
            if ($e->hasResponse()){
                $statusCode = $e->getResponse()->getStatusCode();
                $message = json_decode($e->getResponse()->getBody())->message;
                if($statusCode == 422 || $statusCode == 412){
                    return new ApiResponse($e->getResponse());
                }else{
                    if($ajax){
                        throw new AjaxException($statusCode, $message);
                    }else{
                        throw new HttpException($statusCode, $message);
                    }
                }
            }
            if($ajax){
                throw new AjaxException(400, "Api Error");
            }else{
                throw new HttpException(400, "Api Error");
            }
        }
    }

    static function callByAuth($method, $url, $params=array(), $ajax=false)
    {
        try{
            $client = new Client();
            $params['client_secret']   = env('API_SECRET');
            $params['client_name']     = env('API_CLIENT_NAME');

            if($method == "GET"){
                $count = 0;
                $lastItem = count($params) - 1;
                foreach($params as $key => $param) {
                    if($count == 0) $url .= '?';
                    $url .= $key."=".$param;
                    if($count != $lastItem) $url .= '&';
                    $count++;
                }
            }

            $res = $client->request($method, $url, [
                'form_params' => $params,
                'headers' => [
                    'Accept-Language' => \App::getLocale(),
                    'Authorization' => 'Bearer '.\Session::get('access_token')['value'],
                ],
            ]);

            return new ApiResponse($res);

        }catch (RequestException $e) {
            if ($e->hasResponse()){
                $statusCode = $e->getResponse()->getStatusCode();
                $message = json_decode($e->getResponse()->getBody())->message;
                if($statusCode == 422 || $statusCode == 412){
                    return new ApiResponse($e->getResponse());
                }else{
                    if($ajax){
                        throw new AjaxException($statusCode, $message);
                    }else{
                        throw new HttpException($statusCode, $message);
                    }
                }
            }
            if($ajax){
                throw new AjaxException(400, "Api Error");
            }else{
                throw new HttpException(400, "Api Error");
            }
        }
    }

}
