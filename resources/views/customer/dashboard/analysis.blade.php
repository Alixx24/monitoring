@extends('customer.layouts.master')
@section('title', 'Dashboard')

@section('content')



    <a class="ms-5 btn btn-light text-dark ms-5" href="{{ route('dashboard.index', auth()->id()) }}"><i
            class="bi bi-arrow-left"></i></a>

    <a class="btn btn-light text-dark ms-3" type="submit" data-bs-toggle="modal" data-bs-target="#createReqModal">create
        request</a>
    @php
        $payment = \App\Models\Payment::where('user_id', auth()->id())
            ->where('status', 'paid')
            ->first();
    @endphp

    @if ($payment)
        <a class="btn btn-small-text btn-primary" type="submit" href="#">
            Upgraded
        </a>
    @else
        <a class="btn btn-small-text btn-warning" type="submit" data-bs-toggle="modal" data-bs-target="#payModal">
            {{ $payment ? 'Upgraded' : '+unlimited' }}
        </a>
    @endif



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
                {{-- last visited: {{ $fetchUrls['last_visited'] }} --}}

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

             <td>
    <span class="local-time" data-utc="{{ $item->created_at }}"></span>
</td>



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

<script>
document.querySelectorAll('.local-time').forEach(el => {
    const utcTime = el.dataset.utc;
    const date = new Date(utcTime + 'Z'); 

    const hours = date.getHours().toString().padStart(2, '0');
    const minutes = date.getMinutes().toString().padStart(2, '0');
    el.textContent = `${hours}:${minutes}`;
});
</script>

    <x-create-request-modal />
    <x-approve-pay />
@endsection
