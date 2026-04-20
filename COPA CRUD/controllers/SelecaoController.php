<?php
    require_once dirname(__DIR__) . '/config/database.php';
    require_once dirname(__DIR__) . '/models/Selecao.php';

    class SelecaoController {
        private $db;
        private $selecao;

        public function __construct() {
            $database = new Database();
            $this->db = $database->getConnection();
            $this->selecao = new Selecao($this->db);
        }

        public function listar(){
            $stmt = $this->selecao->read();
            $selecoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            require_once '../views/index.php';
        }

        public function criar(){
            require_once '../views/create.php';
        }

        public function salvar(){
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nome = trim($_POST['nome']);
                $grupo = trim($_POST['grupo']);
                
                if(empty($nome) || empty($grupo)) {
                    echo "Nome e Grupo são obrigatórios.";
                    return;
                }

                $this->selecao->nome = $nome;
                $this->selecao->grupo = $grupo;
                $this->selecao->titulos = $_POST['titulos'] ?? 0;

                if($this->selecao->create()) {
                    header("Location: index.php");
                } else {
                    echo "Erro ao salvar a seleção.";
                }
            }
        }

        // Atualiza os dados de uma equipe existente
    public function atualizar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Pega os dados enviados pelo formulário invisível (ID) e os campos visíveis
            $this->selecao->id = $_POST['id'];
            $this->selecao->nome = $_POST['nome'];
            $this->selecao->grupo = $_POST['grupo'];
            $this->selecao->titulos = $_POST['titulos'];


            if ($this->selecao->update()) {

                header("Location: index.php");
            } else {
                echo "Erro ao atualizar a equipe.";
            }
        }
    }

        public function editar($id){
            $this->selecao->id = $id;
            $this->selecao->readOne();
            require_once '../views/edit.php';
        }

        public function excluir($id){
            $this->selecao->id = $id;
            if($this->selecao->delete()) {
                header("Location: index.php");
            } else {
                echo "Erro ao excluir a seleção.";
            }
        }
    }
?>