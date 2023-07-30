<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message success bg-success text-white" onclick="this.classList.add('hidden')">
    <?= $message ?>
    <button type="button" class="close flash-close" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>    
</div>
