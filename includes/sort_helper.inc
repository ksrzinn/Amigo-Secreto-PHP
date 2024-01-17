<?php

    class Participante{
        public $nome;
        public $amigoSecreto;
        
        public function __construct($nome){
            $this->nome = $nome;
        }
    }
    
    class AmigoSecreto{
        public $participantes = [];
        public $paresAmigos = [];
        
        public function adicionarParticipante($nome){
            $participante = new Participante($nome);
            $this->participantes[] = $participante->nome;
            return $participante;
        }
        
        public function realizarSorteio(){
            $participantesEmbaralhados = $this->participantes;
            shuffle($participantesEmbaralhados);
            $this->paresAmigos = array_map(null, $participantesEmbaralhados, array_merge(array_slice($participantesEmbaralhados, 1), [$participantesEmbaralhados[0]]));
        }
        
        public function exibirSorteio(){
            foreach ($this->paresAmigos as list($amigo, $presenteado)){
                echo "
                    <li>
                        <p>$amigo saiu com $presenteado</p>
                    </li>
                ";
            }
        }
    }

$amigoSecreto = new AmigoSecreto();
include '../includes/connect_mysql.inc';
$sql = "SELECT nome FROM `cadastro`";
$result = $con->query($sql);
        
while($row = $result->fetch_assoc()): 
    $amigoSecreto->adicionarParticipante($row["nome"]);
endwhile;

$amigoSecreto->realizarSorteio();
        
$amigoSecreto->exibirSorteio();

?>