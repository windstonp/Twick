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

test('test if can get user avatar and banner', function(){
    $user = userFactory()->create();
    expect($user->getbannerAttribute('a'))->toBeString();
});


test('test user likes method', function(){
    $user = userFactory()->create();
    expect($user->likes())->toBeObject();
});

test('test if an user can follow another user', function(){
    $user = userFactory()->create();
    $userToBeFollow = userFactory()->create();

    $response = actingAs($user)->post(route('followUser', $userToBeFollow->username));

    expect($user->follows)->toBeObject();

    $response->assertStatus(302);
});



test('test followable trait at method follow and unfollow', function(){
    $user = userFactory()->create();
    $userToBeFollow = userFactory()->create();

    $user->follow($userToBeFollow);
    $user->unfollow($userToBeFollow);

    expect($user->follows())->toBeObject();

});

