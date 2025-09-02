@extends('panel.layouts.master')
@section('title', 'Dashboard')
@section('content')
    <a href="{{ route('panel.duration.create') }}" class="btn btn-success">Create</a>
    <table class="table">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">duration</th>
                <th scope="col">user_id</th>
            
                <th scope="col">created_at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fatchDuration as $request)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $request->duration }}</td>
                    <td>{{ $request->user_id }}</td>
            

  
                    
                    <td>{{ $request->created_at }}</td>

                    <td>
                        <a href="{{ route('panel.request.edit', $request->id) }}" class="btn btn-warning ">Edit</a>

                        <form action="{{ route('panel.request.delete', $request->id) }}" method="post"
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
