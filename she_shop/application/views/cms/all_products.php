<?php session_start(); session_unset(); ?>

<div class="cms-content-wrapper">
  
  <h2>Products Managment</h2>
  <i>Here you can edit site content</i><br /><br />

<div class="cms-wallpaper">
  <?php if($this->session->flashdata('feedback') == true): ?>
    
    <p class="flash-data"><?= $this->session->flashdata('feedback'); ?></p>
    
  <?php endif; ?>
  <br />

  <input type="button" value="+ Add new product"
  onclick="window.location = '<?= site_url(); ?>cms/dashboard/addProduct/';" />
  
  {products}
  
    <h4 style="color: crimson">{name}</h4>
    
    <ul>
    {items}
    
      <li style="color: black">
        
        {title}&nbsp;&nbsp;
        <a style="color: green" href="<?= site_url(); ?>cms/dashboard/editProduct/{prg_id}/"">Edit</a>&nbsp;&nbsp;|&nbsp;&nbsp;
        <a style="color: blue" href="<?= site_url(); ?>cms/dashboard/deleteProduct/{prg_id}/">Delete</a>
        
      </li>
    
    {/items}
    </ul>
    
  {/products}
</div>
</div>