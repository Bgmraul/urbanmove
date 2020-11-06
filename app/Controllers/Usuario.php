<?php namespace App\Controllers;

    use App\Models\UserModel;
    use CodeIgniter\Controller;
    use CodeIgniter\Model;

class Usuario extends BaseController{

        public function index(){
            $model = new UserModel();
            $data = [
                'usuario' => $model->getUsers(),
                'title' => 'Usuarios Registrados',
            ];

            echo view('templates/header', $data);
            echo view('users/overview', $data);
            echo view('templates/footer', $data);
        }

        public function view($userName = NULL){
            $model = new UserModel();
            $data['usuario'] = $model->getUsers($userName);

            if(empty($data['usuario'])){
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '. $userName);
            }

            $data['title'] = 'Usuario:' . $data['usuario']['Username'];

            echo view('templates/header', $data);
            echo view('users/view', $data);
            echo view('templates/footer', $data);
        }

        public function create(){
            $model = new UserModel();

            if($this->request->getMethod() === 'post' && $this->validate([
                'username' => 'required',
                'email' => 'required',
                'contrasena' => 'required'
            ])){

                $model->save([
                    'Username' => $this->request->getPost('username'),
                    'Email' => $this->request->getPost('email'),
                    'Contrasena' => $this->request->getPost('contrasena'),
                ]);
    
                echo view('users/success');
            }else{

                echo view('templates/header', ['title' => 'Create a new User']);
                echo view('users/create');
                echo view('templates/footer');
            }

        }

        public function userLogin(){

            if($this->request->getMethod() == 'post'){
                $userName = $_POST['username'];
                $pass = $_POST['contrasena'];

                $model = new UserModel();
                $user['usuario'] = $model->login($userName, $pass);

                if($user['usuario']){
                    $this->index();
                }else{
                    echo "No existe";
                }
 
            }

        }
    }