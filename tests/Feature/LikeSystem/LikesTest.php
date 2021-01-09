<?php

test('test store likes method', function() {
    $twick = twickFactory()->create();
    $user = userFactory()->create();

    $response = actingAs($user)->post(route('likeTwickStore', $twick->id));
    
    $response->assertSessionHasNoErrors();
});

test('test dislike method', function (){
    $twick = twickFactory()->create();
    $user = userFactory()->create();

    $response = actingAs($user)->delete(route('likeTwickStore', $twick->id));
    
    $response->assertSessionHasNoErrors();
});