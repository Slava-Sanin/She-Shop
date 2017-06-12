
<div class="cms-content-wrapper">
  <br />
  <h3>Add new menu:</h3>
  
  <div class="error-display"><?= validation_errors(); ?></div>

  <?= form_open( site_url() . 'cms/menu/addMenu/' ); ?>
      
    <label for="title">Title:</label><br />
    <input size="35" type="text" name="title" value="<?= set_value('title'); ?>"  /><br /><br />

    <label for="link">Link:</label><br />
    <input size="35" type="text" name="link" value="<?= set_value('link'); ?>"  /><br /><br />

    <input type="submit" name="submit" value="Save menu" />
    <input type="button" value="Back" onclick="window.location = '<?= site_url(); ?>cms/menu/'; " />
  
  <?= form_close(); ?>
  
</div>