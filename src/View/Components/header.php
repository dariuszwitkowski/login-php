<?php
use App\Helpers\FlashMessage;

$message = FlashMessage::get();
?>

<div class="logo">
    <img src="/assets/img/logo.svg" alt="Logo">
</div>
<?php if (isset($message)): ?>
    <div class="message <?php echo $message['type']?>">
        <?php echo htmlspecialchars($message['content']); ?>
    </div>
<?php endif; ?>