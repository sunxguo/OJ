<meta charset="utf-8">
<?php if (isset($error)) { ?>
<script>alert("<?=addslashes($error) ?>")</script>
<?php } ?>
<?php if (isset($url)) { ?>
<script>window.location.href="<?=$url ?>"</script>
<?php } else { ?>
<script>history.go(-1);</script>
<?php } ?>

