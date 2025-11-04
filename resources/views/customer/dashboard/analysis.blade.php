@extends('customer.layouts.master')
@section('title', 'Dashboard')

@section('content')



    <a class="ms-5 btn btn-light text-dark ms-5" href="{{ route('dashboard.index', auth()->id()) }}"><i class="bi bi-arrow-left"></i></a>

    <a class="btn btn-light text-dark ms-3" type="submit" data-bs-toggle="modal" data-bs-target="#createReqModal">create
        request</a>
    @php
        $payment = \App\Models\Payment::where('user_id', auth()->id())
            ->where('status', 'paid')
            ->first();
    @endphp

    <a class="btn {{ $payment ? 'btn-primary' : 'btn-warning' }} ms-3" type="submit"
        href="{{ $payment ? '#' : route('payment.pay') }}">
        {{ $payment ? 'Upgraded' : '+unlimited(90,000 IRT)' }}
    </a>


       <section class="hero-section m-md-5 m-3">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

 

            <div class="bg-light mb-3 p-2">
                <h5>
                   {{ $fetchUrls['name'] }} |
                    last visited: {{ $fetchUrls['last_visited'] }}

                </h5>
            </div>

            <div class="table-responsive rounded-4">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">url</th>
                            <th scope="col">to email</th>
                            <th scope="col">description</th>
                            <th scope="col" style="white-space: nowrap;">status code</th>
                            <th scope="col">at</th>


                            <th scope="col">status</th>


                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($fetchRequestStatus as $item)
                            <tr class="p-2">

                                <td>{{ $item->id }} - {{ $item->request->url }}</td>
                                <td>{{ $item->to_email }} Min</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->status_code }}</td>

                                <td>{{ $item->created_at }}</td>

                                <td>{{ $item->status == 1 ? 'Active' : 'Deactive' }}</td>


                                {{-- <td>
                                <a class="btn btn-warning"
                                    href="{{ route('dashboard.analysis.link.index', ['linkId' => auth()->user()->id, 'id' => $item->id]) }}">Click!</a>
                            </td> --}}

                            </tr>
                        @endforeach
                        {{ $fetchRequestStatus->links() }}

                    </tbody>
                </table>
                {{ $fetchRequestStatus->links() }}
            </div>

        </section>


        <x-create-request-modal />
    @endsection
