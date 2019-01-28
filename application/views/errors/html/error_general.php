<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang=en>
  <meta charset=utf-8>
  <meta name=viewport content="initial-scale=1, minimum-scale=1, width=device-width">
  <title><?php echo $heading; ?></title>
  <style>
    *{margin:0;padding:0}html,
    code{font:15px/22px arial,sans-serif}html{background:#fff;color:#222;padding:15px}
    body{margin:7% auto 0;max-width:390px;min-height:180px;padding:30px 0 15px}
    p{margin:11px 0 22px;overflow:hidden}ins{color:#777;text-decoration:none}
    a img{border:0}
    b{background: #ed2939;color: #fff}
  </style>
  <h2><b>ERROR!</b> <ins><?php echo $heading; ?></ins></h2>
  <p><?php echo $message; ?><ins>That’s all we know.</ins></p>
</html>