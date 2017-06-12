<!DOCTYPE html>
<html>
  <head>    
    <meta charset="utf-8" />
    <title>Compu-Shop cms</title>
    <link rel="stylesheet" type="text/css" href="<?= site_url('public/css/cms_style.css'); ?>" />        
  </head>

  <body>
    
    <div class="cms-wrapper">
      
      <div class="cms-header">
        
        <ul>
          <li>CMS DASHBOARD!</li>
          <li><a href="<?= site_url('cms/dashboard'); ?>/">Products Managment</a></li>
          <li><a href="<?= site_url('cms/menu'); ?>/">Menu Managment</a></li>
          <li><a href="<?= site_url('cms/content'); ?>/">Content Managment</a></li>
          <li><a href="<?= site_url('cms/dashboard/orders'); ?>/">View orders</a></li>
          <li><a href="<?= site_url(); ?>">Back to site</a></li>
        </ul>
        <hr>
      </div>
      
      <div class="cms-content">          
        <?php if(!empty($content)): ?>
          <?= $content; ?>
        <?php endif; ?>       
      </div>

      <br /><br />
      
      <div class="cms-footer">
        
        Compu-Shop &copy; <?= date("Y"); ?> CMS DASHBOARD
        
      </div>
      
    </div>
    
  </body>
</html>