<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>
<div class="m-3">
    <div class="d-flex justify-content-between align-items-center mt-5">
        <h3 class="fs-2 fw-bolder mx-3">Demandes List </h3>
    </div>
    <table class="table  table-responsive">
        <thead>
            <tr>
                <th scope="col">Titre de livre</th>
                <th scope="col" class="text-muted">date</th>
                <th scope="col" class="text-muted">statu</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0;
            foreach ($data['demande'] as $demande) : ?>
                <tr>
                    <td class="title"><?= $demande->titre; ?></td>
                    <td><?= $demande->datedemande; ?></td>
                    <td class=" fw-bold <?php if($demande->statu_id == 1){echo 'text-success ';}else if($demande->statu_id == 2){echo 'text-danger';} else{echo 'text-primary';}  ?>"><?= $demande->nom;?></td></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>