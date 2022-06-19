<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>
<div class="d-flex flex-wrap" style="gap: 30px;">
  <?php foreach ($data['proposition'] as $proposition) : ?>
    <div class="card" style="width: 18rem;">
      
     
      <div class="card-body">
        <p class="card-text text-dark">  écrivain:  <?php echo $proposition->ecrivain ?></p>
        <p class="card-text text-dark"> Titre :  <?php echo $proposition->titredelivre ?></p>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>