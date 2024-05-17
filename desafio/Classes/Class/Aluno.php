<?php 

namespace classes\class;

use \Classes\Db\Database;

use PDO;

class Aluno{
    
    public $idAluno;
    public $Nome;
    public $CPF;
    public $Telefone;
    public $Nascimento;
    public $Responsavel;

    public function cadastrar(){
        $obDatabase = new Database('alunos');
        $this->idAluno = $obDatabase->insert([
            'Nome' => $this->Nome,
            'CPF' => $this->CPF,
            'Telefone' => $this->Telefone,
            'Nascimento' => $this->Nascimento,
            'Responsavel' => $this->Responsavel
        ]);
        return true;
    }

    public function atualizar(){
        return (new Database('alunos'))->update('idAluno = '.$this->idAluno,[
            'Nome' => $this->Nome,
            'CPF' => $this->CPF,
            'Telefone' => $this->Telefone,
            'Nascimento' => $this->Nascimento,
            'Responsavel' => $this->Responsavel
        ]);
    }

    public function excluir(){
        return (new Database('alunos'))->delete('idAluno = '.$this->idAluno);
    }

    public static function getAlunos($where = null, $order = null, $limit = null){
        return (new Database('alunos'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getAluno($idAluno){
        return (new Database('alunos'))->select('idAluno = '.$idAluno)->fetchObject(self::class);
    }
}
?>