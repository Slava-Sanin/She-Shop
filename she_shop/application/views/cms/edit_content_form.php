<?php
session_start(); session_unset();
if (!isset($_SESSION['id'])) $_SESSION['id'] = $this->post['id'];
if (!isset($_SESSION['title'])) $_SESSION['title'] = $this->post['title'];
if (!isset($_SESSION['article'])) $_SESSION['article'] = $this->post['article'];

$id = $_SESSION['id'];
?>

<script src="<?= site_url() ?>/ckeditor/ckeditor.js"></script>

<div class="cms-content-wrapper">
  
  <h3>Edit Content:</h3>
  
  <div class="error-display"><?= validation_errors(); ?></div>

  <?= form_open( site_url() . 'cms/content/editContent/' . $id . '/1/'); ?>
      
    <label for="title">Title:</label><br />
    <input size="78" type="text" name="title" value="<?= set_value('title',$_SESSION['title']); ?>"  /><br /><br />

    <label for="article">Content:</label><br />
    <textarea rows="25" cols="80" name="article"><?= set_value('article',$_SESSION['article']); ?></textarea><br /><br />
    <script>
        // Replace the <textarea id="article"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'article' );
    </script>

    <input type="submit" name="submit" value="Save content" />
    <input type="button" value="Back" onclick="window.location = '<?= site_url(); ?>cms/content/'; " />
  
  <?= form_close(); ?>
  
</div>