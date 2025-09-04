@extends('panel.layouts.master')
@section('title', 'Dashboard')
@section('content')
    <a href="{{ route('panel.duration.index') }}" class="btn btn-primary m-1">Back</a>
    <div class="d-flex justify-content-center align-items-center">

        <form class="col-9" action="{{ route('panel.duration.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Duration</label>
                <input type="number" name="duration" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter Url...">
            </div>






            <button type="submit" class="btn btn-success mt-4">Make it</button>
        </form>
    </div>
@endsection
