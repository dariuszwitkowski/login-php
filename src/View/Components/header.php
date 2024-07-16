<div class="logo">
    <img src="/assets/img/logo.svg" alt="Logo">
</div>
<?php if (isset($_SESSION['message'])): ?>
    <div class="message <?php echo $_SESSION['message']['type']?>">
        <?php echo htmlspecialchars($_SESSION['message']['content']); ?>
        <?php unset($_SESSION['message']); ?>
    </div>
<?php endif; ?>