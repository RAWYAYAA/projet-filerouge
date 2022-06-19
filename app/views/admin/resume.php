<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>
<div class="d-flex flex-wrap" style="gap: 30px;">
  <?php foreach ($data['resume'] as $resume) : ?>
    <div class="card" style="width: 18rem;">
      <div class="card-body">
          <p class="card-text text-dark"> Titre :  <?php echo $resume->titrelivre ?></p>
        <p class="card-text text-dark"> résumé :  <?php echo $resume->resume ?></p>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>