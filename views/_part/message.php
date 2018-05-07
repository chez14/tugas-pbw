<?php
    $message_namespace = isset($message_namespace)?$message_namespace:"public";
    $messages = \Helper\Msg::get_all($message_namespace);

    foreach($messages as $message):
?>
<div class="notification <?= $message['type'] ?>">
    <button class="delete"></button>
    <?= $message["message"] ?>
</div>
<?php endforeach; ?>