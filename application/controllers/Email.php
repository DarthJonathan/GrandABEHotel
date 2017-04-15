<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Email extends MY_Controller
	{
		function __construct()
		{
			parent::__construct();
<<<<<<< HEAD
=======
			//$this->load->library('email');
			
>>>>>>> origin/master
		}

		public function check_day($post_string)
		{
			return $post_string == '0' ? FALSE : TRUE;
		}
		public function check_month($post_string)
		{
			return $post_string == '0' ? FALSE : TRUE;
		}
		public function check_year($post_string)
		{
			return $post_string == '0' ? FALSE : TRUE;
		}

		public function mail()
		{
			//$ci = get_instance();
			$this->load->library('form_validation');
			$this->form_validation->set_rules('day','Day','required|callback_check_day');
			$this->form_validation->set_rules('month','Month','required|callback_check_month');
			$this->form_validation->set_rules('year','Year','required|callback_check_year');
			$this->form_validation->set_rules('name','Name','trim|required');
			$this->form_validation->set_rules('email','Email','trim|required|valid_email');
			$this->form_validation->set_message('check_day', 'Day is required.');
			$this->form_validation->set_message('check_month', 'Month is required.');
			$this->form_validation->set_message('check_year', 'Year is required.');

			if($this->form_validation->run() === FALSE)
			{
				$this->load->helper('form');
				$this->session->set_flashdata('mailMessageHeader','Information incomplete');

				$this->session->set_flashdata('mailMessage', 
					form_error('day').
					form_error('month').
					form_error('year').
					form_error('name').
					form_error('email'));
			}
			else
			{
<<<<<<< HEAD
				$this->load->model('Mainsettingsdata');
				if($result = $this->Mainsettingsdata->getData()){
					$data = $result;
				}
				$this->load->library('email');
				$this->load->library('encrypt');

				$password= $this->encrypt->decode($data->password);
=======
				$this->load->library('email');

>>>>>>> origin/master
				$config = Array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.gmail.com',
					'smtp_port' => 465,
<<<<<<< HEAD
					'smtp_user' => $data->email,
					'smtp_pass' => $password,
=======
					'smtp_user' => '', //isi pls
					'smtp_pass' => '', // isi pls
>>>>>>> origin/master
					'mailtype'  => 'html', 
					'charset'   => 'iso-8859-1'
					);
				$this->email->initialize($config);
				$this->email->set_newline("\r\n");

				$this->email->from('automated.reservations@grandabe.com', 'Customer Reservations');
<<<<<<< HEAD
				$this->email->to('jeffry24797@gmail.com');
=======
				$this->email->to(''); isi pls
>>>>>>> origin/master
				// $this->email->cc('another@another-example.com');
				// $this->email->bcc('them@their-ample.com');

				$this->email->subject('Reservations');


				$dateObj   = DateTime::createFromFormat('!m', $this->input->post('month'));
				$monthName = $dateObj->format('F');
				$this->email->message(
					"Reservations "."<br>".
					"Customer Name : ".$this->input->post('name')."<br>".
					"Date : ". $this->input->post('day')." ".$monthName." 20".$this->input->post('year')."<br>".
					"Email : ".$this->input->post('email'));

				$result=$this->email->send();
				//$ci->email->print_debugger();
				if(!$result)
				{
					$this->session->set_flashdata('mailMessageHeader','Error');
					$this->session->set_flashdata('mailMessage','Failed to send email. Please try again later.');
				}
				else
				{
					$this->session->set_flashdata('mailMessageHeader','Mail sent!');
					$this->session->set_flashdata('mailMessage','The mail has been sent. We will contact you shortly.');
				}
				
			}
<<<<<<< HEAD
			
=======
>>>>>>> origin/master
			redirect('','refresh');

			
		}
	}

?>