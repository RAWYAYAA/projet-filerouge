<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>
<div class="d-flex flex-wrap" style="gap: 30px;">
  <?php foreach ($data['livres'] as $livre) : ?>
    <div class="card" style="width: 18rem;">
      
      <img src="data:image/*;charset=utf8;base64,<?php echo base64_encode($livre->image); ?>" class="card-img-top"  alt="..." >
      <div class="card-body">
        <h5 class="card-title"><?php echo $livre->titre ?></h5>
        <p class="card-text"><?php echo $livre->type ?></p>
        <p class="card-text"><?php echo $livre->ecrivain ?></p>
        <form action="<?php echo URLROOT; ?>/Demandes/addDemande" method="POST">
          <input name="idLivre" type="hidden" value="<?php echo $livre->id ?>">
          <input name="addDemande" type="submit" class="btn btn-primary ml-5 " value="Demander">
        </form>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>