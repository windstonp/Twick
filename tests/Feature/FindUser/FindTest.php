<?php

it('find page load correctly', function () {
    $user = userFactory()->create();
    $response = actingAs($user)->get('/find');

    $response->assertStatus(200);
});
