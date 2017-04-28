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

<h2>Order Details</h2>
<a href="<?=base_url()?>orders/today" type="button" class="btn btn-success" style="float:right">Today Orders</a>

<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Order Id</th>
                <th>User Email</th>
                <th>Order Date</th>
                <th>Order Status</th>
                <th>Update Order</th>
                <th>Cancel Order</th>
            </tr>
        </thead>
        
        <tbody>
        <?php if(isset($order_details) && $order_details->num_rows()>0){
			foreach($order_details->result() as $or)
			{
				?>
            <tr>
                <td>#<?=$or->id?></td>
                <td><?=$or->email_id?></td>
                <td><?=date('d M Y',strtotime($or->created_at))?></td>
                <td><?php if($or->status==1) echo "created"; elseif($or->status==2) echo "processed";elseif($or->status==3) echo "delivered";elseif($or->status==4) echo "cancelled";?></td>
                <td><a href="<?=base_url()?>orders/<?=$or->id?>" type="button" class="" style="float:right">Update</a></td>
                 <td>
                 <?php if($or->status==4)
				 {
					 echo "Cancelled";
				 }
				 else
				 {?>
                 <a href="<?=base_url()?>orders/<?=$or->id?>/cancel" onclick="return confirm('Do You want to cancel this order')" type="button" class="" style="float:right">Cancel</a>
                 <?php }?>
                 </td>
                
            </tr>
            <?php 
			}
		}
		?>
           
        </tbody>
    </table>
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