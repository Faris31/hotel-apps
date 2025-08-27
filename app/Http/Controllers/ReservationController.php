<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservations;
use App\Models\Rooms;
use App\Models\Categories;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Reservations::orderBy('id', 'desc')->get();
        $title = "Data Reservation";
        return view('reservation.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::get();
        $title = 'Tambah Reservasi';
        return view('reservation.create', compact('categories', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $reservation_number = "RSV-270893-001";
        try {
            // $data = $request->validate([
            //     'reservation_number' => 'required',
            //     'guest_name' => 'required',
            //     'guest_email' => 'required|email',
            //     'guest_phone' => 'required',
            //     'guest_note' => 'nullable|string',
            //     'guest_room_number' => 'nullable|string',
            //     'guest_checkin' => 'required|date',
            //     'guest_checkout' => 'required|date|after:guest_checkin',
            //     'payment_method' => 'required',
            //     'room_id' => 'required',
            // ]);

            $data = [
                'reservation_number' => $request->reservation_number,
                'guest_name' => $request->guest_name,
                'guest_email' => $request->guest_email,
                'guest_phone' => $request->guest_phone,
                'guest_note' => $request->guest_note,
                'guest_room_number' => $request->guest_room_number,
                'guest_checkin' => $request->guest_check_in,
                'guest_checkout' => $request->guest_check_out,
                'payment_method' => $request->payment_method,
                'room_id' => $request->room_id,
                'subtotal' => $request->subtotal,
                'totalAmount' => $request->totalAmount,
            ];
            $create = Reservations::create($data);
            return response()->json(['status', 'message' => 'Reservation create success', 'data' => $create], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(
                [
                    'status' => 'Errorr',
                    'message' => 'Validation error',
                    'error' => $e->errors()
                ],
                422
            );
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getRoomByCategory($id_category)
    {
        try {
            $rooms = Rooms::where('category_id', $id_category)->get();
            return response()->json(['data' => $rooms, 'message' => 'Fetch Success']);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erooorrrrr', 'error' => $th->getMessage()]);
            //throw $th;
        }
    }
}
