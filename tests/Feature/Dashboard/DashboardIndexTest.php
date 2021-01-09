<?php
use function Pest\Faker\faker;

it('dashboard  page loads', function () {
    $user = userFactory()->create();

    $response = actingAs($user)->get('/twicks');

    expect(Auth::User()->timeline())->toBeInstanceOf(Illuminate\Pagination\LengthAwarePaginator::class);
    
    expect(auth()->user()->follows)->toBeObject();

    $response->assertStatus(200);
});

test('can create twicks!', function() {
    $user = userFactory()->create();

    $response = actingAs($user)->post('twicks',[
        'body' => faker()->text
    ]);

    $response->assertSessionHasNoErrors();
});

test('can destroy twicks', function() {
    $twick = twickFactory()->create();
    $user = findUserById($twick->user->id);

    $response = actingAs($user)->delete(route('destroyTwick', $twick->id));
    
    $response->assertSessionHasNoErrors();
});