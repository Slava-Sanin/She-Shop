<h3>Please sign in with your account:</h3>

<div class="error-display"><?= validation_errors(); ?></div>

<?= form_open( site_url() . 'user/login/' ); ?>
  
  <br /><label for="email">Email:</label>
  <input class="form-control" type="text" name="email" value="<?= set_value('email'); ?>"  /><br /><br />
  <label for="password">Password:</label>
  <input class="form-control" type="password" name="password"  /><br /><br />
  <input type="submit" name="submit" class="btn btn-default" value="Sign in" />

<?= form_close(); ?>