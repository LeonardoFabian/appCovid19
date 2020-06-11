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
		//$array = json_decode(file_get_contents($url),true);
		//print_r($datos);
		//var_dump($array);
/*
		foreach($array as $key => $value){
			echo $value['name']['first']."<br>";
		}
		*/
/*
		for ($i = 0; $i < count( $array ); $i++){
			echo $array[$i]->gender;
		}
*/

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
					$country = $persona[$i]->country;
					$nat = $persona[$i]->nat;
					$email = $persona[$i]->email;
					$phone = $persona[$i]->phone;
					$cell = $persona[$i]->cell;
					$street = $persona[$i]->location->street->name;
					$snumber = $persona[$i]->location->street->number;
					$lat = $persona[$i]->coordinates->latitude;
					$long = $persona[$i]->coordinates->longitude;
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

/*
	static public function ejecutar($sql, $retornarID = false){

		if(self::$instancia == null){
			self::$instancia = new Connection();
		}

		$table = "infected";
		$datos = file_get_contents($url);
			$datos = json_decode($datos);
			
			//var_dump($datos);

            foreach($datos->results as $persona){
				//var_dump($persona->name->first);

			  $firstname = $persona->name->first;
			  //var_dump($firstname);
			  $lastname= $persona->name->last;			  
			  $gender= $persona->gender;
			  $birthday= $persona->dob->date;
			  $age= $persona->dob->age;
			  $country = $persona->country;
			  $nationality= $persona->nat;
			  $email= $persona->email;
			  $phone= $persona->phone;
			  $cell= $persona->cell;
			  $street= $persona->location->street->name;
			  $hnumber= $persona->location->street->number;
			  $latitude= $persona->coordinates->latitude;
			  $longitude= $persona->coordinates->longitude;
			  $pic_thumbnail= $persona->picture->thumbnail;
			  $pic_large= $persona->picture->large;			  

			  $sql = "insert into {$table}(firstname, lastname, gender, birthday, age, nationality, email, phone, cell, street, hnumber, latitude, longitude, pic_thumbnail, pic_large ) VALUES ({$firstname}, {$lastname}, {$gender}, {$birthday}, {$age}, {$nationality}, {$email}, {$phone}, {$cell}, {$street}, {$hnumber}, {$latitude}, {$longitude}, {$pic_thumbnail}, {$pic_large})";
			  //echo $persona->name->first;
			  
        }



		$rs = mysqli_query(self::$instancia->conn, $sql);

		if($retornarID){
			return mysqli_insert_id(self::$instancia->conn);
		}

		return $rs;
	}
*/

	


	/* MODEL: create new user */
	static public function mdlInsertarDatos($table, $url){

		$datos = file_get_contents($url);
			$datos = json_decode($datos);
			
			//var_dump($datos);

            foreach($datos->results as $persona){
				//var_dump($persona->name->first);

			  $stmt = Connection::connect()->prepare("INSERT INTO $table(firstname, lastname, gender, birthday, age, nationality, email, phone, cell, street, hnumber, latitude, longitude, pic_thumbnail, pic_large ) VALUES (:firstname, :lastname, :gender, :birthday, :age, :nationality, :email, :phone, :cell, :street, :hnumber, :latitude, :longitude, :pic_thumbnail, :pic_large)");
			  //echo $persona->name->first;
			  $stmt -> bindParam(":firstname", $persona->name->first, PDO::PARAM_STR);
			  $stmt -> bindParam(":lastname", $persona->name->last, PDO::PARAM_STR);
			  $stmt -> bindParam(":gender", $persona->gender, PDO::PARAM_STR);
			  $stmt -> bindParam(":birthday", $persona->dob->date, PDO::PARAM_STR);
			  $stmt -> bindParam(":age", $persona->dob->age, PDO::PARAM_STR);
			  $stmt -> bindParam(":nationality", $persona->nat, PDO::PARAM_STR);
			  $stmt -> bindParam(":email", $persona->email, PDO::PARAM_STR);
			  $stmt -> bindParam(":phone", $persona->phone, PDO::PARAM_STR);
			  $stmt -> bindParam(":cell", $persona->cell, PDO::PARAM_STR);
			  $stmt -> bindParam(":street", $persona->location->street->name, PDO::PARAM_STR);
			  $stmt -> bindParam(":hnumber", $persona->location->street->number, PDO::PARAM_STR);
			  $stmt -> bindParam(":latitude", $persona->coordinates->latitude, PDO::PARAM_STR);
			  $stmt -> bindParam(":longitude", $persona->coordinates->longitude, PDO::PARAM_STR);
			  $stmt -> bindParam(":pic_thumbnail", $persona->picture->thumbnail, PDO::PARAM_STR);
			  $stmt -> bindParam(":pic_large", $persona->picture->large, PDO::PARAM_STR);			  
        }
/*
		$stmt = Connection::connect()->prepare("INSERT INTO $table(firstname, lastname, gender, birthday, age, nationality, email, phone, cell, street, hnumber, latitude, longitude, pic_thumbnail, pic_large ) VALUES (:cedula, :nombre, :apellido, :ciudad, :curso, :comentario, :foto)");

		$stmt -> bindParam(":cedula", $data["cedula"], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":apellido", $data["apellido"], PDO::PARAM_STR);
		$stmt -> bindParam(":ciudad", $data["ciudad"], PDO::PARAM_STR);
		$stmt -> bindParam(":curso", $data["curso"], PDO::PARAM_STR);
		$stmt -> bindParam(":comentario", $data["comentario"], PDO::PARAM_STR);
		$stmt -> bindParam(":foto", $data["foto"], PDO::PARAM_STR);
*/

		if($stmt->execute()){

			return "success";

		}else{

			return "error";
		}

		$stmt -> close();

		$stmt = null;

	}

	


}
