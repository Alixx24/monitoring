@extends('panel.layouts.master')
@section('title', 'Dashboard')
@section('content')
    <a href="{{ route('panel.duration.create') }}" class="btn btn-success">Create</a>
    <table class="table">

        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
            
                <th scope="col">created_at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fatchUsers as $request)
                <tr>
                    <th scope="row">{{ $request->id }}</th>
                    <td>{{ $request->name }}</td>
                    <td>{{ $request->email }}</td>
            

  
                    
                    <td>{{ $request->created_at }}</td>

                    <td>
                       

                        <form action="{{ route('panel.duration.delete', $request->id) }}" method="post"
                            style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger ">Delete</button>
                        </form>

                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
