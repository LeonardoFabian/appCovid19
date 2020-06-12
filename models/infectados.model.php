<?php 

//require_once "connection.php";

include("connection.php");

class InfectadosModel {
	
	static $instancia = null;
		

	//AMADIS

	static public function query($sql){
		if(self::$instancia == null){
			self::$instancia = new Connection();
		}
		$rs = mysqli_query(self::$instancia->conn, $sql);
		//var_dump($rs);
		$final = [];

		while($fila = mysqli_fetch_object($rs)){
			$final[] = $fila;
		}

		return $final;
	}


	static public function query_array($sql){

		if(self::$instancia == null){
			self::$instancia = new Connection();
		}

		$rs = mysqli_query(self::$instancia->conn, $sql);

		$final = [];

		while($fila = mysqli_fetch_assoc($rs)){
			$final[] = $fila;
		}

		return $final;
	}

	static public function generarCSV($url){

		$f = fopen('infectados.csv','w+');
		$datos = file_get_contents($url);
		$datos = json_decode($datos);

		$final = [];

		if (is_array($datos) || is_object($datos))
		{
			foreach ($datos as $persona)
			
			//print_r($persona);
			{
				for($i = 0; $i < count( $persona ); $i++){
					$name = $persona[$i]->name->first;
					//echo($name);
					$lastname = $persona[$i]->name->last;	
					$gender = $persona[$i]->gender;
					$bday = $persona[$i]->dob->date;
					$age = $persona[$i]->dob->age;
					$country = $persona[$i]->location->country;
					$nat = $persona[$i]->nat;
					$email = $persona[$i]->email;
					$phone = $persona[$i]->phone;
					$cell = $persona[$i]->cell;
					$street = $persona[$i]->location->street->name;
					$snumber = $persona[$i]->location->street->number;
					$lat = $persona[$i]->location->coordinates->latitude;
					$long = $persona[$i]->location->coordinates->longitude;
					$thumb = $persona[$i]->picture->thumbnail;
					$picLg = $persona[$i]->picture->large;

					$final[$i] = array($name,$lastname,$gender,$bday,$age,$country,$nat,$email,$phone,$cell,$street,$snumber,$lat,$long,$thumb,$picLg);
					//$final[$i] = array("firstname" => $name,"lastname" => $lastname,"gender" => $gender,"birthday" => $bday,"age" => $age,"country" => $country,"nationality" => $nat,"email" => $email,"phone" => $phone,"cell" => $cell,"street" => $street,"hnumber" => $snumber,"latitude" => $lat,"longitude" => $long,"pic_thumbnail" => $thumb,"pic_large" => $picLg);

				}		
				array_unshift($final,['firstname','lastname','gender','birthday','age','country','nationality','email','phone','cell','street','hnumber','latitude','longitude','pic_thumbnail','pic_large']);
				
				foreach($final as $key){
					//var_dump($persona->name->first);			
		
					fputcsv($f, $key);
				}
				fclose($f);
			}
			
		}

	}


