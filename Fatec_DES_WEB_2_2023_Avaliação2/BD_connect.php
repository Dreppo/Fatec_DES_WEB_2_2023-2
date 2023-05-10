<?php
class DBConnect {
    private $servername = "localhost";
    private $username ="root";
    private $password ="";
    private $dbname ="b_dados";
    private $conn;
     public function __construct() { 
            try {
                $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
                print_r($this->conn); 
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo "<br>" . $e->getMessage();
            }
        }
    
        public function __destruct() { 
            $this->fechar_conexao();
            print "DESTRU�DO: Objeto \n".$this->conn; 
        } 
    
        private function fechar_conexao(){
            $this->conn = null;
        }
    
        public function inserir_dados($id, $nome, $cpf, $telefone, $escola_publi){
            try {
                $sql = "INSERT INTO candidato (id, nome, cpf, telefone, escola_publi) VALUES ('". $id . "', '" . $nome . "', '". $cpf . "', '". $telefone . "', '". $escola_publi . "')";
                # print($sql);
                $this->conn->exec($sql);
            }catch(PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            }
            return True;
        }

            function select_dados(){
            $sql = "SELECT * FROM candidato";
            $result = $this->conn->query($sql);

            if ($result->rowCount() > 0) {
                echo "<table><tr><th>ID</th><th>Name</th><th>CPF</th><th>Telefone</th><th>Escola (1-Publica/2-Privada)</th></tr>";
                // output data of each row
                while($row = $result->fetch()) {
                    echo "<tr><td>".$row["id"]."</td><td>".$row["nome"]." ".$row["cpf"]."</td><td>".$row["telefone"]." ".$row["escola_publi"]."</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
        }

        function atualiza(){
        $sql = "UPDATE authors SET lastname='Doe' WHERE authorid=1";
        $stmt = $this->conn->prepare($sql);
        }

        function deleta(){
        $sql = "DELETE nome FROM candidato WHERE id=4";
        $this->conn->exec($sql);   
        }
    }
?>