
<h2 style="text-align:center">Our {cat_name} products</h2>

<div class="all-boxes">

{products}

<div id="product-{id}" class="product-box">

  <h3 style="font-size: 20px">{title}</h3>

  <p><img width="150" height="150" border="0" src="<?= site_url(); ?>public/images/{image}" /></p>
  <p style="overflow : hidden; height: 60px">{description}</p>
    <a href="<?= site_url(); ?>products/{cat_machine}/{machine_name}/">Read more...</a>

  <p>
    Price on site: <b>{price} NIS</b>&nbsp;&nbsp;
    <input type="button" data-id="{id}" class="add-to-cart" value="+ Add to cart" onclick="window.location = '<?= site_url(); ?>cms/cart/addToCart/'; "/>
  </p>
  
</div>

{/products}

</div>