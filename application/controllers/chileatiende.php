<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chileatiende extends CI_Controller {

	var $variable;

	public function index()
	{
		echo "lol";
		//$this->load->view('welcome_message');
	}

	public function reader()
	{
		$this->load->library('curl');
		$this->load->model('chileatiende_model',"chileatiende");

		// Pull in an array of tweets
		$i = 0;
		$tmp = $this->curl->simple_get('https://www.chileatiende.cl/api/fichas?access_token=z2sqgLqQwXs2RNFK&maxResults=20');
		$this->chileatiende->insert_data_dump(print_r($tmp,true));
		$data[$i] = json_decode($tmp,true);
		$data[$i] = $data[$i]['fichas'];

		while(isset($data[$i]['nextPageToken']))
		{
			$tmp = $this->curl->simple_get('https://www.chileatiende.cl/api/fichas?access_token=z2sqgLqQwXs2RNFK&maxResults=20&pageToken='.$data[$i]['nextPageToken']);
			$i++;
			$this->chileatiende->insert_data_dump(print_r($tmp,true));
			$data[$i] = json_decode($tmp,true);
			$data[$i] = $data[$i]['fichas'];
		}
		//$this->load->view('welcome_message');
	}

	public function select()
	{
		$this->load->model('chileatiende_model',"chileatiende");

		$data = $this->chileatiende->select_dump_data();
		if(is_array($data))
		{
			foreach($data as $item)
			{
				$item = str_replace("\u00e1", "á", $item);
				$item = str_replace("\u00e9", "é", $item);
				$item = str_replace("\u00ed", "í", $item);
				$item = str_replace("\u00f3", "ó", $item);
				$item = str_replace("\u00fa", "ú", $item);
				$item = str_replace("\u00c1", "Á", $item);
				$item = str_replace("\u00c9", "É", $item);
				$item = str_replace("\u00cd", "Í", $item);
				$item = str_replace("\u00d3", "Ó", $item);
				$item = str_replace("\u00da", "Ú", $item);
				$item = str_replace("\u00f1", "ñ", $item);
				$item = str_replace("\u00d1", "Ñ", $item);
				$item = str_replace("\u00a0", "", $item);
				$item = str_replace("\u00b0", "°", $item);
				$item = str_replace("\u00b4", "'", $item);
				$item = str_replace("\u00ba", "º", $item);
				$item = str_replace("\\/", "/", $item);			
				$item = str_replace("\\n", "", $item);	

				$item = json_decode($item['dump'],true);
				$item = $item['fichas']['items']['ficha'];

				foreach($item as $j => $ficha)
				{
					preg_match_all("|(.*)FPS(.*)|U",$ficha['objetivo'],$salida, PREG_PATTERN_ORDER);

					if(isset($salida[0][0])&&count($salida)>0)
					{
						$fichasfps[] = $ficha;
					}
					$salida = null;

					preg_match_all("|(.*)FPS(.*)|U",$ficha['beneficiarios'],$salida, PREG_PATTERN_ORDER);

					if(isset($salida[0][0])&&count($salida)>0)
					{
						$fichasfps[] = $ficha;
					}
					$salida = null;

					preg_match_all("|(.*)Ficha de Protección Social(.*)|U",$ficha['objetivo'],$salida, PREG_PATTERN_ORDER);

					if(isset($salida[0][0])&&count($salida)>0)
					{
						$fichasfps[] = $ficha;
					}
					$salida = null;

					preg_match_all("|(.*)Ficha de Protección Social(.*)|U",$ficha['beneficiarios'],$salida, PREG_PATTERN_ORDER);

					if(isset($salida[0][0])&&count($salida)>0)
					{
						$fichasfps[] = $ficha;
					}
					$salida = null;

					preg_match_all("|(.*)Ficha CAS(.*)|U",$ficha['objetivo'],$salida, PREG_PATTERN_ORDER);

					if(isset($salida[0][0])&&count($salida)>0)
					{
						$fichasfps[] = $ficha;
					}
					$salida = null;

					preg_match_all("|(.*)Ficha CAS(.*)|U",$ficha['beneficiarios'],$salida, PREG_PATTERN_ORDER);

					if(isset($salida[0][0])&&count($salida)>0)
					{
						$fichasfps[] = $ficha;
					}
					$salida = null;

					preg_match_all("|(.*)fps(.*)|U",$ficha['objetivo'],$salida, PREG_PATTERN_ORDER);

					if(isset($salida[0][0])&&count($salida)>0)
					{
						$fichasfps[] = $ficha;
					}
					$salida = null;

					preg_match_all("|(.*)fps(.*)|U",$ficha['beneficiarios'],$salida, PREG_PATTERN_ORDER);

					if(isset($salida[0][0])&&count($salida)>0)
					{
						$fichasfps[] = $ficha;
					}
					$salida = null;

				}
			}

			foreach($fichasfps as $ficha)
			{
					if($this->operador_aritmetico("|<(.*)>(.*)menor(.*)FPS(.*)</(.*)>|U",$ficha)||$this->operador_aritmetico("|<(.*)>(.*)FPS(.*)menor(.*)</(.*)>|U",$ficha)||$this->operador_aritmetico("|<(.*)>(.*)hasta(.*)FPS(.*)</(.*)>|U",$ficha)||$this->operador_aritmetico("|<(.*)>(.*)FPS(.*)hasta(.*)</(.*)>|U",$ficha)||$this->operador_aritmetico("|<(.*)>(.*)máximo(.*)FPS(.*)</(.*)>|U",$ficha)||$this->operador_aritmetico("|<(.*)>(.*)FPS(.*)máximo(.*)</(.*)>|U",$ficha)||$this->operador_aritmetico("|<(.*)>(.*)inferior(.*)FPS(.*)</(.*)>|U",$ficha)||$this->operador_aritmetico("|<(.*)>(.*)FPS(.*)inferior(.*)</(.*)>|U",$ficha)||$this->operador_aritmetico("|<(.*)>(.*)no sobrepase(.*)FPS(.*)</(.*)>|U",$ficha)||$this->operador_aritmetico("|<(.*)>(.*)FPS(.*)no sobrepase(.*)</(.*)>|U",$ficha)||$this->operador_aritmetico("|<(.*)>(.*)máximo(.*)Ficha de Protección Social(.*)</(.*)>|U",$ficha)||$this->operador_aritmetico("|<li>(.*)Ficha de Protección Social(.*)a(.*)</li>|U",$ficha))
				{
					$ficha['operadorFPS'] = "Menor";
				} 
				else if($this->operador_aritmetico("|<(.*)>(.*)mayor(.*)FPS(.*)</(.*)>|U",$ficha)||$this->operador_aritmetico("|<(.*)>(.*)FPS(.*)mayor(.*)</(.*)>|U",$ficha)||$this->operador_aritmetico("|<(.*)>(.*)desde(.*)FPS(.*)</(.*)>|U",$ficha)||$this->operador_aritmetico("|<(.*)>(.*)FPS(.*)desde(.*)</(.*)>|U",$ficha)||$this->operador_aritmetico("|<(.*)>(.*)mínimo(.*)FPS(.*)</(.*)>|U",$ficha)||$this->operador_aritmetico("|<(.*)>(.*)FPS(.*)mínimo(.*)</(.*)>|U",$ficha)||$this->operador_aritmetico("|<(.*)>(.*)superior(.*)FPS(.*)</(.*)>|U",$ficha)||$this->operador_aritmetico("|<(.*)>(.*)FPS(.*)superior(.*)</(.*)>|U",$ficha)||$this->operador_aritmetico("|<(.*)>(.*)superior(.*)Ficha CAS(.*)</(.*)>|U",$ficha)||$this->operador_aritmetico("|<(.*)>(.*)Ficha CAS(.*)superior(.*)</(.*)>|U",$ficha))
				{
					$ficha['operadorFPS'] = "Mayor";
				}
				else if($this->operador_aritmetico("|<(.*)>(.*)contar(.*)FPS(.*)</(.*)>|U",$ficha)||$this->operador_aritmetico("|<(.*)>(.*)FPS(.*)contar(.*)</(.*)>|U",$ficha)||$this->operador_aritmetico("|<(.*)>(.*)Contar(.*)FPS(.*)</(.*)>|U",$ficha)||$this->operador_aritmetico("|<(.*)>(.*)FPS(.*)Contar(.*)</(.*)>|U",$ficha))
				{
					$ficha['operadorFPS'] = "Contar";
				}
				else if($this->operador_aritmetico("|<(.*)>(.*)aplicación(.*)Ficha de Protección Social(.*)</(.*)>|U",$ficha)||$this->operador_aritmetico("|<(.*)>(.*)Ficha de Protección Social(.*)aplicación(.*)</(.*)>|U",$ficha))
				{
					$ficha['operadorFPS'] = "Aplicación";
				}
				else
				{
					$ficha['operadorFPS'] = "Desconocido";
					$this->variable = null;
				}
				if(!is_null($this->variable))
				{
					preg_match_all("|(.*) (.*) puntos(.*)|", $this->variable, $resultado, PREG_PATTERN_ORDER); 
					if(isset($resultado[2][0]))
					{		
						$ficha['FPS'] = str_replace(".", "", $resultado[2][0]);
						$FPS[] = $ficha;
					} else
					{
						preg_match_all("|(.*) (.*) en la Ficha(.*)|", $this->variable, $resultado, PREG_PATTERN_ORDER); 
						if(isset($resultado[2][0]))
						{		
							$ficha['FPS'] = str_replace(".", "", $resultado[2][0]);
							$FPS[] = $ficha;
						}
						else
						{
							preg_match_all("|(.*) (.*) en la Ficha(.*)|", $this->variable, $resultado, PREG_PATTERN_ORDER); 
							if(isset($resultado[2][0]))
							{		
								$ficha['FPS'] = str_replace(".", "", $resultado[2][0]);
								$FPS[] = $ficha;
							} 
						}
					}
				}
				$this->variable = null;
			}
				print_r($FPS[0]);
				echo "<br/>";
		}
	}

	private function operador_aritmetico($operador,$ficha)
	{
		preg_match_all($operador,$ficha['objetivo'],$salida, PREG_PATTERN_ORDER);

		if(isset($salida[0][0])&&count($salida)>0)
		{
			$this->variable = $salida[0][0];
			return TRUE;
		}
		else
		{
			$salida = null;

			preg_match_all($operador,$ficha['beneficiarios'],$salida, PREG_PATTERN_ORDER);

			if(isset($salida[0][0])&&count($salida)>0)
			{
				$this->variable = $salida[0][0];
				return TRUE;
			}
			else
			{
				$this->variable = null;
				return FALSE;
			}
		}
	}
}

