<?php if (flash_message()): ?>
    <ul class="flex flex-col items-center">
        <?php foreach (get_messages() as $message): ?>
            <li class="flex text-[20px] text-[red]"><?= $message ?></li>
        <?php endforeach; ?>
    </ul>
    <?php unset($_SESSION["message"]); ?>
<?php endif; ?>