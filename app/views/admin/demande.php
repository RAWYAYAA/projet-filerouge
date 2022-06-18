<?php require APPROOT . '/views/inc/header.php'; ?> 
<?php require APPROOT . '/views/inc/sidebar.php'; ?> 
<div class="d-flex justify-content-between align-items-center mt-5"> 
             <h3 class="fs-2 fw-bolder mx-3">Demandes List</h3>
            <!-- <div>
            <button type="button" class="btn btn-primary text-white px-1 px-md-3 rounded-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >ADD NEW <i class="bi bi-person-plus-fill"></i></button>
            </div> -->
            </div>
<table class="table ">
  <thead>
    <tr>
      <th scope="col" ></th>
      <th scope="col" class="text-muted">Nom d'utilisateur</th>
      <th scope="col" class="text-muted">Livre demandé</th>
      <th scope="col" class="text-muted">Date</th>
      <th scope="col" class="text-muted">  </th>
      <th scope="col" class="text-muted">  </th>

    </tr>
  </thead>
  <tbody>
  <?php $i = 0;
            foreach ($data['demande'] as $demande) : ?>
                <tr>
                    <td> </td>
                    <td class="title"><?= $demande->nomcomplete; ?></td>
                    <td><?= $demande->titre; ?></td>
                    <td><?= $demande->datedemande; ?></td>
                    <td><form method="POST" action="<?php echo URLROOT; ?>/Demandes/accepter"><input name="id" type="hidden" value="<?= $demande->id; ?>" /><input type="submit" class="btn btn-sm btn-primary" value="Aprouver"></form></td>
                    <td><form method="POST" action="<?php echo URLROOT; ?>/Demandes/refuser"><input name="id" type="hidden" value="<?= $demande->id; ?>" /><input type="submit" class="btn btn-sm btn-primary" value="Refuser"></form></td>

                </tr>
            <?php endforeach; ?>
  </tbody>
</table>
<?php require APPROOT . '/views/inc/footer.php'; ?> 