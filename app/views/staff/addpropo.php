<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="mb-3  d-flex align-items-center  " style="margin-top:150px;">
<div class="m-auto col-6">
<a href="<?php echo URLROOT; ?>/demandes/getproposition" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<form action="<?php echo URLROOT; ?>/demandes/addpropositions" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label>Titre de livre</label>
    <input type="text" name="titredelivre" class="form-control <?php echo (!empty($data['titre_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['titredelivre'] ?> ">
    <span class="invalid-feedback"><?php echo $data['titre_err']; ?></span>
  </div>
  <div class="form-group">
    <label>Resume</label>
    <input type="text" name="ecrivain" class="form-control <?php echo (!empty($data['ecrivain_err'])) ? 'is-invalid' : ''; ?>" value="<?=  $data['ecrivain'] ?> ">
    <span class="invalid-feedback"><?php echo $data['ecrivain_err']; ?></span>
  </div>
  <input type="submit" class="btn btn-primary   w-100">
</form>
</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>