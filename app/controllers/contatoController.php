<?php

require_once __DIR__ . "/../../config/database.php";
require_once __DIR__ . "/../models/Contato.php";
require_once __DIR__ . "/../../vendor/autoload.php"; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContatoController {
    private $contato;

    public function __construct() {
        $pdo = require __DIR__ . "/../../config/database.php";
        $this->contato = new Contato($pdo);
    }

    // FUNÇÃO PARA EXIBIR O FORMULÁRIO

    public function index($msg = '') {
        require __DIR__ . "/../views/contato/formulario.php";
    }

    // FUNÇÃO PARA SALVAR O CONTATO NO BANCO

    public function salvarContato() {
        if (!empty($_POST)) {
            $nome = $_POST['nome'] ?? '';
            $email = $_POST['email'] ?? '';
            $telefone = $_POST['telefone'] ?? '';
            $mensagem = $_POST['mensagem'] ?? '';

            if ($this->contato->salvarContato($nome, $email, $telefone, $mensagem)) {
                $enviado = $this->enviarEmail($nome, $email, $telefone, $mensagem);
                $msg = "";
            } else {
                $msg = "Erro ao enviar contato!";
            }
        } else {
            $msg = 'Não foi possivel salvar!';
        }

        $this->index($msg);
    }

    public function listar() {
        $contatos = $this->contato->listarContato();
        include __DIR__ . '../../../views/contato/listarContato.php';
    }

    // FUNÇÃO PARA ENVIAR EMAIL PARA A EMPRESA

    private function enviarEmail($nome) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.escalaweb.com.br';
            $mail->SMTPAuth = true;
            $mail->Username = 'teste@escalaweb.com.br';
            $mail->Password = 'TWhTD#36';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('teste@escalaweb.com.br', 'Contato');
            $mail->addAddress('teste@escalaweb.com.br'); 

            $mail->isHTML(true);
            $mail->Subject = "Novo Contato!";
            $mail->Body = "Recebemos um novo contato de $nome!";

            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Erro ao enviar e-mail: {$mail->ErrorInfo}");
            return false;
        }
    }
}
