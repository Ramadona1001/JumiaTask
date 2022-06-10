@extends('backend.layouts.master')

@section('title',$title)

@section('stylesheet')

@endsection

@section('content')

@include('backend.components.errors')

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ $title }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('store_trips') }}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="from">From Station</label>
                            <select name="from" id="from" class="form-control " required>
                                <option value="">Select Station</option>
                                @foreach ($stations as $station)
                                    <option value="{{ $station->id }}">{{ $station->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <button type="button" class="btn btn-primary btn-block" id="add-cross-btn">Add Cross Between</button>
                        </div>
                    </div>

                    <hr>
                    <div id="cross-between" style="border: 1px solid;border-radius:8px;padding:10px;">
                    </div>
                    <hr>

                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <label for="to">To Station</label>
                            <select name="to" id="to" class="form-control to" required>
                                <option value="">Select Station</option>
                            </select>
                        </div>
                    </div>

                    <hr>
                    <button type="submit" class="btn btn-primary"><i class="icon-plus"></i>&nbsp;Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    var station_result = [];
    function getStations(s,to = null) {
            var stations_url = '{{ route("stations_trips") }}';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: stations_url,
                method: 'get',
                data: {
                    stations: s,
                },
                success: function(result){
                    station_result = [];
                    if (to == null) {
                        $('#to').empty();
                        $('#to').append('<option value="">Select Station</option>');
                        $.each(result, function(index, value) {
                            $('#to').append('<option value="' + value.id + '">' + value.title + '</option>');
                            // $('#to').change();
                        });
                    }else{
                        station_result = result;
                    }
                }
            });
        }
</script>

<script>
    var from_station = 0;
    var stations = [];
    var stations_url = '{{ route("stations_trips") }}';
    $('#from').on('change',function(){
        if ($(this).val() != '') {
            from_station = $(this).val();
            getStations(from_station,null);
        }else{
            from_station = 0;
            $('#to').empty();
        }
    });

    $('#to').on('change',function(){
        if ($(this).val() != '') {
            $('#cross-between').empty();
            to_station = $(this).val();
            if (from_station != 0) {
                $('#cross-between').empty();
                stations.push(from_station);
                stations.push(to_station);
                getStations(stations,1);
            }
        }else{
            to_station = 0;
            $('#cross-between').empty();
        }
    });


</script>

<script>
    var cross_count = 1;
    $("#add-cross-btn").click(function () {
        if($('#to').val() != ''){
            var cross_html = '';
            cross_html += '<div class="row mt-3" id="between-cross">';
                cross_html += '<div class="col-lg-12">';
                    cross_html += '<label for="cross_'+cross_count+'">Cross Station</label><button id="remove-cross-btn" type="button" class="btn btn-danger btn-sm" style="float:right;margin-bottom: 10px;">Remove</button>';
                    cross_html += '<select name="cross['+cross_count+']" class="form-control station_menu_'+this.value+'" required onChange="showSelected(this.value)">';
                        $.each(station_result, function(index, value) {
                            cross_html += '<option value="'+value.id+'">'+value.title+'</option>';
                        });
                cross_html += '</div>';
            cross_html += '</div>';
            $('#cross-between').append(cross_html);
            cross_count++;
        }else{
            alert('Choose To Station At the First');
        }
    });

    // remove row
    $(document).on('click', '#remove-cross-btn', function () {
        $(this).closest('#between-cross').remove();
    });

    var station_menu = [];
    function showSelected(params) {
        if (!station_menu.includes(params)) {
            station_menu.push(params);
        }else{
            alert('You have been choosed this cross before');
            $("#remove-cross-btn").trigger('click');
        }
    }

</script>


@endsection
