<!doctype html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Cadastro Básico</title>
	</head>
	
	<body>
		<h1>Cadastro Básico</h1>
		
		<?php
		$nome		 = $_GET["nome"];
		$nascimento	 = $_GET["nascimento"];
		$sexo		 = $_GET["sexo"];
		$estadoCivil = $_GET["estadoCivil"];
		$email		 = $_GET["email"];
		$ddd1		 = $_GET["ddd1"];
		$telefone1 	 = $_GET["telefone1"];
		$tipo1		 = $_GET["tipo1"];
		$ddd2		 = $_GET["ddd2"];
		$telefone2   = $_GET["telefone2"];
		$tipo2		 = $_GET["tipo2"];
		$ddd3 		 = $_GET["ddd3"];
		$telefone3   = $_GET["telefone3"];
		$tipo3		 = $_GET["tipo3"];
		$obs		 = $_GET["obs"];

		if($nome=="")
		{
			die("Seu <b>Nome</b> deve ser informado. Sistema interrompido!");
		}
		
		if($nascimento=="")
		{
			die("Sua <b>Data de Nascimento</b> deve ser informada. Sistema interrompido!");
		}
		
		if ($estadoCivil=="")
		{
			die("Seu <b>Estado Civil</b> deve ser informado. Sistema interrompido!");
		}
		
		if ($email=="")
		{
			die("Seu <b>Email</b> deve ser informado. Sistema interrompido!");
		}
		
		
		if (($ddd1=="" or $telefone1=="" or $tipo1=="") and ($ddd2=="" or $telefone2=="" or $tipo2=="") and ($ddd3=="" or $telefone3=="" or $tipo3==""))
		{
			die("Você deve informar um <b>DDD</b> seguido de um <b>Número</b> e selecionar seu <b>Tipo</b>. Sistema interrompido!");
		} 
		
		echo "Seu nome é: <b>$nome</b><br><br>";
		echo "Sua data de nacimento é <b>$nascimento</b><br><br>";
		echo "Seu sexo é: <b>$sexo</b><br><br>";
		echo "Seu estado civil é: <b>$estadoCivil</b><br><br>";
		echo "Seu e-mail é: <b>$email</b><br><br>";
		echo "Seu(s) número(s) de telefone: <br><b>({$ddd1}) {$telefone1}, {$tipo1}</b><br>"; 
		
		                                         if ($ddd2 != 0 and $telefone2 != 0 and $tipo2 != 0) 
												 {
											     echo "<b>({$ddd2}) {$telefone2}, {$tipo2}</b><br>";
											     }
												 if ($ddd3 != 0 and $telefone3 != 0 and $tipo3 != 0) 
												 {
												 echo "<b>({$ddd3}) {$telefone3}, {$tipo3}</b><br>";
												 }
												 
		$con = mysqli_connect("localhost", "root", "");
		
		mysqli_select_db( $con, "sistema") or 
			die(    
				"Erro na seleção do banco de dados:<br>" . 
					mysqli_error($con)
			);
		
		$sql = "INSERT INTO clientes (  nome,     nascimento,     sexo,     estadoCivil,     email,    ddd1,   telefone1,    tipo1,    ddd2,   telefone2,   tipo2,     ddd3,  telefone3,    tipo3,     obs) 
		                      VALUES ('$nome','$nascimento','$sexo','$estadoCivil','$email',$ddd1,$telefone1,'$tipo1','$ddd2','$telefone2','$tipo2','$ddd3','$telefone3','$tipo3','$obs')";
		
		//die($sql);		
		
		mysqli_query($con, $sql) or 
			die(
				"Erro na inserção do Cadastro Básico: <br>" .
					mysqli_error($con) 
			);
		
		
		echo "<br><br><hr><b>$nome</b>, seu cadastro foi inserido com sucesso!<hr>";
		?>		
	</body>
</html>