<?php
//ルート判定
$rootdir = 'html';
$dirname = dirname($_SERVER['SCRIPT_FILENAME']);
$dirname = explode('/',$dirname);
$length = count($dirname);
$is_root = ($dirname[$length - 1] == $rootdir)?'':'../';
?>

<meta charset="utf-8">
<link rel="stylesheet" href="<?php echo $is_root; ?>assets/css/foundation/foundation.css">
<link rel="stylesheet" href="<?php echo $is_root; ?>assets/css/layout/layout.css">
<link rel="stylesheet" href="<?php echo $is_root; ?>assets/css/object/object.css">
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>

