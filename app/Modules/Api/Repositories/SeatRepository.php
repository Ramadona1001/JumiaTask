<?php


namespace Api\Repositories;

use Trips\Models\Trips;
use File;
use Stations\Models\Stations;
use Trips\Models\Seats;
use DB;
use Trips\Models\Booking;

class SeatRepository implements SeatRepositoryInterface
{
    public function bookSeat($request)
    {
        $check = seatBooked($request->seats);
        if ($check) {
            return response()->json(['data'=>'Seat is booked'],404);
        }else{
            $book = new Booking();
            $book->user = auth()->user('api')->id;
            $book->seat = $request->seats;
            $book->save();
            return response()->json(['data'=>'Success'],200);
        }
    }

    public function listAvailableSeat($request)
    {
        $check_start = Stations::where('id',$request->start)->first();
        $check_end = Stations::where('id',$request->end)->first();
        $avaible_seats = [];
        if ($check_start && $check_end) {
            $trip = Trips::where('from',$request->start)->where('to',$request->end)->first();
            if ($trip) {
                $seats = Seats::where('trip',$trip->id)->orwhere('from',$trip->from)->orwhere('to',$trip->to)->pluck('id')->toArray();
                if (count($seats) > 0) {
                    foreach ($seats as $seat) {
                        $check = seatBooked($seat);
                        if (!$check) {
                            $avaible_seats[] = $seat;
                        }
                    }
                    return response()->json(['avaible_seats'=>$avaible_seats],200);
                }else{
                    return response()->json(['data'=>'No Seats'],404);
                }
            }else{
                return response()->json(['data'=>'Trip is Not Available'],404);
            }
        }else{
            return response()->json(['data'=>'Start Or End is Not Available'],404);
        }

    }
}
