<?php

test('test profile page loads correctly', function () {
    $user = userFactory()->create();

    $response = actingAs($user)->get(route('profile',$user->username));

    expect($user->twicks()->WithLikes()->paginate(5))->toBeInstanceOf('Illuminate\Pagination\LengthAwarePaginator');

    $response->assertStatus(200);
});

test('test edit profile page loads correctly', function () {
    $user = userFactory()->create();
    $response = actingAs($user)->get(route('profileEdit',$user->username));

    $response->assertStatus(200);
});

