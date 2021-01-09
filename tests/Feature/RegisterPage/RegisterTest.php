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
        'username' => faker()->username,
        'name' => faker()->name,
        'email' => faker()->email,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'password-confirm' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
    ]);

    $response->assertSessionHasErrors();
});
