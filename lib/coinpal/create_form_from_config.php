<?php

  if ( session_status() != PHP_SESSION_ACTIVE ) { session_start(); }
  require_once('config.php');

function generateInputHtml($key, $value) {
    return '<div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">' . $key . '</div>
                    </div>
                    <input type="text" id="' . $key . '" name="' . $key . '" class="form-control" value="' . $value . '">
                </div>
            </div>';
}

$html = '';
foreach ($config as $key => $value) {
    $html .= generateInputHtml($key, $value);
}

echo $html;
?>
