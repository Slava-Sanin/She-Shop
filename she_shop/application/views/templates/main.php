<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?= $title; ?></title>
    
    <script> var CI_ROOT = "<?= site_url(); ?>"; </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?= site_url('public/js/cart.js'); ?>"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?= site_url('public/css/style.css'); ?>" type="text/css" />

  </head>
  <body>
    <div class="site-wrapper">
      
      <div class="header"> 
        
        <h3>
          <a href="<?= site_url(); ?>">
          <img border="0" width="250" height="60" style="padding-left: 15px;" src="<?= site_url('public/images/compu-shop.png'); ?>" />
          </a>
        </h3>
          <hr style="margin-bottom: 10px">
       <div id="menu">

           <ul>
          <li><a href="<?= site_url(); ?>">Home</a></li>
          <li><a href="<?= site_url('products'); ?>/">Products</a></li>
          
          <?php if(!empty($menu)): ?>
          
            <?= $menu; ?>
          
          <?php endif; ?>

          <?php if(isset($is_login) && $is_login == false): ?> 
          
            <li><a href="<?= site_url('user/login'); ?>/">Login</a></li>
            <li><a href="<?= site_url('user/register'); ?>/">Register</a></li>    
            
          <?php else: ?> 
            
            <li>
              Welcome
              <a href="<?= site_url('user/edit'); ?>/">
                <b><?= $this->session->userdata('name');  ?></b>
              </a>
              
              <?php if($is_admin == true): ?>
              <a href="<?= site_url() . 'cms/dashboard/'; ?>">CMS Dashboard</a>
              <?php endif; ?> 
              
            </li>
            
           <li><a href="<?= site_url('user/logout'); ?>/">Logout</a></li>
             
         <?php endif; ?> 
         
         <li id="cart-item">
           <a href="<?= site_url('cart/checkout'); ?>/">
             <img width="25" height="25" border="0" src="<?= site_url('public/images/sh-cart-icon.png') ?>" />
             <?php if($this->cart->total_items() > 0): ?>
                <span><?= $this->cart->total_items(); ?></span>
             <?php endif; ?> 
           </a>
         </li>
           
        </ul>
      </div>

      </div>

        <?php if(!empty($content)): ?>
          
        <div class="page-content"><?= $content; ?></div>
        
     <?php else: ?> 
       
       <br /><i>No content...</i>
        
      <?php endif; ?> 
          
      <br /><br /><br />
      
      <div class="footer">
        <br />Compu-Shop &copy; <?= date("Y"); ?> by Slava Sanin
      </div>    
       
    </div>
   

       
  </body>
</html>