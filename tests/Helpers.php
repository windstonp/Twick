<?php


function get(string $url)
{
    return test()->get($url);
}
function actingAs($user, $driver = NULL){

    test()->actingAs($user, $driver);

}