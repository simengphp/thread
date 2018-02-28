<?php
class Request extends Thread{

    public $url;
    public $response;
    public function __construct($url){
        $this->url = $url;
    }

    public function run($url){
        $this->response = file_get_contents($url);
    }


}



$threadG = new Request("www.simengphp.com");
$threadB = new Request("www.baidu.com");
$threadB->start();
$threadG->start();

$threadB->join();
$threadG->join();


$sg = $threadG->response;
$sb = $threadB->response;


var_dump($sg);
var_dump($sb);