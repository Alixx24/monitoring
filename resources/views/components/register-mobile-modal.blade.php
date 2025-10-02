<div class="modal fade" id="loginMobileModal" tabindex="-1" aria-labelledby="loginMobileModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content mt-of-login">
      <div class="modal-header">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="login" aria-selected="true">
              <h3>Login</h3>
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="signup-tab" data-bs-toggle="tab" data-bs-target="#signup" type="button" role="tab" aria-controls="signup" aria-selected="false">
              <h3>Sign up</h3>
            </button>
          </li>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
          <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="mb-3">
              <label for="loginEmail" class="form-label">Email</label>
              <input type="email" class="form-control" id="loginEmail" name="email" required autofocus>
            </div>
            <div class="mb-3">
              <label for="loginPassword" class="form-label">Password</label>
              <input type="password" class="form-control" id="loginPassword" name="password" required>
            </div>
            <button type="submit" class="btn btn-dark mt-2">Login</button>
            <a href="{{ url('login/github') }}" class="text-decoration-none github-icon">
              <i class="bi bi-github fs-1 float-end"></i>
            </a>
            <a href="{{ url('auth/google') }}" class="text-decoration-none">
              <i class="bi bi-google fs-1 float-end text-danger me-3"></i>
            </a>
          </form>
        </div>

        <div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab">
          <form method="POST" action="{{ route('register.post') }}">
            @csrf
            <div class="mb-3">
              <label for="signupName" class="form-label">Name</label>
              <input type="text" class="form-control" id="signupName" name="name" required autofocus>
            </div>
            <div class="mb-3">
              <label for="signupEmail" class="form-label">Email</label>
              <input type="email" class="form-control" id="signupEmail" name="email" required>
            </div>
            <div class="mb-3">
              <label for="signupPassword" class="form-label">Password</label>
              <input type="password" class="form-control" id="signupPassword" name="password" required>
            </div>
            <div class="mb-3">
              <label for="signupPasswordConfirm" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="signupPasswordConfirm" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-dark mt-2 text-end">Register</button>
            <a href="{{ url('login/github') }}" class="text-decoration-none github-icon">
              <i class="bi bi-github fs-1 float-end"></i>
            </a>
            <a href="{{ url('auth/google') }}" class="text-decoration-none">
              <i class="bi bi-google fs-1 float-end text-danger me-3"></i>
            </a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
