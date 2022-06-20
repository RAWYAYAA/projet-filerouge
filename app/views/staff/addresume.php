<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="mb-3  d-flex align-items-center  " style="margin-top:150px;">
<div class="m-auto col-6">
<a href="<?php echo URLROOT; ?>/demandes/resumeaffichage" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<form action="<?php echo URLROOT; ?>/demandes/addresumes" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label>Titre de livre</label>
    <input type="text" name="titrelivre" class="form-control <?php echo (!empty($data['titrelivre_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['titrelivre'] ?> ">
    <span class="invalid-feedback"><?php echo $data['titrelivre_err']; ?></span>
  </div>
  <div class="form-group">
    <label>Resume</label>
    <input type="text" name="resume" class="form-control <?php echo (!empty($data['resume_err'])) ? 'is-invalid' : ''; ?>" value="<?=  $data['resume'] ?> ">
    <span class="invalid-feedback"><?php echo $data['resume_err']; ?></span>
  </div>
  <input type="submit" class="btn btn-primary   w-100">
</form>
</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>