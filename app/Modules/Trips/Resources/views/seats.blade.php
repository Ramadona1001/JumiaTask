@extends('backend.layouts.master')

@section('title',$title)

@section('stylesheet')
<style>
    .checkbox-group {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  width: 90%;
  margin-left: auto;
  margin-right: auto;
  max-width: 600px;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}
.checkbox-group > * {
  margin: 0.5rem 0.5rem;
}

.checkbox-group-legend {
  font-size: 1.5rem;
  font-weight: 700;
  color: #9c9c9c;
  text-align: center;
  line-height: 1.125;
  margin-bottom: 1.25rem;
}

.checkbox-input {
  clip: rect(0 0 0 0);
  -webkit-clip-path: inset(100%);
          clip-path: inset(100%);
  height: 1px;
  overflow: hidden;
  position: absolute;
  white-space: nowrap;
  width: 1px;
}
.checkbox-input:checked + .checkbox-tile {
  border-color: #2260ff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  color: #2260ff;
}
.checkbox-input:checked + .checkbox-tile:before {
  transform: scale(1);
  opacity: 1;
  background-color: #2260ff;
  border-color: #2260ff;
}
.checkbox-input:checked + .checkbox-tile .checkbox-icon, .checkbox-input:checked + .checkbox-tile .checkbox-label {
  color: #2260ff;
}
.checkbox-input:focus + .checkbox-tile {
  border-color: #2260ff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1), 0 0 0 4px #b5c9fc;
}
.checkbox-input:focus + .checkbox-tile:before {
  transform: scale(1);
  opacity: 1;
}

.checkbox-tile {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 7rem;
  min-height: 7rem;
  border-radius: 0.5rem;
  border: 2px solid #b5bfd9;
  background-color: #fff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  transition: 0.15s ease;
  cursor: pointer;
  position: relative;
}
.checkbox-tile:before {
  content: "";
  position: absolute;
  display: block;
  width: 1.25rem;
  height: 1.25rem;
  border: 2px solid #b5bfd9;
  background-color: #fff;
  border-radius: 50%;
  top: 0.25rem;
  left: 0.25rem;
  opacity: 0;
  transform: scale(0);
  transition: 0.25s ease;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='192' height='192' fill='%23FFFFFF' viewBox='0 0 256 256'%3E%3Crect width='256' height='256' fill='none'%3E%3C/rect%3E%3Cpolyline points='216 72.005 104 184 48 128.005' fill='none' stroke='%23FFFFFF' stroke-linecap='round' stroke-linejoin='round' stroke-width='32'%3E%3C/polyline%3E%3C/svg%3E");
  background-size: 12px;
  background-repeat: no-repeat;
  background-position: 50% 50%;
}
.checkbox-tile:hover {
  border-color: #2260ff;
}
.checkbox-tile:hover:before {
  transform: scale(1);
  opacity: 1;
}

.checkbox-icon {
  transition: 0.375s ease;
  color: #494949;
}
.checkbox-icon svg {
  width: 3rem;
  height: 3rem;
}

.checkbox-label {
  color: #707070;
  transition: 0.375s ease;
  text-align: center;
}
</style>
@endsection

@section('content')

