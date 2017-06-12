<div class="cms-content-wrapper">
    
  <?= form_open( site_url() . 'cms/content/deleteContent/' . $id . '/' ); ?>

    <br />
    <label class="warning" for="title">Are you sure you want to delete this content?</label><br /><br />
    <input type="submit" name="delete_submit" value="Delete" />
    <input type="button" value="Back" onclick="window.location = '<?= site_url(); ?>cms/content/'; " />
  
  <?= form_close(); ?>
  
</div>