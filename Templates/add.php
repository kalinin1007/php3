<h2>Form</h2>

<?php if ($errors): ?>
  <?php foreach ($errors as $key => $val): ?>
    <h3>Error field <?= $key?></h3>
    <p><?= $val[0]?></p>
  <?php endforeach; ?>
<?php endif; ?>

<form action="<?= ROOT?>/post/add" method="post">
  Title:<br>
  <input type="text" name="title"><br>
  Text:<br>
  <input type="text" name="text"><br>
  Slug:<br>
  <input type="text" name="slug"><br>
  <input type="submit" value="Submit">
</form> 