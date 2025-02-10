<?php

namespace App\Http\Controllers\Api;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use App\Traits\ResponseTrait;
use App\Http\Resources\BookingCollection;
use App\Http\Requests\BookingStoreRequest;
use App\Http\Requests\BookingUpdateRequest;
use App\Models\Service;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class BookingController extends Controller
{
    use ResponseTrait;

   public function index()
{
    try {
        $services = Service::with(['subServices.subServiceTemplates','subServices.deliveryDates'])->get();
        
        return $this->successResponse($services, count($services) ? 'Services fetched successfully.' : 'No services found.');
    } catch (\Exception $e) {
        return $this->errorResponse('Error fetching services.', 500, [$e->getMessage()]);
    }
}

    
    public function store(BookingStoreRequest $request)
    {
        try {
            $validated = $request->validated();
            $booking = Booking::create($validated);

            return $this->successResponse(new BookingResource($booking), 'Booking created successfully.', 201);
        } catch (ValidationException $e) {
            return $this->validationErrorResponse($e->errors());
        } catch (\Exception $e) {
            return $this->errorResponse('Error creating booking.', 500, [$e->getMessage()]);
        }
    }

    public function show(Request $request, Booking $booking)
    {
        try {
            return $this->successResponse(new BookingResource($booking), 'Booking fetched successfully.');
        } catch (ModelNotFoundException $e) {
            return $this->errorResponse('Booking not found.', 404, [$e->getMessage()]);
        } catch (\Exception $e) {
            return $this->errorResponse('Error fetching booking.', 500, [$e->getMessage()]);
        }
    }


    public function update(BookingUpdateRequest $request, Booking $booking)
    {
        try {
            $validated = $request->validated();
            $booking->update($validated);

            return $this->successResponse(new BookingResource($booking), 'Booking updated successfully.');
        } catch (ValidationException $e) {
            return $this->validationErrorResponse($e->errors());
        } catch (ModelNotFoundException $e) {
            return $this->errorResponse('Booking not found.', 404, [$e->getMessage()]);
        } catch (\Exception $e) {
            return $this->errorResponse('Error updating booking.', 500, [$e->getMessage()]);
        }
    }


    public function destroy(Request $request, Booking $booking)
    {
        try {
            $booking->delete();
    
            return $this->successResponse([], 'Booking deleted successfully.');
        } catch (ModelNotFoundException $e) {
            return $this->errorResponse('Booking not found.', 404, [$e->getMessage()]);
        } catch (\Exception $e) {
            return $this->errorResponse('Error deleting booking.', 500, [$e->getMessage()]);
        }
    }
    

    public function getSearchQuery(string $search)
    {
        return Booking::query()->where('text', 'like', "%{$search}%");
    }
}
