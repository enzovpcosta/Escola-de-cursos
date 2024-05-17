<?php 

namespace classes\class;

use \Classes\Db\Database;

use PDO;

class Prof{
    
    public $idProfessor;
    public $Nome;
    public $CPF;
    public $Telefone;
    public $Nascimento;
    public $Curso;
    public $senha;

    public function cadastrar(){
        $obDatabase = new Database('professores');
        $this->idProfessor = $obDatabase->insert([
            'Nome' => $this->Nome,
            'CPF' => $this->CPF,
            'Telefone' => $this->Telefone,
            'Nascimento' => $this->Nascimento,
            'Curso' => $this->Curso,
            'senha' => $this->senha
        ]);
        return true;
    }

    public function atualizar(){
        return (new Database('professores'))->update('idProfessor = '.$this->idProfessor,[
            'Nome' => $this->Nome,
            'CPF' => $this->CPF,
            'Telefone' => $this->Telefone,
            'Nascimento' => $this->Nascimento,
            'Curso' => $this->Curso
        ]);
    }

    public function excluir(){
        return (new Database('professores'))->delete('idProfessor = '.$this->idProfessor);
    }

    public static function getProfessores($where = null, $order = null, $limit = null){
        return (new Database('professores'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getProfessor($idProfessor){
        return (new Database('professores'))->select('idProfessor = '.$idProfessor)->fetchObject(self::class);
    }
}
?>