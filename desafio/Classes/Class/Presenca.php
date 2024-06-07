<?php 

namespace classes\class;

use \Classes\Db\Database;

class Presenca{
    
    public $idPresenca;
    public $idAluno;
    public $idAula;
    public $Status;

    public function cadastrar(){
        $obDatabase = new Database('presenca');
        $this->idPresenca = $obDatabase->insert([
            'idAluno' => $this->idAluno,
            'idAula' => $this->idAula,
            'Status' => $this->Status
        ]);
        return true;
    }

    public function atualizar(){
        return (new Database('presenca'))->update('idPresenca = '.$this->idPresenca,[
            'idAluno' => $this->idAluno,
            'idAula' => $this->idAula,
            'Status' => $this->Status
        ]);
    }

    public function excluir(){
        return (new Database('presenca'))->delete('idPresenca = '.$this->idPresenca);
    }

    public static function getPresenca($idPresenca){
        return (new Database('presenca'))->select('idPresenca = '.$idPresenca)->fetchObject(self::class);
    }
}
?>