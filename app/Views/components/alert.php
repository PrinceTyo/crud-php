<?php if (!empty($_SESSION['success'])): ?>

    <input type="checkbox" id="close-alert" hidden>

    <div class="alert-success">

        <i class="fa-solid fa-circle-info"></i>

        <span class="alert-text">
            <?= $_SESSION['success'] ?>
        </span>

        <label for="close-alert" class="alert-close">
            <i class="fa-solid fa-x"></i>
        </label>

    </div>

    <?php unset($_SESSION['success']); ?>
<?php endif; ?>