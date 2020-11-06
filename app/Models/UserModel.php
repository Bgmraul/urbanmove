<?php namespace App\Models;

    use CodeIgniter\Model;

    class UserModel extends Model{

        protected $table = 'usuario';
        protected $primaryKey = "UsuarioId";
        protected $allowedFields = ['Username', 'Contrasena', 'Email', 'Experiencia', 'Activo', 'Administrador'];

        public function getUsers($userName = false){

            if($userName === false){
                return $this->findAll();
            }

            return $this->asArray()
            ->where(['Username' => $userName ])
            ->first();
        }

        public function login($userName, $password){

            return $this->asArray()
            ->where(['Username' => $userName])
            ->where(['Contrasena' => $password])
            ->first();
        
        }

        
    }

?>