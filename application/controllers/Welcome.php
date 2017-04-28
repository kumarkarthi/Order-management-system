<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	//Order view
	
	public function orders()
	{
		$data['order_details']	=$this->order_model->select_all('order_entity');
		$this->load->view('orders',$data);
	}
	//Today Order view
	public function orders_today()
	{
		$data['order_details']	=$this->order_model->select('order_entity',array('DATE(created_at)'=>date('Y-m-d')));
		$this->load->view('orders_today',$data);
	}
	//Order update funcition view
	public function orders_update()
	{
		if($this->input->post('save'))
		{
			$order_id	=	$this->input->post('order_id');
			$values		=	array('status'			=>	$this->input->post('status'),
									'updated_at'	=>	date('Y-m-d h:i:s'));
										
				$query		=	$this->order_model->update('order_entity',$values,array('id'=>$order_id));
				if($query)
				{
					$this->session->set_userdata('suc','Admin Updated Successfully');
					redirect('orders/'.$order_id);
				}
				else
				{
					$this->session->set_userdata('err','Please Try Again!');
					redirect('orders/'.$order_id);
				}
									
		}
		$id=$this->uri->segment(2);
		$data['order_details']	=$this->order_model->select('order_entity',array('id'=>$id));
		$data['order_entity']	=$this->order_model->select('order_item_entity',array('order_id'=>$id));
		if($data['order_details']->num_rows()==0 || $data['order_entity']->num_rows()==0)
		{
			$this->session->set_userdata('err','Order Id not Found ! Please try again');
						redirect('orders');
		}
		$this->load->view('orders_update',$data);
	}
	// order cancellation
	function orders_cancel()
	{
		$id		=	$this->uri->segment(2);
		$where	=	array('id'=>$id);
		$values	=	array('status'=>4);
		$query		=	$this->order_model->update('order_entity',$values,$where);
				
		if($query)
		{
			$this->session->set_userdata('suc','Successfully cancel Order');
			redirect('orders');
		}
		else
		{
			$this->session->set_userdata('err','Please Try Again!');
			redirect('orders');
		}
	}
}
