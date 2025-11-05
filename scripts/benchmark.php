<?php

/** 
 * This is a simple benchmark that generates 10,000 random posts (each post is aproximately 8kb)
 * you can run it again to see the cached benchmark result (up to 10x faster)
 * remove the "/cache" directory and the "/test" directory to see the cold result again
 * only the build time is recorded, not the time taken to generate the dataset
 * */ 

require dirname(__DIR__) . "/vendor/autoload.php";

use Taujor\PHPSSG\Utilities\Locate;

Locate::build("/test");

ini_set('memory_limit', '512M');

use Taujor\PHPSSG\Contracts\Buildable;

class Post extends Buildable {
    function __invoke($data){
        return <<<HTML
        <h1>{$data->title}</h1>
        <p>{$data->content}</p>
        HTML;
    }
}

function random_string(int $length){
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $repeat = ceil($length / strlen($characters));
    $str = str_repeat($characters, $repeat);
    return substr(str_shuffle($str), 0, $length);
}

function random_object(?int $id = null){
    // aproximately 8kb of data
    return (object) [
        'id' => $id ?? rand(),
        'slug' => random_string(rand(30, 60)),
        'title' => random_string(rand(50, 70)),
        'content' => random_string(rand(7000, 7000))
    ];
}

function random_dataset(int $length){
    $data = []; 
    
    for ($i=0; $i < $length; $i++) { 
        array_push($data, random_object($i +1));
    }
    
    return $data;
}

if(!is_dir(Locate::build())){
    mkdir(Locate::build());
}

@$dataset = json_decode(file_get_contents(Locate::build() . "/benchmark.json")) ?: random_dataset(10000);

$json = json_encode($dataset);

file_put_contents(Locate::build() . "/benchmark.json", $json);

$start = microtime(true);

Post::build("/posts/post-{{id}}.html", $dataset);

$end = microtime(true);

$time = $end - $start;

printf("Built %d posts in %.3f seconds\n", count($dataset), $time);