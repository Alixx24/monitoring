<!-- resources/views/components/approve-pay.blade.php -->

<div class="modal fade" id="payModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content mt-of-login">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Premium</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p>
                    Go <strong>Premium for one month</strong> and enjoy unlimited access to all features!
                    Just <strong>90,000 Toman</strong>.
                </p>

                @auth
                    <a href="{{ route('payment.pay') }}" class="btn btn-success mt-2">
                        <i class="bi bi-bag"></i> Upgrade Now
                    </a>
                @endauth

                @guest


                    <a href="{{ route('payment.pay') }}" class="btn btn-success mt-2" id="upgradeBtn">
                        <i class="bi bi-bag"></i> Upgrade Now
                    </a>
                @endguest
                <script>
                    const isLoggedIn = @json(auth()->check());

                    document.getElementById('upgradeBtn').addEventListener('click', function(e) {
                        if (!isLoggedIn) {
                            e.preventDefault();
                        alert('Please log in to your account first.');
                        }
                    });
                </script>

            </div>

        </div>
    </div>
</div>
