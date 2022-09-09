<?php
require_once('connection.php');
?>
<?php



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

/*
		----NAOFUNCIONA--- VERIFICACAO SE EMAIL EXISTE NO BD ----NAOFUNCIONA-----
	if(isset($_POST['enviar'])){
		$email = $_POST['email'];
		$query = $pdo->prepare("SELECT * FROM formulario_teste WHERE email = ?");
$query->execute([$email]);
$result = $query->rowCount();
if($result > 0 ){
	$error = "<span class='text-danger'>Email taken</span>";
}

	} */


	
$name = $_POST['name'];
$email = $_POST['email'];
$cpf = base64_encode($_POST['cpf']);


		$sql = "INSERT INTO formulario_teste (name, email, cpf ) VALUES(?,?,?)";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$name, $email, $cpf]);
		if($result){
			echo 'Adicionado com sucesso!';
		}else
			echo 'Houve erros salvando seu cadastro';
		    
} if ($_SERVER['REQUEST_METHOD'] == 'GET') {


	
	
			$sql = "SELECT * FROM formulario_teste ORDER BY id DESC";
			$stmtinsert = $db->prepare($sql);
			$stmtinsert->execute();
			$a = $stmtinsert->fetchAll(PDO::FETCH_ASSOC);
			$a = json_encode($a);
			echo $a;

		

		

		};
