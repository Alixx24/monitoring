<!-- resources/views/components/login-modal.blade.php -->

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content mt-of-login">
      <div class="modal-header" >
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('login.post') }}">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required autofocus>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <button type="submit" class="btn btn-dark mt-2">Login</button>
            <a href="{{ url('login/github') }}" class="text-decoration-none github-icon">
                        <i class="bi bi-github fs-1 float-end"></i>
                    </a>
                      <a href="{{ url('auth/google') }}" class="text-decoration-none">
                        <i class="bi bi-google fs-1 float-end text-danger me-3"></i>
                        </i>
                    </a>
        </form>
      </div>
    </div>
  </div>
</div>



