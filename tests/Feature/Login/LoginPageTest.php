<?php

it("login page loads correctly", function () {

    $response = get("/login");
    
    $response->assertStatus(200);
});

it("tries to acess dashboard without login", function () {

    $response = get(route('home'));

    $response->assertStatus(302);

});

it("fails to login", function () {
    $response = post('login', [
        "email:" => "someRandomEmail@gmail.com",
        "password" => "testPassword",
    ]);

    $response->assertSessionHasErrors('email','password');

});


test("login and tries to acess dashboard", function () {

    $user = App\Models\User::factory()->create();

    $response = actingAs($user)->get(route('home'));

    $response->assertStatus(200);
});

