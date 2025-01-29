<?php

use App\Models\User;
use App\Models\Booking;
use App\Models\Service;
use App\Models\SubService;
use App\Models\DeliveryDays;
use Laravel\Sanctum\Sanctum;
use App\Models\SubServiceTemplate;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class, WithFaker::class);

beforeEach(function () {
    $this->withoutExceptionHandling();

    $user = User::factory()->create(['email' => 'admin@admin.com']);

    Sanctum::actingAs($user, [], 'web');
});

test('it gets bookings list', function () {
    $bookings = Booking::factory()
        ->count(5)
        ->create();

    $response = $this->get(route('api.bookings.index'));

    $response->assertOk()->assertSee($bookings[0]->text);
});

test('it stores the booking', function () {
    $data = Booking::factory()
        ->make()
        ->toArray();

    $response = $this->postJson(route('api.bookings.store'), $data);

    unset($data['created_at']);
    unset($data['updated_at']);

    $this->assertDatabaseHas('bookings', $data);

    $response->assertStatus(201)->assertJsonFragment($data);
});

test('it updates the booking', function () {
    $booking = Booking::factory()->create();

    $user = User::factory()->create();
    $service = Service::factory()->create();
    $deliveryDays = DeliveryDays::factory()->create();
    $subService = SubService::factory()->create();
    $subServiceTemplate = SubServiceTemplate::factory()->create();

    $data = [
        'booking_date' => fake()->word(),
        'total_price' => fake()->randomFloat(2, 0, 9999),
        'text' => fake()->text(),
        'note' => fake()->word(),
        'own_domain' => fake()->word(),
        'domain_url' => fake()->word(),
        'payment_method' => fake()->word(),
        'payment_status' => fake()->word(),
        'created_at' => fake()->dateTime(),
        'updated_at' => fake()->dateTime(),
        'user_id' => $user->id,
        'service_id' => $service->id,
        'delivery_id' => $deliveryDays->id,
        'package_id' => $subService->id,
        'template_id' => $subServiceTemplate->id,
    ];

    $response = $this->putJson(route('api.bookings.update', $booking), $data);

    unset($data['created_at']);
    unset($data['updated_at']);

    $data['id'] = $booking->id;

    $this->assertDatabaseHas('bookings', $data);

    $response->assertStatus(200)->assertJsonFragment($data);
});

test('it deletes the booking', function () {
    $booking = Booking::factory()->create();

    $response = $this->deleteJson(route('api.bookings.destroy', $booking));

    $this->assertModelMissing($booking);

    $response->assertNoContent();
});
