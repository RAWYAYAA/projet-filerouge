<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>
<div class="m-3">
    <div class="d-flex justify-content-between align-items-center mt-5">
        <h3 class="fs-2 fw-bolder mx-3">Livres List </h3>
    </div>
    <table class="table  table-responsive">
        <thead>
            <tr>
                <th scope="col">image</th>
                <th scope="col" class="text-muted">Titre de livre</th>
                <th scope="col" class="text-muted">statu</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0;
            foreach ($data['demande'] as $demande) : ?>
                <tr>
                    <td><img class="rounded-circle"
                            src="data:image/*;charset=utf8;base64,<?php echo base64_encode($demande->image); ?>"
                            alt="" width="45" height="45">
                        </td>
                    <td class="title"><?= $demande->titre; ?></td>
                    <td><?= $demande->nom; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>