<?php
    session_start();

    if (!isset($_SESSION['id'])) $_SESSION['id'] = $this->post['id'];
    if (!isset($_SESSION['title'])) $_SESSION['title'] = $this->post['title'];
    if (!isset($_SESSION['description'])) $_SESSION['description'] = $this->post['description'];
    if (!isset($_SESSION['price'])) $_SESSION['price'] = $this->post['price'];
    if (!isset($_SESSION['image'])) $_SESSION['image'] = $this->post['image'];
    if (!isset($_SESSION['visibility'])) $_SESSION['visibility'] = $this->post['visibility'];
    if (!isset($_SESSION['categorie_id'])) $_SESSION['categorie_id'] = $this->post['categorie_id'];

$id = $_SESSION['id'];
 $category_id = $_SESSION['categorie_id'];
?>

<script src="<?= site_url() ?>/ckeditor/ckeditor.js"></script>

<div class="cms-content-wrapper">
  <br />
  <h3>Edit Product:</h3>
  <br />
  <div class="error-display"><?= validation_errors(); ?></div>

  <?= form_open_multipart( site_url() . 'cms/dashboard/editProduct/' . $id . '/1/' ); ?>


    <?= $categories; ?><br /><br />

    <label for="title">Title:</label><br />
    <input size="78" type="text" name="title" value="<?= set_value('title', $_SESSION['title']); ?>"  /><br /><br />

    <label for="description">Description:</label><br />
    <textarea rows="5" cols="40" name="description"><?= set_value('description', $_SESSION['description']); ?></textarea><br /><br />
    <script>
        // Replace the <textarea id="article"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'description' );
    </script>

    <label for="price">Price:</label><br />
    <input type="text" name="price" value="<?= set_value('price', $_SESSION['price']); ?>"  /><br /><br />


    <label for="file_image">Product image:</label><br />
    <input type="file" name="userfile" value="<?= set_value('userfile', $_SESSION['image']); ?>" /> <?= $_SESSION['image'] ?> <br /><br />

    <?php $visibility = ($_SESSION['visibility'] == "1" ) ? 'checked' : ''; ?>
    <input type="checkbox" name="visibility" <?= $visibility ?> value="<?= set_value('visibility', $_SESSION['visibility']); ?>" />
    <label for="visibility">Visible on site</label>    <br /><br />

    <input type="submit" name="edit_submit" value="Save product" />
    <input type="button" value="Back" onclick="window.location = '<?= site_url(); ?>cms/dashboard/'; " />

  <?= form_close(); ?>
    <p id="demo"></p>

</div>

<script>

   var els = document.getElementsByName("category");
   els[0].selectedIndex = <?= $category_id ?>;

</script>
