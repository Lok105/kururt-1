<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message error bg-danger text-white" onclick="this.classList.add('hidden');">
    <?= $message ?>
    <button type="button" class="close flash-close" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>    
</div>
