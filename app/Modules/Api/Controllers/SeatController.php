<?php

namespace Api\Controllers;

use App\Http\Controllers\Controller;
use Api\Repositories\SeatRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SeatController extends Controller
{
    public $path;
    private $seatRepository;

    public function __construct(SeatRepository $seatRepository)
    {
        $this->middleware('auth:api');

        $this->seatRepository = $seatRepository;
    }

    /**
     * It takes a request, validates it, and then passes it to the seatRepository
     *
     * @param Request request The request object.
     *
     * @return The data is being returned as a JSON object.
     */
    public function bookSeat(Request $request)
    {
        $request->validate([
            'seats' => 'required'
        ]);

        $data = $this->seatRepository->bookSeat($request);
        return $data;
    }

    /**
     * It will return a list of available seats for a given date range
     *
     * @param Request request start, end
     *
     * @return A list of available seats
     */
    public function listAvailableSeat(Request $request)
    {
        $request->validate([
            'start' => 'required',
            'end' => 'required'
        ]);

        $seats = $this->seatRepository->listAvailableSeat($request);
        return $seats;
    }
}
