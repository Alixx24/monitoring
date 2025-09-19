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
        </tr>
      </thead>

      <tbody>
        @foreach ($fetchRequest as $item)
          <tr>
            <th scope="row">1</th>
            <td>{{ $item->name }}</td>
            <td>{{ $item->duration_id }} Min</td>
            <td>{{ $item->url }}</td>
            <td>{{ $item->status == 1 ? 'Active' : 'Deactive' }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</section>


    <x-create-request-modal />
@endsection
