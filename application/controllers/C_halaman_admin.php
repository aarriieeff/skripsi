<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_halaman_admin extends CI_Controller {
	function __construct() {
	parent::__construct();
	$this->load->helper('url');
	$this->load->library('session');
	//$this->load->model('M_anggota');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('sidebar_admin');
		$this->load->view('welcome_admin');

}

	public function dashboard_adm()
	{
		//$this->load->view('sidebar_admin');
		$this->load->view('welcome_admin');

	}
	public function kriteria_majelis(){
		//$this->load->view('sidebar_admin');
		$this->load->view('form/kriteria_majelis');
	}

	public function view_bobot_kriteria(){
		$input = $this->db->get('bobot')->result_array()[0];
		$this->proses_edit_bobot($input);	
	}
	public function view_bobot_sub(){
		$input = $this->db->get('bobot_sub')->result_array()[0];
		$this->proses_edit_sub($input);	
	}

	public function edit_bobot()
	{
		$data['kriteria'] = array('k1','k2','k3','k4','k5');
		$data['bobot'] = array(
			'1/9' 	=> 0.111,
			'1/8'	=> 0.125,
			'1/7'	=> 0.142,
			'1/6'	=> 0.166,
			'1/5'	=> 0.2,
			'1/4'	=> 0.25,
			'1/3'	=> 0.333,
			'1/2'	=> 0.5,
			'1'		=> 1,
			'2'		=> 2,
			'3'		=> 3,
			'4'		=> 4,
			'5'		=> 5,
			'6'		=> 6,
			'7'		=> 7,
			'8'		=> 8,
			'9'		=> 9,
			);
		$data['edit'] = $this->db->get('bobot')->result_array()[0];
		//$this->load->view('sidebar');
		$this->load->view('form/edit_bobot', $data);

	}

	public function proses_edit_bobot($input = null)
	{
		$data['kriteria'] 	= array('k1','k2','k3','k4','k5');
		$data['jumlah'] 	= array();
		$jumlah 			= 0;
		$jumlah_w			= 0;
		$total_l			= 0;
		$total_m			= 0;
		$total_u			= 0;
		$indek_jumlah 		= 0;
		$ir 				= 1.12;
		$data['pev']		= 0;
		$data['ci']			= 0;
		$data['cr']			= 0;

		if(!empty($input))
		{
			$post = $input;
		}
		else
		{
			// insert database

			// $insert['k1k2'] = $post['k1k2'];
			// $insert['k1k3'] = $post['k1k3'];
			// $insert['k1k4'] = $post['k1k4'];
			// $insert['k1k5'] = $post['k1k5'];
			// $insert['k1k6'] = $post['k1k6'];
			// $insert['k1k7'] = $post['k1k7'];
			// $insert['k2k3'] = $post['k2k3'];
			// $insert['k2k4'] = $post['k2k4'];
			// $insert['k2k5'] = $post['k2k5'];
			// $insert['k2k6'] = $post['k2k6'];
			// $insert['k2k7'] = $post['k2k7'];
			// $insert['k3k4'] = $post['k3k4'];
			// $insert['k3k5'] = $post['k3k5'];
			// $insert['k3k6'] = $post['k3k6'];
			// $insert['k3k7'] = $post['k3k7'];
			// $insert['k4k5'] = $post['k4k5'];
			// $insert['k4k6'] = $post['k4k6'];
			// $insert['k4k7'] = $post['k4k7'];
			// $insert['k5k6'] = $post['k5k6'];
			// $insert['k5k7'] = $post['k5k7'];
			// $insert['k6k7'] = $post['k6k7'];
			$post = $this->input->post();
			$this->db->query('TRUNCATE table bobot');
			$this->db->insert('bobot', $post);
			// echo "<pre>";
			// print_r($post);
			// echo "</pre>";
		}

		$data['dataset']	= $post;
		// Hitung jumlah kolom
		for($i=0;$i<count($data['kriteria']);$i++)
		{
			foreach($post as $key => $value)
			{
				if(substr($key,2,2) == $data['kriteria'][$i])
				{
					$temp =array();
					if(strpos($value,'/'))
					{
						$temp = explode('/', $value);
						$value = $temp[0]/$temp[1];
					}
					$jumlah+= $value;
				}
			}
			$data['jumlah'][$indek_jumlah++] = round($jumlah,3);
			$jumlah = 0;
		}
		// Hitung jumlah baris/ 7
		for($i=0;$i<count($data['kriteria']);$i++)
		{
			$indek_bagi = 0;
			foreach($post as $key => $value)
			{
				if(substr($key,0,2) == $data['kriteria'][$i])
				{
					$temp =array();
					if(strpos($value,'/'))
					{
						$temp = explode('/', $value);
						$value = $temp[0]/$temp[1];
					}
					$jumlah += $value /$data['jumlah'][$indek_bagi++];
				}
			}
			$data['priority'][$i] = round($jumlah/count($data['kriteria']),3);
			$jumlah = 0;
			$data['pev'] += ($data['priority'][$i] * $data['jumlah'][$i]);
		}
		$data['ci'] = round(($data['pev'] - count($data['kriteria']))/(count($data['kriteria'])-1),3);
		$data['cr'] = round($data['ci'] / $ir,3);

		// Konversi fuzzy
		$data['konversi']['0.11'] 	= array('0.222','0.222','0.25'); 
		$data['konversi']['0.13'] 	= array('0.222','0.25','0.285');
		$data['konversi']['0.14'] 	= array('0.25','0.285','0.666');  
		$data['konversi']['0.17'] 	= array('0.285','0.333','0.4');
		$data['konversi']['0.2'] 	= array('0.333','0.4','0.5');  
		$data['konversi']['0.25'] 	= array('0.4','0.5','0.666'); 
		$data['konversi']['0.33'] 	= array('0.5','0.666','1');
		$data['konversi']['0.5'] 	= array('0.666','1','2');
		$data['konversi']['1'] 		= array('1','1','1');
		$data['konversi']['2'] 		= array('0.5','1','1.5');
		$data['konversi']['3'] 		= array('1','1.5','2');
		$data['konversi']['4'] 		= array('1.5','2','2.5');
		$data['konversi']['5'] 		= array('2','2.5','3');
		$data['konversi']['6'] 		= array('2.5','3','3.5');   
		$data['konversi']['7'] 		= array('3','3.5','4');
		$data['konversi']['8'] 		= array('3.5','4','4.5');
		$data['konversi']['9'] 		= array('4','4.5','4.5');

		// Konversi sesuai nilai fuzzy
		foreach($post as $key => $value)
		{
			$temp =array();
			if(strpos($value,'/'))
			{
				$temp = explode('/', $value);
				$value = round($temp[0]/$temp[1],2);
			}

			$data['fuzzy'][$key] = $data['konversi'][(string)$value];
		}

		// Menghitung l,m,u tiap kriteria
		for($i=0;$i<count($data['kriteria']);$i++)
		{
			$jumlah_l 			= 0;
			$jumlah_m 			= 0;
			$jumlah_u 			= 0;

			foreach($post as $key => $value)
			{
				if(substr($key,0,2) == $data['kriteria'][$i])
				{
					$jumlah_l += $data['fuzzy'][$key][0];
					$jumlah_m += $data['fuzzy'][$key][1];
					$jumlah_u += $data['fuzzy'][$key][2];
				}
			}
			$data['total'][$i]['l'] = round($jumlah_l,2);
			$data['total'][$i]['m'] = round($jumlah_m,2);
			$data['total'][$i]['u'] = round($jumlah_u,2);
			$total_l += $data['total'][$i]['l'];
			$total_m += $data['total'][$i]['m'];
			$total_u += $data['total'][$i]['u'];
		}
		$data['total_lmu']['l'] = $total_l;
		$data['total_lmu']['m'] = $total_m;
		$data['total_lmu']['u'] = $total_u;

		// Menghitung sintesis fuzzy

		for($i=0;$i<count($data['total']);$i++)
		{
			$data['sintesis'][$i]['l'] = round($data['total'][$i]['l'] / $data['total_lmu']['u'],2);
			$data['sintesis'][$i]['m'] = round($data['total'][$i]['m'] / $data['total_lmu']['m'],2);
			$data['sintesis'][$i]['u'] = round($data['total'][$i]['u'] / $data['total_lmu']['l'],2);
		}

		// Defuzzifikasi => vsk

		for($i=0;$i<count($data['sintesis']);$i++)
		{
			$kecil = 0;
			$k = 0;
			for($j=0;$j<count($data['sintesis']);$j++)
			{
				if($i != $j)
				{
					if($data['sintesis'][($j)]['m'] > $data['sintesis'][($i)]['m'])
					{
						$data['vsk'][$i][$k] = 1;
					}
					else if($data['sintesis'][($i)]['l'] > $data['sintesis'][($j)]['u'])
					{
						$data['vsk'][$i][$k] = 0;
					}
					else
					{
						$data['vsk'][$i][$k] = round(($data['sintesis'][($i)]['l'] - $data['sintesis'][($j)]['u']) / (($data['sintesis'][($j)]['m'] - $data['sintesis'][($j)]['u']) - ($data['sintesis'][($i)]['m'] - $data['sintesis'][($i)]['l'])),2);
					}
				}
				else
				{
					$data['vsk'][$i][$k] = 1;
				}				
				$k++;			
			}		
		}
		// dvsk
		for($i=0;$i<count($data['vsk']);$i++)
		{
			$kecil = $data['vsk'][$i][0];
			for($j=0;$j<count($data['vsk']);$j++)
			{
				if($i != $j && $data['vsk'][$j][$i] < $kecil)
				{
					$kecil = $data['vsk'][$j][$i];
				}
			}
			$data['dvsk'][$i] = $kecil;
			$jumlah_w += $data['dvsk'][$i];
		}
		$data['jumlah_w'] = $jumlah_w;

		// echo "<pre>";
		// print_r($data['vsk']);
		// print_r($data['dvsk']);

		

		// Normalisasi
		for($i=0;$i<count($data['dvsk']);$i++)
		{
			$data['normalisasi'][$i] = round($data['dvsk'][$i] / $data['jumlah_w'],2);
			$this->db->where('id_kriteria',($i+1));
			$this->db->update('kriteria', array('bobot_kriteria' => $data['normalisasi'][$i]));
		}
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		//$this->load->view('sidebar_admin');
		$this->load->view('form/view',$data);
		
	}

	public function view_bobot(){
		$this->load->view('form/view' ,$data);
	}






	//SUB KRITERIA


	public function edit_sub()
	{
		$data['kriteria'] = array('s1','s2','s3','s4','s5');
		$data['bobot'] = array(
			'1/9' 	=> 0.111,
			'1/8'	=> 0.125,
			'1/7'	=> 0.142,
			'1/6'	=> 0.166,
			'1/5'	=> 0.2,
			'1/4'	=> 0.25,
			'1/3'	=> 0.333,
			'1/2'	=> 0.5,
			'1'		=> 1,
			'2'		=> 2,
			'3'		=> 3,
			'4'		=> 4,
			'5'		=> 5,
			'6'		=> 6,
			'7'		=> 7,
			'8'		=> 8,
			'9'		=> 9,
			);
		$data['edit'] = $this->db->get('bobot_sub')->result_array()[0];
		//$this->load->view('sidebar_admin');
		$this->load->view('form/edit_sub', $data);
	}

	public function proses_edit_sub($input = null)
	{
		$data['kriteria'] 	= array('s1','s2','s3','s4','s5');
		$data['jumlah'] 	= array();
		$jumlah 			= 0;
		$jumlah_w			= 0;
		$total_l			= 0;
		$total_m			= 0;
		$total_u			= 0;
		$indek_jumlah 		= 0;
		$ir 				= 1.12;
		$data['pev']		= 0;
		$data['ci']			= 0;
		$data['cr']			= 0;

		if(!empty($input))
		{
			$post = $input;
		}
		else
		{
			$post = $this->input->post();

		// insert database

//		$insert['s1s2'] = $post['s1s2'];
//		$insert['s1s3'] = $post['s1s3'];
//		$insert['s1s4'] = $post['s1s4'];
//		$insert['s1s5'] = $post['s1s5'];
//		$insert['s2s3'] = $post['s2s3'];
//		$insert['s2s4'] = $post['s2s4'];
//		$insert['s2s5'] = $post['s2s5'];
//		$insert['s3s4'] = $post['s3s4'];
//		$insert['s3s5'] = $post['s3s5'];
//		$insert['s4s5'] = $post['s4s5'];
            $insert['s2s1'] = $post['s2s1'];
            $insert['s3s1'] = $post['s3s1'];
            $insert['s4s1'] = $post['s4s1'];
            $insert['s5s1'] = $post['s5s1'];
            $insert['s3s2'] = $post['s3s2'];
            $insert['s4s2'] = $post['s4s2'];
            $insert['s5s2'] = $post['s5s2'];
            $insert['s4s3'] = $post['s4s3'];
            $insert['s5s3'] = $post['s5s3'];
            $insert['s5s4'] = $post['s5s4'];
		$this->db->query('TRUNCATE table bobot_sub');
		$this->db->insert('bobot_sub', $post);
		// echo "<pre>";
		// print_r($post);
		// echo "</pre>";
		}

		$data['dataset']	= $post;
		// Hitung jumlah kolom
		for($i=0;$i<count($data['kriteria']);$i++)
		{
			foreach($post as $key => $value)
			{
				if(substr($key,2,2) == $data['kriteria'][$i])
				{
					$temp =array();
					if(strpos($value,'/'))
					{
						$temp = explode('/', $value);
						$value = $temp[0]/$temp[1];
					}

					$jumlah+= $value;
				}
			}
			$data['jumlah'][$indek_jumlah++] = round($jumlah,3);
			$jumlah = 0;
		}

		// Hitung jumlah baris/ 7
		for($i=0;$i<count($data['kriteria']);$i++)
		{
			$indek_bagi = 0;
			foreach($post as $key => $value)
			{
				if(substr($key,0,2) == $data['kriteria'][$i])
				{
					$temp =array();
					if(strpos($value,'/'))
					{
						$temp = explode('/', $value);
						$value = $temp[0]/$temp[1];
					}
					$jumlah += $value /$data['jumlah'][$indek_bagi++];
				}
			}
			$data['priority'][$i] = round($jumlah/count($data['kriteria']),3);
			$jumlah = 0;
			$data['pev'] += ($data['priority'][$i] * $data['jumlah'][$i]);
		}
		$data['ci'] 	= round(($data['pev'] - count($data['kriteria'])) / (count($data['kriteria']) - 1),3);
		$data['cr'] 	= round($data['ci'] / $ir,3);

		// Konversi fuzzy
		$data['konversi']['0.11'] 	= array('0.222','0.222','0.25'); 
		$data['konversi']['0.13'] 	= array('0.222','0.25','0.285');
		$data['konversi']['0.14'] 	= array('0.25','0.285','0.666');  
		$data['konversi']['0.17'] 	= array('0.285','0.333','0.4');
		$data['konversi']['0.2'] 	= array('0.333','0.4','0.5');  
		$data['konversi']['0.25'] 	= array('0.4','0.5','0.666'); 
		$data['konversi']['0.33'] 	= array('0.5','0.666','1');
		$data['konversi']['0.5'] 	= array('0.666','1','2');
		$data['konversi']['1'] 		= array('1','1','1');
		$data['konversi']['2'] 		= array('0.5','1','1.5');
		$data['konversi']['3'] 		= array('1','1.5','2');
		$data['konversi']['4'] 		= array('1.5','2','2.5');
		$data['konversi']['5'] 		= array('2','2.5','3');
		$data['konversi']['6'] 		= array('2.5','3','3.5');   
		$data['konversi']['7'] 		= array('3','3.5','4');
		$data['konversi']['8'] 		= array('3.5','4','4.5');
		$data['konversi']['9'] 		= array('4','4.5','4.5');

		// Konversi sesuai nilai fuzzy
		foreach($post as $key => $value)
		{
			$temp =array();
			if(strpos($value,'/'))
			{
				$temp = explode('/', $value);
				$value = round($temp[0]/$temp[1],2);
			}
			$data['fuzzy'][$key] = $data['konversi'][(string)$value];
		}

		// Menghitung l,m,u tiap kriteria
		for($i=0;$i<count($data['kriteria']);$i++)
		{
			$jumlah_l 			= 0;
			$jumlah_m 			= 0;
			$jumlah_u 			= 0;
			foreach($post as $key => $value)
			{
				if(substr($key,0,2) == $data['kriteria'][$i])
				{
					$jumlah_l += $data['fuzzy'][$key][0];
					$jumlah_m += $data['fuzzy'][$key][1];
					$jumlah_u += $data['fuzzy'][$key][2];
				}
			}
			$data['total'][$i]['l'] = round($jumlah_l,2);
			$data['total'][$i]['m'] = round($jumlah_m,2);
			$data['total'][$i]['u'] = round($jumlah_u,2);
			$total_l += $data['total'][$i]['l'];
			$total_m += $data['total'][$i]['m'];
			$total_u += $data['total'][$i]['u'];
		}
		$data['total_lmu']['l'] = $total_l;
		$data['total_lmu']['m'] = $total_m;
		$data['total_lmu']['u'] = $total_u;

		// Menghitung sintesis fuzzy
		for($i=0;$i<count($data['total']);$i++)
		{
			$data['sintesis'][$i]['l'] = round($data['total'][$i]['l'] / $data['total_lmu']['u'],2);
			$data['sintesis'][$i]['m'] = round($data['total'][$i]['m'] / $data['total_lmu']['m'],2);
			$data['sintesis'][$i]['u'] = round($data['total'][$i]['u'] / $data['total_lmu']['l'],2);

		}

		// Defuzzifikasi
		for($i=0;$i<count($data['sintesis']);$i++)
		{
			$kecil = 0;
			$k = 0;
			for($j=0;$j<count($data['sintesis']);$j++)
			{

				if($i != $j)
				{
					if($data['sintesis'][($j)]['m'] > $data['sintesis'][($i)]['m'])
					{
						$data['vsk'][$i][$k] = 1;
					}
					else if($data['sintesis'][($i)]['l'] > $data['sintesis'][($j)]['u'])
					{
						$data['vsk'][$i][$k] = 0;
					}
					else
					{
						$data['vsk'][$i][$k] = round(($data['sintesis'][($i)]['l'] - $data['sintesis'][($j)]['u']) / (($data['sintesis'][($j)]['m'] - $data['sintesis'][($j)]['u']) - ($data['sintesis'][($i)]['m'] - $data['sintesis'][($i)]['l'])),2);
					}

					// if($kecil == 0)
					// {	
					// 	$kecil = $data['vsk'][$i][$k];
					// }
					// else
					// {
					// 	if($data['vsk'][$i][$k] < $kecil)
					// 	{
					// 		$kecil = $data['vsk'][$i][$k];
					// 	}
					// }
				}
				else
				{
					$data['vsk'][$i][$k] = 1;
				}	
				$k++;

				// $data['dvsk'][$i] = $kecil;
			}		
		}
		// dvsk
		for($i=0;$i<count($data['vsk']);$i++)
		{
			$kecil = $data['vsk'][$i][0];
			for($j=0;$j<count($data['vsk']);$j++)
			{
				if($i != $j && $data['vsk'][$j][$i] < $kecil)
				{
					$kecil = $data['vsk'][$j][$i];
				}
			}
			$data['dvsk'][$i] = $kecil;
			$jumlah_w += $data['dvsk'][$i];
		}
		$data['jumlah_w'] = $jumlah_w;

		// Normalisasi
		for($i=0;$i<count($data['dvsk']);$i++)
		{
			$data['normalisasi'][$i] = round($data['dvsk'][$i] / $data['jumlah_w'],2);
			$this->db->where('id_sub',($i+1));
			$this->db->update('sub_kriteria', array('bobot_sub' => $data['normalisasi'][$i]));
		}
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		//$this->load->view('sidebar_admin');
		$this->load->view('form/view_sub',$data);	
	}
}
?>
