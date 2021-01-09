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
    $response = test()->post('login', [
        "email:" => "someRandomEmail@gmail.com",
        "password" => "testPassword",
    ]);

    $response->assertStatus(302);

});


test("login and tries to acess dashboard", function () {

    $user = App\Models\User::factory()->create();

    $response = actingAs($user)->get(route('home'));

    $response->assertStatus(200);
});