@include('backend.components.errors')

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card card-primary">
            <div class="card-body">
                <form action="" id="seat-form">
                    @csrf
                    <div class="row">
                        @foreach ($seatsByStation as $seat_station)
                            <div class="col-lg-12">
                                <h4 style="text-align: center;margin-bottom:20px;text-align:center">{{ $seat_station->fromStation->title.' <=> '.$seat_station->toStation->title }}</h4>
                            </div>
                            @foreach ($seats as $index => $seat)
                                @if ($seat->from == $seat_station->from && $seat->to == $seat_station->to)
                                    <div class="col-lg-2">
                                        <input type="hidden" name="from" value="{{ $seat_station->from }}">
                                        <input type="hidden" name="to" value="{{ $seat_station->to }}">
                                        <input type="hidden" name="to" value="{{ $trips->id }}">
                                        <div class="checkbox">
                                            <label class="checkbox-wrapper">
                                                <input type="checkbox" class="checkbox-input"/>
                                                <span class="checkbox-tile">
                                                    <span class="checkbox-icon">
                                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 496.967 496.967" style="enable-background:new 0 0 496.967 496.967;" xml:space="preserve"> <g> <path style="fill:#9BAAA8;" d="M64.484,274.4c0,3.2-1.6,5.6-4,5.6l0,0c-2.4,0-4-2.4-4-5.6v-60.8c0-3.2,1.6-5.6,4-5.6l0,0 c2.4,0,4,2.4,4,5.6V274.4z"/> <path style="fill:#9BAAA8;" d="M440.484,276c0,3.2-0.8,5.6-4,5.6l0,0c-3.2,0-4-2.4-4-5.6v-60c0-3.2,0.8-5.6,4-5.6l0,0 c3.2,0,4,2.4,4,5.6V276z"/> <path style="fill:#9BAAA8;" d="M152.484,280c0,8.8-7.2,16-16,16l0,0c-8.8,0-16-7.2-16-16V136c0-8.8,7.2-16,16-16l0,0 c8.8,0,16,7.2,16,16V280z"/> </g> <path style="fill:#889996;" d="M132.484,122.4c-8.8,0-12,7.2-12,16V168c0,0.8,1.6,0,4,0h28v-29.6 C152.484,129.6,141.284,122.4,132.484,122.4z"/> <path style="fill:#9BAAA8;" d="M376.484,280c0,8.8-7.2,16-16,16l0,0c-8.8,0-16-7.2-16-16V136c0-8.8,7.2-16,16-16l0,0 c8.8,0,16,7.2,16,16V280z"/> <path style="fill:#889996;" d="M360.484,122.4c-8.8,0-16,7.2-16,16V168h28c2.4,0,4,0.8,4,0v-30.4 C376.484,129.6,369.284,122.4,360.484,122.4z"/> <path style="fill:#9BAAA8;" d="M374.084,467.2l-98.4-64l98.4-72c7.2-4.8,8.8-15.2,3.2-22.4c-4.8-7.2-15.2-8.8-22.4-3.2l-106.4,78.4 l-106.4-77.6c-7.2-4.8-16.8-3.2-22.4,3.2c-4.8,7.2-3.2,16.8,3.2,22.4l98.4,72l-98.4,64c-7.2,4.8-8.8,15.2-3.2,22.4 c4.8,7.2,15.2,8.8,22.4,3.2l106.4-70.4l106.4,69.6c7.2,4.8,16.8,3.2,22.4-3.2C382.084,482.4,380.484,472,374.084,467.2z"/> <g> <path style="fill:#889996;" d="M119.684,309.6c-4.8,7.2-3.2,16.8,3.2,22.4l38.4,28h53.6l-73.6-53.6 C134.884,300.8,124.484,302.4,119.684,309.6z"/> <path style="fill:#889996;" d="M354.884,306.4l-73.6,53.6h53.6l38.4-28c7.2-4.8,8.8-15.2,3.2-22.4 C372.484,302.4,362.084,300.8,354.884,306.4z"/> </g> <path style="fill:#F7B208;" d="M440.484,321.6c0,12-10.4,22.4-22.4,22.4h-339.2c-12,0-22.4-10.4-22.4-22.4v-43.2 c0-12,10.4-22.4,22.4-22.4h339.2c12,0,22.4,10.4,22.4,22.4V321.6z"/> <path style="fill:#F97803;" d="M440.484,280v37.6c0,12-8.8,18.4-20.8,18.4h-342.4c-12,0-20.8-6.4-20.8-18.4V280"/> <path style="fill:#F7B208;" d="M392.484,124.8c0,10.4-8.8,19.2-19.2,19.2h-249.6c-10.4,0-19.2-8.8-19.2-19.2V19.2 c0-10.4,8.8-19.2,19.2-19.2h249.6c10.4,0,19.2,8.8,19.2,19.2V124.8z"/> <path style="fill:#F97803;" d="M392.484,16v108c0,10.4-9.6,20-20,20h-248c-10.4,0-20-9.6-20-20V16"/> <g> <path style="fill:#333B3D;" d="M88.484,208c0,9.6-8,16-17.6,16h-20.8c-9.6,0-17.6-6.4-17.6-16l0,0c0-9.6,8-16,17.6-16h20 C80.484,192,88.484,198.4,88.484,208L88.484,208z"/> <path style="fill:#333B3D;" d="M464.484,208c0,8.8-8,16-17.6,16h-20c-10.4,0-18.4-7.2-18.4-16l0,0c0-8.8,8-16,17.6-16h20 C456.484,192,464.484,199.2,464.484,208L464.484,208z"/> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
                                                    </span>
                                                    <span class="checkbox-label">Seat No.{{ ($index+1) }}</span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                    <button type="submit" id="book-seat" class="btn btn-primary">Book</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    $(document).ready(function(){
        $('#book-seat').on('click',function(e){
            e.preventDefault();
            var count = $("[type='checkbox']:checked").length;
            if (count > 0) {
                $('#seat-form').submit();
                return true;
            }else{
                alert('You should book a seat');
                return false;
            }
        });
    });
</script>
@endsection
