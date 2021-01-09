<?php


function get(string $url)
{
    return test()->get($url);
}
function actingAs(Authenticable $user, $driver = NULL){

    test()->actingAs($user, $driver);

}