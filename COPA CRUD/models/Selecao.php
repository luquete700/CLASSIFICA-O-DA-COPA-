<?php
    class Selecao {
        private $conn;
        private $table_name = "selecoes";

        public $id;
        public $nome;
        public $grupo;
        public $titulos;
        public $criado_em;
    
        public function __construct($db) {
        $this->conn = $db;
    }


    public function create() {

        $query = "INSERT INTO " . $this->table_name . " SET nome=:nome, grupo=:grupo, titulos=:titulos";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":grupo", $this->grupo);
        $stmt->bindParam(":titulos", $this->titulos);

        return $stmt->execute();
    }

    public function read() {
        $query = "SELECT * FROM selecoes ORDER BY criado_em DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readOne() {
        $query = "SELECT * FROM selecoes WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $row['id'];
        $this->nome = $row['nome'];
        $this->grupo = $row['grupo'];
        $this->titulos = $row['titulos'];
        $this->criado_em = $row['criado_em'];
    }

    public function update() {
        $query = "UPDATE selecoes SET nome = :nome, grupo = :grupo, titulos = :titulos WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":grupo", $this->grupo);
        $stmt->bindParam(":titulos", $this->titulos);
        $stmt->bindParam(":id", $this->id);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM selecoes WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
    }

?>