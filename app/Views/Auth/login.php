<?php ob_start(); ?>

<section class="login-wrapper">

    <form method="POST" action="/login" class="login-card">

        <h2>Login</h2>

        <?php if (!empty($_SESSION['error'])): ?>
            <div class="alert-error">
                <?= $_SESSION['error']; ?>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <div class="form-group">
            <label>Username</label>
            <input
                type="text"
                name="username"
                required
                placeholder="Masukkan username">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input
                type="password"
                name="password"
                required
                placeholder="Masukkan password">
        </div>

        <button type="submit" class="btn-login">
            Login
        </button>

    </form>

</section>

<?php
$content = ob_get_clean();
$title = "Login";
require __DIR__ . '/../layouts/app.php';
