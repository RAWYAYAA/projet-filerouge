<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="m-auto col-6">
  
<a href="<?php echo URLROOT; ?>/livres/" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<form action="<?php echo URLROOT; ?>/livres/<?= $data['action'] == 'add' ? 'add' : 'edit/' . $data['body']['id'] ?>" method="POST" enctype="multipart/form-data">
<div class="col-8 text-center">
    <label for="img" class="form-label-sm form-label">Selectionne une image</label>
    <input class="form-control form-control-sm img_input <?= (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>"
      multiple  id="img" name="img" type="file">
    <span class="invalid-feedback"><?= $data['image_err']; ?></span>
</div>
  <div class="form-group">
    <label for="type">Type</label>
    <input type="text" name="type" class="form-control <?php echo (!empty($data['type_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['action'] == 'add' ? '' : $data['type'] ?> ">
    <span class="invalid-feedback"><?php echo $data['type_err']; ?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Titre</label>
    <input type="text" name="titre" class="form-control <?php echo (!empty($data['titre_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['action'] == 'add' ? '' : $data['titre'] ?> ">
    <span class="invalid-feedback"><?php echo $data['titre_err']; ?></span>
  </div>
  <div class="form-group">
    <label class="text" for="exampleCheck1">écrivain</label>
    <input type="text" name="ecrivain" class="form-control <?php echo (!empty($data['ecrivain_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['action'] == 'add' ? '' : $data['ecrivain'] ?> ">
    <span class="invalid-feedback"><?php echo $data['ecrivain_err']; ?></span>

  </div>
  <input type="submit" class="btn btn-primary">
</form>

</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>