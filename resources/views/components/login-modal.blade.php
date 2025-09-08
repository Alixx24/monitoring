<!-- resources/views/components/login-modal.blade.php -->

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label">ایمیل</label>
            <input type="email" class="form-control" id="email" name="email" required autofocus>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">رمز عبور</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <button type="submit" class="btn btn-primary">ورود</button>
        </form>
      </div>
    </div>
  </div>
</div>



