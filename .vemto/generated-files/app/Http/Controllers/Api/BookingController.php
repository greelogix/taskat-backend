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
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class BookingController extends Controller
{
    public function index(Request $request): BookingCollection
    {
        try {
            $search = $request->get('search', '');

            $bookings = $this->getSearchQuery($search)
                ->latest()
                ->paginate();

            return new BookingCollection($bookings);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error fetching bookings.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function store(BookingStoreRequest $request): BookingResource
    {
        try {
            $validated = $request->validated();

            $booking = Booking::create($validated);

            return new BookingResource($booking);

        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed.',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating booking.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show(Request $request, Booking $booking): BookingResource
    {
        try {
            return new BookingResource($booking);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Booking not found.',
                'error' => $e->getMessage(),
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error fetching booking.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(
        BookingUpdateRequest $request,
        Booking $booking
    ): BookingResource
    {
        try {
            $validated = $request->validated();

            $booking->update($validated);

            return new BookingResource($booking);

        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed.',
                'errors' => $e->errors(),
            ], 422);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Booking not found.',
                'error' => $e->getMessage(),
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error updating booking.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy(Request $request, Booking $booking): Response
    {
        try {
            $booking->delete();

            return response()->json([
                'message' => 'Booking deleted successfully.'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Booking not found.',
                'error' => $e->getMessage(),
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error deleting booking.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function getSearchQuery(string $search)
    {
        return Booking::query()->where('text', 'like', "%{$search}%");
    }
}
