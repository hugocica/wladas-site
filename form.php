<?php
$versao = 'v1.7';
$para_email = 'contato@w2obras.com.br';

if( PATH_SEPARATOR ==';'){ $quebra_linha="\r\n";
} elseif (PATH_SEPARATOR==':'){ $quebra_linha="\n";
} elseif ( PATH_SEPARATOR!=';' and PATH_SEPARATOR!=':' ) {echo ('Esse script não funcionará corretamente
neste servidor, a função PATH_SEPARATOR não retornou o parâmetro esperado.');
}

//pego os dados enviados pelo formulário
$de_nome = $_POST["nome"] .  ' ' . $_POST["sobrenome"];
$de_email = $_POST["email"];
$assunto = 'Contato via site W2 Obras';

//formato o campo da mensagem
$mensagem = 'Nome: ' . $de_nome . "<br>";
$mensagem .= 'E-mail: ' . $de_email . "<br><br>";
$mensagem .= 'Mensagem: ' . $_POST["mensagem"] . "<br><br>" . $versao;
//$mensagem = wordwrap( $mensagem, 50, "<br>", 1);

$headers = "MIME-Version: 1.0" . $quebra_linha . "";
$headers .= "Content-type: text/html; charset=iso-8859-1" . $quebra_linha . "";
$headers .= "From: $para_email " . $quebra_linha . "";
$headers .= "Return-Path: $de_email " . $quebra_linha . ""; 
//mail($de_email,$assunto,$mensagem, $headers, "-r".$para_email); echo "Email enviado com Sucesso!<br>" . $versao;
mail($para_email,$assunto,$mensagem, $headers, $de_email); echo "Email enviado com Sucesso!<br>" . $versao;
?>