<?php
namespace App\Entity;

use \App\Db\Database;

use \PDO;

class Vaga{
    /** Identificador único da vaga
     * @var integer
     */
    public $id;

    /** Nome do Servidor Solicitante 
     * @var string
    */
    public $nome;

    /** Masp do Servidor Solicitante 
     * @var string
    */
    public $masp;

    /** Setor 
     * @var string
    */
    public $setor;

    /** Descrição  
     * @var string
    */
    public $descricao;

    /** Efetiro
     * @var string(s/n)
    */
    public $efetivo;

    /** Data de Publicação da solicitação                               
     * @var string
    */                         
    public $data;

    /** Método responsável pelo cadastro de nova solicitação de vaga 
     * @return boolean 
    */

    public function cadastrar(){

    //DEFINIR A DATA
    $this->data = date('Y-m-d H:i:s');                               
        
    //INSERIR VAGA NO BANCO
    $obDatabase = new Database('servidores_table');
    $this->id = $obDatabase->insert([
                                    'nome'          =>$this->nome,
                                    'masp'          =>$this->masp,
                                    'setor'         =>$this->setor,
                                    'descricao'     =>$this->descricao,
                                    'efetivo'       =>$this->efetivo,
                                    'data'          =>$this->data    
                                    ]);

    //RETORNAR SUCESSO
    return true;
                                }

    /** Método responsável por atuaizar a solicitação no banco de dados                             
     * @return boolean
    */ 
    public function atualizar(){
        return (new Database('servidores_table'))->update('id =' .$this->id, [
                                                                                'nome'          =>$this->nome,
                                                                                'masp'          =>$this->masp,
                                                                                'setor'         =>$this->setor,
                                                                                'descricao'     =>$this->descricao,
                                                                                'efetivo'       =>$this->efetivo,
                                                                                'data'          =>$this->data 
                                                                            ]);

    }

    /** Método responsável por excluir a solicitação                           
     * @return boolean
    */ 
    public function excluir(){

        return (new Database('servidores_table'))->delete('id= ' .$this->id);
        }

    /** Método responsável por obter as solicitações do banco de dados
    * @param string $where
    * @param string $order
    * @param string $limit
    * @return array 
    */  
    public static function getVagas($where = null, $order = null, $limit = null){
            return (new Database('servidores_table'))->select($where,$order,$limit)
                                                    ->fetchAll(PDO::FETCH_CLASS, self::class);
            }

    /** Método responsável por buscar uma vaga pelo ID                              
     * @param string $id
     * @return Vaga 
    */  
    public static function getVaga($id){
        return (new Database('servidores_table'))->select('id ='.$id)
                                                 ->fetchObject(self::class);
        }
    

}