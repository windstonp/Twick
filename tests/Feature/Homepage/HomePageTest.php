<?php

it('homepage page loads correctly', function () {
    $response = get(route('index.home'));

    $response->assertStatus(200);
});
