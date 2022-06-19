<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>
<div class="m-3">
    <div class="d-flex justify-content-between align-items-center mt-5">
    <h3 class="fs-2 fw-bolder mx-3">Résumés List </h3>
    <a class="btn btn-sm btn-primary" href="<?php echo URLROOT; ?>/demandes/addresumes">ADD Resume <i class="bi bi-book-fill"></i></a>
    </div>
    <table class="table  table-responsive">
        <thead>
            <tr>
                <th scope="col" class="text-muted">Titre de livre</th>
                <th scope="col" class="text-muted">Resume</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0;
            foreach ($data['resume'] as $resume) : ?>
                <tr>
                    <td class="title"><?= $resume->titrelivre; ?></td>
                    <td><?= $resume->resume; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>