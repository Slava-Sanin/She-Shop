
<h3>Here you can sign up to our site:</h3>

<div class="error-display"><?= validation_errors(); ?></div>

<?= form_open( site_url() . 'user/register/' ); ?>

  <label for="name">Name:</label><br />
  <input type="text" name="name" value="<?= set_value('name'); ?>"  /><br /><br />
  
  <label for="email">Email:</label><br />
  <input type="text" name="email" value="<?= set_value('email'); ?>"  /><br /><br />
  
  <label for="password">Password:</label><br />
  <input type="password" name="password"  /><br /><br />
  
  <label for="re_password">Confirm Password:</label><br />
  <input type="password" name="re_password"  /><br /><br />
  
  <input type="submit" name="submit" value="Sign up" />

<?= form_close(); ?>
