<?php
use function Pest\Faker\faker;

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

test('test if can destroy a profile', function() {
    $user = userFactory()->create();
    $response = actingAs($user)->delete(route('profileDestroy', $user->username));

    $response->assertStatus(302);
});

test('test update profile method', function () {
    $user = userFactory()->create();

    $response = actingAs($user)->put(route('profileUpdate', $user->username),[
        'name' => faker()->name,
        'username' => faker()->firstName,
        'avatar' => 'faker()->image',
        'banner' => 'faker()->image',
        'email' => faker()->email,
        'password' => '12345678',
        'password_confirmation' => '12345678'
    ]);

    $response->assertSessionHasErrors('avatar','banner');
});