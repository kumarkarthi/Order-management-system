<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css"/>
<title>Order management system</title>
</head>

<body>

 <?php if($this->session->userdata('suc')) { $this->session->unset_userdata('err');?>
<div class="alert alert-success alert-dismissible" role="alert" id="msg">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong><span class="glyphicon glyphicon-ok"></span></strong><?php echo $this->session->userdata('suc');  echo $this->session->unset_userdata('suc'); ?>
</div>
<?php }  if($this->session->userdata('err')) { $this->session->unset_userdata('suc');?>
<div class="alert alert-danger alert-dismissible" role="alert" <?php if(isset($login)){?> style="width:420px" <?php }?>>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong><span class="glyphicon glyphicon-remove"></span></strong> <?php echo $this->session->userdata('err'); echo $this->session->unset_userdata('err'); ?>
</div>
<?php }  ?>
<?php $or=$order_details->row();?>
<h2>Order Details</h2>
<a href="<?=base_url()?>orders" type="button" class="btn btn-warning" style="float:right">Back</a>
<form action="<?=base_url()?>orders/<?=$or->id?>" method="post">
    <div class="form-group">
      <label for="email">Order Id:</label>
      <label for="email"><?=$or->id?></label>
    </div>
    <input type="hidden" value="<?=$or->id?>" name="order_id" />
    <div class="form-group">
      <label for="email">User Email:</label>
      <label for="email"><?=$or->email_id?></label>
    </div>
    <div class="form-group">
      <label for="email">Order Date:</label>
      <label for="email"><?=date('d M Y',strtotime($or->created_at))?></label>
    </div>
    <div class="form-group">
      <label for="email">Order Status:</label>
      <div class="col-sm-offset-2 col-sm-10">
      <select  class="form-control col-md-6"  name="status">
      <option value="" disabled="disabled">---Select--</option>
       <option value="1" <?php if($or->status==1){?> selected="selected"<?php }?>>created</option>
        <option value="2" <?php if($or->status==2){?> selected="selected"<?php }?>>processed</option>
         <option value="3" <?php if($or->status==3){?> selected="selected"<?php }?>>delivered</option>
          <option value="4" <?php if($or->status==4){?> selected="selected"<?php }?>>cancelled</option>
      </select>
     </div>
    </div>
    <div class="form-group">
      <input type="submit" value="save" name="save" class="btn btn-primary" />
    </div>
  </form>

<h2>Order Item Details</h2>


<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Sno</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                
            </tr>
        </thead>
        
        <tbody>
        <?php $sum=array();$i=1;if(isset($order_entity) && $order_entity->num_rows()>0){
			foreach($order_entity->result() as $oe)
			{
				?>
            <tr>
                <td><?=$i++?></td>
                <td><?=$oe->name?></td>
                <td><?=$oe->price?></td>
                <td><?=$oe->quantity?></td>
                <td><?php echo $oe->price*$oe->quantity;$sum[]=$oe->price*$oe->quantity?></td>
                
            </tr>
            <?php 
			}
		}
		?>
           
        </tbody>
    </table>
     <div class="form-group">
      <label for="email">Total Order Value:</label>
      <label for="email"><?=array_sum($sum);?></label>
    </div>
</body>
</html>
 <script type="text/javascript" src="//code.jquery.com/jquery-1.12.4.js"></script> 
 <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script> 
 <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script> 
<script>

$(document).ready(function() {
    $('#example').DataTable();
} );

</script>