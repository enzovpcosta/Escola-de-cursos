<?php 

namespace classes\class;

use \Classes\Db\Database;

use PDO;

class Aula{
    
    public $idAula;
    public $Titulo;
    public $Descricao;
    public $idProfessor;
    public $Data;
    public $Curso;

    public function cadastrar(){
        $obDatabase = new Database('aulas');
        $this->idAula = $obDatabase->insert([
            'Titulo' => $this->Titulo,
            'Descricao' => $this->Descricao,
            'idProfessor' => $this->idProfessor,
            'Data' => $this->Data,
            'Curso' => $this->Curso
        ]);
        return true;
    }

    public function atualizar(){
        return (new Database('aulas'))->update('idAula = '.$this->idAula,[
            'Titulo' => $this->Titulo,
            'CPF' => $this->Descricao,
            'idProfessor' => $this->idProfessor,
            'Data' => $this->Data,
            'Curso' => $this->Curso
        ]);
    }

    public function excluir(){
        return (new Database('aulas'))->delete('idAula = '.$this->idAula);
    }

    public static function getAulas($where = null, $order = null, $limit = null){
        return (new Database('aulas'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getAula($idAula){
        return (new Database('aulas'))->select('idAula = '.$idAula)->fetchObject(self::class);
    }
}
?>