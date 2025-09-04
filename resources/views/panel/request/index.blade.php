@extends('panel.layouts.master')
@section('title', 'Dashboard')
@section('content')
    <a href="{{ route('panel.request.create') }}" class="btn btn-success">Create</a>
    <table class="table">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">url</th>
                <th scope="col">email</th>
                <th scope="col">name</th>
                  <th scope="col">duration</th>
                <th scope="col">created_at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fatchRequest as $request)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $request->url }}</td>
                    <td>{{ $request->email }}</td>
                    <td>{{ $request->name }}</td>

<td>{{ $request->duration->duration ?? 'ندارد' }}</td>

                    
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
