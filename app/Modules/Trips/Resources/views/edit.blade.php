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
                <form action="{{ route('update_stations',Crypt::encrypt($stations->id)) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="title">Title</label>
                            <input type="text" value="{{ $stations->title }}" name="title" id="title" class="form-control" required>
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
@endsection
