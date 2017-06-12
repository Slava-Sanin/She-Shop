
<div id="product-{id}" class="item-box">

  <h3>{title}</h3>
  <p><img width="150" height="150" border="0" src="<?= site_url(); ?>public/images/{image}" /></p>
  <p>{description} <br />
  </p>
  <p>
    Price on site: <b>{price} NIS</b>&nbsp;&nbsp;
    <input type="button" data-id="{id}" class="add-to-cart" value="+ Add to cart" />
    <input type="button" class="checkout" value="Checkout" 
    onclick="window.location = '<?= site_url('cart/checkout'); ?>/'" />
  </p>

    <button onclick="goBack()">Back</button>
</div>

<script>
    function goBack() {
        window.history.back();
    }
</script>