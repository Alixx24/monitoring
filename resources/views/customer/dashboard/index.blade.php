@extends('customer.layouts.master')
@section('title', 'Dashboard')

@section('content')
    <a class="btn btn-success ms-5" type="submit" data-bs-toggle="modal" data-bs-target="#createReqModal">create request</a>
    <a class="btn btn-warning ms-5" type="submit" data-bs-toggle="modal" data-bs-target="#createReqModal">+ unlimited</a>

    <section class="hero-section m-md-5 m-3">

        <div class="bg-light mb-3 p-2">
            <h5>
                Email: {{ $user->email }}
                <span class="float-end">Wallet: 0</span>
            </h5>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Url</th>
                        <th scope="col">Status</th>
                        <th scope="col">Analysis</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($fetchRequest as $item)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->duration_id }} Min</td>
                            <td>{{ $item->url }}</td>
                            <td>
                              
                                <input class="form-check-input status-toggle" type="checkbox" data-id="{{ $item->id }}"
                                    {{ $item->status == 1 ? 'checked' : '' }}>
                            </td>

                            <td class="d-flex align-items-center">
                                <a class="btn btn-warning"
                                    href="{{ route('dashboard.analysis.link.index', ['linkId' => auth()->user()->id, 'id' => $item->id]) }}">Click!</a>

                                <form method="POST"
                                    action="{{ route('dashboard.request.delete', ['linkId' => $item->id, 'id' => auth()->user()->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger ms-2">Delete</button>
                                </form>
                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
      $(document).ready(function() {
        $('.status-toggle').on('change', function() {
            var itemId = $(this).data('id');
            var status = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: '/user/dashboard/update-status/' + itemId,
                method: 'POST',
                data: {
                    status: status,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert('وضعیت با موفقیت بروزرسانی شد');
                },
                error: function () {
                    alert('خطا در بروزرسانی');
                }
            });
        });
    });
    </script>
    <x-create-request-modal />
@endsection
