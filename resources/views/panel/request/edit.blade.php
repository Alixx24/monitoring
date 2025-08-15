@extends('panel.layouts.master')
@section('title', 'Dashboard')
@section('content')
    <a href="{{ route('panel.request.create') }}" class="btn btn-success">Create</a>
    <table class="table">
    <form class="col-9" action="{{ route('panel.request.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Url</label>
                <input type="text" name="url" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter Url...">
            </div>

            <div class="form-group mt-1">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter Name...">

            </div>

            <div class="form-group mt-1">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>


            <button type="submit" class="btn btn-success mt-4">Make it</button>
        </form>
    </table>
@endsection
