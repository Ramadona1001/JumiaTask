@extends('backend.layouts.master')

@section('title',$title)

@section('stylesheet')

@include('backend.components.datatablecss')

@endsection

@section('content')

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ $title }}</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                        <table id="example" class="display table table-hover js-basic-example dataTable table-custom spacing5" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Trip Details</th>
                                <th>Seats</th>
                            </tr>
                        </thead>

                        <tbody id="permissionTable">

                            @foreach ($trips as $index => $trip)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    @foreach (generateTrip($trip) as $item)
                                        {{ $item }}
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('seats_trips',$trip->id) }}" class="btn btn-primary">Seats</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Trip Details</th>
                                <th>Seats</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')

@include('backend.components.datatablejs')

<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );


</script>
@endsection
