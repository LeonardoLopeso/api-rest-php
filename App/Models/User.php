<?php

    namespace App\Models;

    class User 
    {

        private static $table = 'user';

        // return user id
        public static function select(int $id) {

            $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);

            $sql = 'SELECT * FROM '.self::$table.' WHERE id = :id';
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            if( $stmt->rowCount() > 0 ) {
                return $stmt->fetch(\PDO::FETCH_ASSOC);
            }else{
                throw new \Exception("Nenhum usuário encontrado!");
            }
        }

        // reurn all user
        public static function selectAll() {

            $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);

            $sql = 'SELECT * FROM '.self::$table;
            $stmt = $connPdo->prepare($sql);
            $stmt->execute();

            if( $stmt->rowCount() > 0 ) {
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            }else{
                throw new \Exception("Nenhum usuário encontrado!");
            }
        }

        // insert new user in database
        public static function insert($data) {
            
            $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);

            $sql = 'INSERT INTO '.self::$table.' (email, name, password) VALUES (:em, :na, :pa)';
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':em', $data['email']);
            $stmt->bindValue(':na', $data['name']);
            $stmt->bindValue(':pa', $data['password']);
            $stmt->execute();

            if( $stmt->rowCount() > 0 ) {
                return 'Usuário(a) inserido com sucesso!';
            }else{
                throw new \Exception("Falha ao inserir usuário(a)!");
            }
        }

        public static function delete($id) {


            // this method not finish
            $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);

            $sql = 'DELETE FROM '.self::$table.' WHERE id = '.$id;
            $stmt = $connPdo->prepare($sql);
            $stmt->execute();

            if( $stmt->execute() ) {
                return 'Usuário(a) deletado!';
            }else{
                throw new \Exception("Falha ao deletar usuário(a)!");
            }
        }

    }