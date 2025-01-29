<?php

namespace App\Http\Controllers\Api;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use App\Http\Resources\BookingCollection;
use App\Http\Requests\BookingStoreRequest;
use App\Http\Requests\BookingUpdateRequest;

class BookingController extends Controller
{
    public function index(Request $request): BookingCollection
    {
        $search = $request->get('search', '');

        $bookings = $this->getSearchQuery($search)
            ->latest()
            ->paginate();

        return new BookingCollection($bookings);
    }

    public function store(BookingStoreRequest $request): BookingResource
    {
        $validated = $request->validated();

        $booking = Booking::create($validated);

        return new BookingResource($booking);
    }

    public function show(Request $request, Booking $booking): BookingResource
    {
        return new BookingResource($booking);
    }

    public function update(
        BookingUpdateRequest $request,
        Booking $booking
    ): BookingResource {
        $validated = $request->validated();

        $booking->update($validated);

        return new BookingResource($booking);
    }

    public function destroy(Request $request, Booking $booking): Response
    {
        $booking->delete();

        return response()->noContent();
    }

    public function getSearchQuery(string $search)
    {
        return Booking::query()->where('text', 'like', "%{$search}%");
    }
}
