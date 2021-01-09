<?php


function get(string $url)
{
    return test()->get($url);
}

function post(string $url, Array $data){
    return test()->post($url, $data);
}

function actingAs($user, $driver = NULL){

    return test()->actingAs($user, $driver);

}

