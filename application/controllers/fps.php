<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fps extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function resultado()
	{

		$valorFPS = $this->input->post('nameFPS');
		if(isset($valorFPS)&&is_numeric($valorFPS))
		{
			$this->load->model('Mfps_model',"mfps");
			$data['valorFPS'] = $valorFPS;
			$data['personas'] = $this->mfps->select_personas_tramo($valorFPS);
			$data['fichas'] = $this->mfps->select_result($valorFPS);
			$data['nFichas'] = count($data['fichas']);
			$this->load->view('fps_resultado',$data);
		}
		else
		{
			show_404();
		}
	}

	public function reclamo()
	{
		$this->load->view('fps_reclamo');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
