<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use GuzzleHttp\Client;

class TestController extends BaseController{
    function aa(Request $request){
        $params = [
            'key' => '*****',
            'userid' => 'yemeishu'
        ];

        $params['info'] = $request->input('info', '你好吗');

        $client = new Client();
//        $options = json_encode($params, JSON_UNESCAPED_UNICODE);
//        $data = [
//            'body' => $options,
//            'headers' => ['content-type' => 'application/json']
//        ];

        // 发送 post 请求
        $response = $client->get('http://www.baidu.com');

        $callback = ($response->getBody()->getContents());

        echo ($callback);
//        return $this->output_json('200', '测试图灵机器人返回结果', $callback);

    }

    function bb(){
        $array = [
            'fruit' =>  'orange',
            'food'  =>  'beef',
            'drink' =>  'water'
        ];
        foreach($array as $item){
            dump(current($array));
//            next($array);
//            dump($item);
        }
    }


    function xrange($start, $end, $step = 1) {
        for ($i = $start; $i <= $end; $i += $step) {
            yield $i;
        }
    }


    function cc(){
//        $result = $this->xrange(1,1000,1);
//        dump($result);

//        $result2 = range(1,1000);
//        dd($result2);

        dd(memory_get_usage()/1024);
    }
}