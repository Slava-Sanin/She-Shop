<?php
session_start(); session_unset();

if (!isset($_SESSION['id'])) $_SESSION['id'] = $this->post['id'];
if (!isset($_SESSION['title'])) $_SESSION['title'] = $this->post['title'];
if (!isset($_SESSION['link'])) $_SESSION['link'] = $this->post['link'];

//print_r($_SESSION); echo "<br />";

$id = $_SESSION['id'];
?>


<div class="cms-content-wrapper">
  
  <h3>Edit menu:</h3>
  
  <div class="error-display"><?= validation_errors(); ?></div>

  <?= form_open( site_url() . 'cms/menu/editMenu/' . $id . '/1/'); ?>
      
    <label for="title">Title:</label><br />
    <input size="35" type="text" name="title" value="<?= set_value('title',$_SESSION['title']); ?>"  /><br /><br />

    <label for="link">Link:</label><br />
    <input size="35" type="text" name="link" value="<?= set_value('link',$_SESSION['link']); ?>"  /><br /><br />

    <input type="submit" name="submit" value="Save menu" />
    <input type="button" value="Back" onclick="window.location = '<?= site_url(); ?>cms/menu/'; " />
  
  <?= form_close(); ?>
  
</div>