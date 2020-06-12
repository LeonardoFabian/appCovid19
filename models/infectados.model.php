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

						$sql = "
						insert into $table
						(firstname, lastname, gender, birthday, age, country, nationality, email, phone, cell, street, hnumber, latitude, longitude, pic_thumbnail, pic_large ) 
						VALUES 
						('{$name}', '{$lastname}', '{$gender}', '{$bday}', {$age}, '{$country}','{$nat}', '{$email}', '{$phone}', '{$cell}', '{$street}', {$snumber}, {$lat}, {$long}, '{$thumb}', '{$picLg}')
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


}
