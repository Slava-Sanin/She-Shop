
<div class="order_wraper">
<br />
<table>

<th>Name</th>
<th>Date</th>
<th>Order</th>
<th>Total order</th>

<?php foreach($orders as $key => $row): ?>
  
  <?php $total_order = 0; ?>
  
  
  <tr>
    
    <td><?= $row['name'] ?></td>
    <td><?= $row['order_date'] ?></td>
    <td>
      
      <ul>
      
      <?php foreach($row['data'] as $value): ?>
        
        <li>
          Name: <?= $value->name; ?>, 
          qty: <?= $value->qty ?>, 
          Price: <?= $value->price; ?>, 
          subtotal: <?= $value->subtotal; ?>
        </li>
        
        <?php $total_order += ($value->qty * $value->price);  ?>
        
      <?php endforeach; ?>
      
      </ul>
      
    </td>
    
    <td><?= $total_order; ?></td>
    
  </tr>
  
  
<?php endforeach; ?>

</table>

</div>