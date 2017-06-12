
<script src="<?= site_url() ?>/ckeditor/ckeditor.js"></script>

<div class="cms-content-wrapper">
  
  <h3>Add new content:</h3>
  
  <div class="error-display"><?= validation_errors(); ?></div>

    <?= form_open( site_url() . 'cms/content/addContent/' ); ?>

    <label for="link">Add new content for:</label><br />
    <select name="menu_link">
    <option value="">Choose the menu link...</option>
    <?php  foreach ($menu as $value)
    echo "<option value=".$value["id"].">".$value["link"]."</option>"; ?>
    </select><br /><br />

    <label for="title">Title:</label><br />
    <input size="78" type="text" name="title" value="<?= set_value('title'); ?>"  /><br /><br />

    <label for="article">Content:</label><br />
    <textarea rows="25" cols="80" name="article"><?= set_value('article'); ?></textarea><br /><br />
    <script>
        // Replace the <textarea id="article"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'article' );
    </script>

    <input type="submit" name="submit" value="Save content" />
    <input type="button" value="Back" onclick="window.location = '<?= site_url(); ?>cms/content/'; " />
  
  <?= form_close(); ?>

</div>


