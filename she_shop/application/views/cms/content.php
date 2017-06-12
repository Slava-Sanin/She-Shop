<div class="cms-content-wrapper">

<h3>Content managment - Edit site content</h3>

<?php if($this->session->flashdata('feedback') == true): ?>
  
  <p class="flash-data"><?= $this->session->flashdata('feedback'); ?></p>
  
<?php endif; ?>
    <br />

<input type="button" value="+ Add new Content"
onclick="window.location = '<?= site_url(); ?>cms/content/addContent/';" />

<ul style="color: black">
  
  {content}
  
  <li>
    {title}
    <a style="color: green" href="<?= site_url(); ?>cms/content/editContent/{id}/">Edit</a>
    <a style="color: blue" href="<?= site_url(); ?>cms/content/deleteContent/{id}/">Delete</a>
  </li>
  
  {/content}
  
</ul>

</div>