	/* MODEL: create new user */
	static public function mdlInsertarDatos($table, $url){

		$datos = file_get_contents($url);
			$datos = json_decode($datos);
			
			//var_dump($datos);
			if(is_array( $datos ) || is_object( $datos )){

				foreach($datos as $persona){
					//var_dump($persona->name->first);	
				  
				  //echo $persona->name->first;
				  	for($i = 0; $i < count( $persona ); $i++){
						$name = $persona[$i]->name->first;
						//echo($name);
						$lastname = $persona[$i]->name->last;	
						$gender = $persona[$i]->gender;
						$bday = $persona[$i]->dob->date;
						$age = $persona[$i]->dob->age;
						$country = $persona[$i]->location->country;
						$nat = $persona[$i]->nat;
						$email = $persona[$i]->email;
						$phone = $persona[$i]->phone;
						$cell = $persona[$i]->cell;
						$street = $persona[$i]->location->street->name;
						$snumber = $persona[$i]->location->street->number;
						$lat = $persona[$i]->location->coordinates->latitude;
						$long = $persona[$i]->location->coordinates->longitude;
						$thumb = $persona[$i]->picture->thumbnail;
						$picLg = $persona[$i]->picture->large;

						$signoZodiacal = InfectadosModel::obtenerSignoZodiacal($bday);

						switch ($signoZodiacal){
							case "Aries":
								$simboloZodiacal = "ai aries";
							break;
							case "Tauro":
								$simboloZodiacal = "ai taurus";
							break;
							case "Géminis":
								$simboloZodiacal = "ai gemini";
							break;
							case "Cáncer":
								$simboloZodiacal = "ai cancer";
							break;
							case "Leo":
								$simboloZodiacal = "ai leo";
							break;
							case "Virgo":
								$simboloZodiacal = "ai virgo";
							break;
							case "Libra":
								$simboloZodiacal = "ai libra";
							break;
							case "Escorpio":
								$simboloZodiacal = "ai scorpio";
							break;
							case "Sagitario":
								$simboloZodiacal = "ai sagittarius";
							break;
							case "Capricornio":
								$simboloZodiacal = "ai capricorn";
							break;
							case "Acuario":
								$simboloZodiacal = "ai aquarius";
							break;
							case "Piscis":
								$simboloZodiacal = "ai pisces";
							break;
							default:
								$simboloZodiacal = "";
							break;
						}

						$sql = "
						insert into $table
						(firstname, lastname, gender, birthday, signo_zodiacal, simbolo_zodiacal, age, country, nationality, email, phone, cell, street, hnumber, latitude, longitude, pic_thumbnail, pic_large ) 
						VALUES 
						('{$name}', '{$lastname}', '{$gender}', '{$bday}', '{$signoZodiacal}','{$simboloZodiacal}', {$age}, '{$country}','{$nat}', '{$email}', '{$phone}', '{$cell}', '{$street}', {$snumber}, {$lat}, {$long}, '{$thumb}', '{$picLg}')
						";

						echo $sql."<br>";

						$success = InfectadosModel::query($sql);
						//$success = true;
						if($success){
							$resultQuery = "success";
						} else {
							$resultQuery = "error";
						}						
						
					}
					return $resultQuery;
				}
				
			}         

	}

	static public function obtenerSignoZodiacal($bday){    
		$f = $bday; 
		
		if($f != null && $f != ""){
			$mesStr = substr($f, 5, 2);
			$diaStr = substr($f, 8, 2);
			//$spl = str_split('-', $subStr);    				
	
			//$mes = intval($spl[1]);			
			//$dia = intval($spl[2]);

			$mes = intval($mesStr);
			$dia = intval($diaStr);

			echo "mes {$mes} dia {$dia}";
		
			if(($dia >= 21 && $mes == 3) || ($dia <= 20 && $mes == 4)){
				$text = 'Aries';
			}
			else if(($dia >= 21 && $mes == 4) || ($dia <= 20 && $mes == 5)){
				$text = 'Tauro';
			}
			else if(($dia >= 21 && $mes == 5) || ($dia <= 21 && $mes == 6)){
				$text = 'Géminis';
			}
			else if(($dia >= 22 && $mes == 6) || ($dia <= 22 && $mes == 7)){
				$text = 'Cáncer';
			}
			else if(($dia >= 23 && $mes == 7) || ($dia <= 22 && $mes == 8)){
				$text = 'Leo';
			}
			else if(($dia >= 23 && $mes == 8) || ($dia <= 22 && $mes == 9)){
				$text = 'Virgo';
			}
			else if(($dia >= 23 && $mes == 9) || ($dia <= 22 && $mes == 10)){
				$text = 'Libra';
			}
			else if(($dia >= 23 && $mes == 10) || ($dia <= 22 && $mes == 11)){
				$text = 'Escorpio';
			}
			else if(($dia >= 23 && $mes == 11) || ($dia <= 21 && $mes == 12)){
				$text = 'Sagitario';
			}
			else if(($dia >= 22 && $mes == 12) || ($dia <= 20 && $mes == 1)){
				$text = 'Capricornio';
			}
			else if(($dia >= 21 && $mes == 1) || ($dia <= 18 && $mes == 2)){
				$text = 'Acuario';
			}
			else if(($dia >= 19 && $mes == 2) || ($dia <= 20 && $mes == 3)){
				$text = 'Piscis';
			}
		}
		else{
			$text = '';
		}
		
		return $text;
	}               


}
