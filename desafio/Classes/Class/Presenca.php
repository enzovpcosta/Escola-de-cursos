<?php 

namespace classes\class;

use \Classes\Db\Database;

use PDO;

class Presenca{
    
    public $idPresenca;
    public $Aluno;
    public $Titulo;
    public $Professor;
    public $Curso; 
    public $Data;
    public $Status;

    public function cadastrar(){
        $obDatabase = new Database('presenca');
        $this->idPresenca = $obDatabase->insert([
            'Aluno' => $this->Aluno,
            'Titulo' => $this->Titulo,
            'Professor' => $this->Professor,
            'Curso' => $this->Curso,
            'Data' => $this->Data,
            'Status' => $this->Status
        ]);
        return true;
    }

    public function atualizar(){
        return (new Database('presenca'))->update('idPresenca = '.$this->idPresenca,[
            'Aluno' => $this->Aluno,
            'Titulo' => $this->Titulo,
            'Professor' => $this->Professor,
            'Curso' => $this->Curso,
            'Data' => $this->Data,
            'Status' => $this->Status
        ]);
    }

    public function excluir(){
        return (new Database('presenca'))->delete('idPresenca = '.$this->idPresenca);
    }

    public static function getPresencas($where = null, $order = null, $limit = null){
        return (new Database('presenca'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getPresenca($idPresenca){
        return (new Database('presenca'))->select('idPresenca = '.$idPresenca)->fetchObject(self::class);
    }
}
?>