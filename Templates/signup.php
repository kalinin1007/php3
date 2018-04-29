<h2>Form signup</h2>

<?php if ($errors): ?>
  <?php foreach ($errors as $key => $val): ?>
    <h3>Error field <?= $key?></h3>
    <p><?= $val[0]?></p>
  <?php endforeach; ?>
<?php endif; ?>

<form action="<?= ROOT?>/auth/signup" method="post">
  Login:<br>
  <input type="text" name="login"><br>
  Password:<br>
  <input type="text" name="password"><br>
  <input type="submit" value="Submit">
</form> 