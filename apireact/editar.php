<?php 

include_once('conexao.php');

$postjson = json_decode(file_get_contents("php://input"), true);

 $query = $pdo->prepare("UPDATE dados SET nome = :nome, email = :email, senha = :senha WHERE id = :id ");
  
       $query->bindValue(":nome", $postjson['nome']);
       $query->bindValue(":email", $postjson['email']);
       $query->bindValue(":senha", $postjson['senha']);
       $query->bindValue(":id", $postjson['id']);
      
       $query->execute();
  
             
  
      if($query){
        $result = json_encode(array('success'=>true));
  
        }else{
        $result = json_encode(array('success'=>false));
    
        }
     echo $result;


?>