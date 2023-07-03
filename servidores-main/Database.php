<?php

namespace App\Db;
use \PDO;
use PDOException;

class Database{

    /**
     * Host de Conexão com Banco de dados
     * @var string
     */
    const HOST = 'localhost';

     /**
     * Nome do Banco de Dados
     * @var string
     */
    const NAME = 'servidores';

     /**
     * Usuário do Banco de Dados
     * @var string
     */
    const USER = 'root';
    
     
     /**
      * Senha de acesso ao Banco de Dados
      * @var string
     */
     const PASS = '';

     /**
      * Nome da tabela a ser manipulada
      * @var string
     */
    private $table;

     /**
      * Instância de Bando de dados
      * @var PDO
     */
    private $connection;

    /**
      * Define a tabela e instancia a conexão
      * @param string
     */
    public function __construct($table = null){

        $this->table = $table;
        $this->setConnection();
    }

   /**
      * Método responsável por criar a conexão com o banco de dados
      *
     */
    private function setConnection(){
        try{
            $this->connection = new PDO('mysql:host=' .self::HOST.';dbname='.self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){
            die('ERROR: ' .$e->getMessage());
        }
    }
    /**
      * Método responsável por executar queries dentro do bando de dados 
      * @param string $query
      * @param array $params 
      * @return PDOStatement
      */
    public function execute($query,$params = []){
        try{
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;

        }catch(PDOException $e){
        die('ERROR: ' .$e->getMessage());
        }
    }
    
        
    /**
      * Método responsável por inserir dados no banco 
      * @param array $values [ field => value ]
      * @return integer ID inserido 
      */
    public function insert($values){

    //Dados da Query 
    $fields = array_keys($values);
    $binds = array_pad([], count($fields),'?');

    //Monta a Query
    $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

    //Executa o Insert
    $this->execute($query, array_values($values)); 
    
    //Retorna oo Id inserido 
    return $this->connection->lastInsertId();

    }

    /**
      * Método responsável por fazer consultas no banco 
      * @param string $where
      * @param string $order
      * @param string $limit
      * @param string $fields
      * @return PDOStatement
      */
    public function select($where = null, $order = null, $limit = null, $fields = '*'){
        //Dados da Query
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';
    
        //Monta a Query
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where. ' '.$order.' '.$limit;

        //Executa a Query
        return $this->execute($query);

    }
        /**
      * Método responsável por atualizar dados no banco 
      * @param string $where
      * @param array $values [ field => value ]
      * @return boolean
      */
        public function update($where, $values){

            //Dados da Query
            $fields = array_keys($values);

            //Monta a Query
            $query = 'UPDATE '. $this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where; 

            //Executar a Query
            $this->execute($query, array_values($values));

            //Retorna Sucesso
            return true;
           
        }

        /**
         * Método responsável por excluir dados no banco 
        * @param string $where
        * @return boolean
        */
        public function delete($where){
            
            //Monta a Query
            $query = 'DELETE FROM '.$this->table.' WHERE '.$where;        
        
            //Executa a Query
            $this->execute($query);

            //Retorna Sucesso
            return true;

        }

}