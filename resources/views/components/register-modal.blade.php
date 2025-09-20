<!-- resources/views/components/login-modal.blade.php -->

<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content mt-of-reg"">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Register</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('register.post') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation"
                            id="password_confirmation" required>
                    </div>

                    <button type="submit" class="btn btn-dark mt-2 text-end">Register</button>
                    <a href="{{ url('login/github') }}" class="text-decoration-none github-icon">
                        <i class="bi bi-github fs-1 float-end"></i>
                    </a>

                       <a href="{{ url('auth/google') }}" class="text-decoration-none gmail-icon">click
                        <i class="bi bi-gmail fs-1 float-end"></i>
                    </a>


                </form>
            </div>
        </div>
    </div>
</div>
