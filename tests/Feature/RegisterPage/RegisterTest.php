<?php
use function Pest\Faker\faker;

it('test if register page loads correctly!', function () {

    $response = get('/register');

    $response->assertStatus(200);

});

test('try to register without send data', function() {
    $response = post('register',[]);

    $response->assertSessionHasErrors([
        'email',
        'password',
        'name',
        'username'
    ]);

});

test('register success!', function(){
    
    $response = post('register', [
        'username' => faker()->firstName,
        'name' => faker()->name,
        'email' => faker()->email,
        'password' => '12345678',
        'password_confirmation' => '12345678'
    ]);

    $response->assertSessionHasNoErrors();
});
