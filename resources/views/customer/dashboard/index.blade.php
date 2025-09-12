@extends('customer.layouts.master')
@section('title', 'Dashboard')

@section('content')

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

            <tbody >
                @foreach ($user as $item)
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                          <td>@mdo</td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </section>
@endsection
