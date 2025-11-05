<!-- resources/views/components/login-modal.blade.php -->

<div class="modal fade" id="createReqModal" tabindex="-1" aria-labelledby="createReqModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content mt-of-reg">
      <div class="modal-header">
        <h5 class="modal-title" id="createReqModalLabel">Request</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('dashboard.request.store') }}">
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

         


            <select name="duration_id" class="form-select mt-2" id="" name="duration_id">
                <option selected disabled>choose</option>
                @foreach ($fetchDuration as $duration)
                    <option value="{{ $duration->id }}">{{ $duration->duration_id }} Min</option>
                @endforeach
            </select>




            <button type="submit" class="btn btn-success mt-4">Make it</button>
        </form>
      </div>
    </div>
  </div>
</div>



