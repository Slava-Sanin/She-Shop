<div class="cms-content-wrapper">

<h3>Menu managment - Edit site main nav</h3>

<?php if($this->session->flashdata('feedback') == true): ?>
  
  <p class="flash-data"><?= $this->session->flashdata('feedback'); ?></p>
  
<?php endif; ?>
    <br />

<input type="button" value="+ Add Menu Item" 
onclick="window.location = '<?= site_url(); ?>cms/menu/addMenu/';" />

<ul style="color: black">
  
  {menu}
  
  <li>
    {link}
    <a style="color: green" href="<?= site_url(); ?>cms/menu/editMenu/{id}/">Edit</a>
    <a style="color: blue" href="<?= site_url(); ?>cms/menu/deleteMenu/{id}/">Delete</a>
  </li>
  
  {/menu}
  
</ul>

</div>