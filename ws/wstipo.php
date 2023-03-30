<?php

    include 'Conexion.php';

    $pdo = new Conexion();

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
		if(isset($_GET['id'])) {
			$sql = $pdo->prepare("SELECT * FROM tipocalzado WHERE id =:id");
			$sql->bindValue(':id', $_GET['id']);
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			header('HTTP/1.1 200 hay datos');
			echo json_encode($sql->fetchAll());
			exit;
		} else {
			$sql = $pdo->prepare("SELECT * FROM tipocalzado");
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			header('HTTP/1.1 200 hay datos');
			echo json_encode($sql->fetchAll());
			exit;
		}
		
	}

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$sql = "INSERT INTO tipocalzado (tipoCalzado) VALUES (:tipoCalzado)";
		$stmt = $pdo->prepare($sql);

		$stmt->bindValue(':tipoCalzado', $_POST['tipoCalzado']);
		$stmt->execute();
		$idPost = $pdo->lastInsertId();
		if($idPost) {
			header('HTTP/1.1 200 Ok');
			echo json_encode($idPost);
			exit;
		}
	}

	if($_SERVER['REQUEST_METHOD'] == 'PUT') {
		$sql = "UPDATE tipocalzado SET tipoCalzado=:tipoCalzado WHERE id=:id";
		$stmt = $pdo->prepare($sql);

		$stmt->bindValue(':tipoCalzado', $_GET['tipoCalzado']);
		$stmt->bindValue(':id', $_GET['id']);
		$stmt->execute();
		header('HTTP/1.1 200 Ok');
		exit;
	}

?>