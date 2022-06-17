<?php require APPROOT . '/views/inc/header.php'; ?>
<main class="d-flex justify-content-center align-items-center">
            <div class="login bg-white p-4 my-5"  >
                <div class="login-logo border-start border-primary border-5 mx-4 px-2 my-4">
                  <?php flash('register_success'); ?>
                    <h1>Youread</h1>
                </div>
                <div class="login-title text-center mb-3">
                    <p class="text-muted ">Entrez vous informations pour s'authentifier</p>
                    <!-- <?php
                    if(isset($_COOKIE['addUser'])){
                    echo '<div class="bg-info"><p>'. $_COOKIE['addUser'] .'</p></div>';
                    }
                ?> -->
                </div>
                <form class="row g-3" method="POST" action="<?php echo URLROOT; ?>/users/login" >
                  <div class="col-md-12">
                          <label class="form-label text-muted">E-mail <sup>*</sup> </label>
                          <input type="text" class="form-control shadow-none  <?php echo(!empty($data['email_err'])) ? 'is-invalid' : ''; ?> " value="<?php  echo $data['email']?>" name="email" id="email" placeholder="Enter your Email" >
                          <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                      </div>
                      <div class="col-md-12">
                          <label class="form-label text-muted">Password<sup>*</sup> </label>
                          <input type="password" class="form-control shadow-none <?php echo(!empty($data['password_err'])) ? 'is-invalid' : ''; ?> " value="<?php  echo $data['password']?>"  name="password" id="password" placeholder="Enter your password" >
                          <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>

                      </div>
                      <div >
                          <input type="submit" class="btn btn-primary w-100 p-2 mb-2 text-uppercase text-white shadow-none" name="login" id="login" value="login">
                      </div>
                    <div class="col">
                      <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-light btn-block">No account? Register</a>
                    </div>
            </form>
    </div>
  </main>
<?php require APPROOT . '/views/inc/footer.php'; ?>