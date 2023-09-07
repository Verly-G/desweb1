<?php
    require_once("../model/autenticar.php");
    require_once("../model/funcoesUtil.php");
    $conexao = getConexao();
    $id = (isset($_GET["id"]) && $_GET["id"] >0) ? $_GET["id"] : null;
    if($id!=null && $autenticado===true){
        try{
            $sql = "SELECT id,nome FROM usuarios WHERE id = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            responder(false,"Usuário de id {$id} obtido com sucesso.",$stmt->fetchAll(PDO::FETCH_ASSOC)[0]);
        }catch(PDOException $e){
            responder(true,"Erro ao obter usuário. {$e->getMessage()}");
        }
    }else
        responder(true,"informações não recebidas");
?>