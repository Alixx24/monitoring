@extends('customer.layouts.master')
@section('title', 'Dashboard')

@section('content')
    <a class="btn btn-success ms-5" type="submit" data-bs-toggle="modal" data-bs-target="#createReqModal">create request</a>

    <section class="hero-section m-5">



        <div class="bg-light mb-5">
            <h5 class=" p-1">Email: {{ $user->email }} <span class="float-end">Wallet: 0</span></h5>

        </div>

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Duaration</th>
                    <th scope="col">Url</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($fetchRequest as $item)
                    <tr>
                        <th scope="row">1</th>

                        <td>{{ $item->name }}</td>
                        <td>{{ $item->duration_id }}</td>
                        <td>{{ $item->url }}</td>
                        <td>{{ $item->status == 1 ? 'Active' : 'Deactive' }}</td>



                    </tr>
                @endforeach


            </tbody>
        </table>
    </section>

    <x-create-request-modal />
@endsection
