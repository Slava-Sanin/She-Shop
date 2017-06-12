
<script src="<?= site_url() ?>/ckeditor/ckeditor.js"></script>

<div class="cms-content-wrapper">
  <br />
  <h3>Add new Product:</h3>
  
  <div class="error-display"><?= validation_errors(); ?></div>

  <?= form_open_multipart( site_url() . 'cms/dashboard/addProduct/' ); ?>
  
    <?= $categories; ?><br /><br />
    
    <label for="title">Title:</label><br />
    <input size="78" type="text" name="title" value="<?= set_value('title'); ?>"  /><br /><br />

    <label for="description">Description:</label><br />
    <textarea rows="5" cols="40" name="description"><?= set_value('description'); ?></textarea><br /><br />
    <script>
        // Replace the <textarea id="article"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'description' );
    </script>

    <label for="price">Price:</label><br />
    <input type="text" name="price" value="<?= set_value('price'); ?>"  /><br /><br />

    <label for="file_image">Product image:</label><br />
    <input type="file" name="userfile" /><br /><br />

    <input type="checkbox" name="visibility" checked="checked" value="1" />
    <label for="visibility">Visible on site</label>

    <br /><br />

    <input type="submit" name="submit" value="Save product" />
    <input type="button" value="Back" onclick="window.location = '<?= site_url(); ?>cms/dashboard/'; " />

  <?= form_close(); ?>

</div>

