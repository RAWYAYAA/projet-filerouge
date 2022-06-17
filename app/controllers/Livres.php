<?php
class Livres extends Controller
{

    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }

        $this->livreModel = $this->model('Livre');
        // $this->userModel = $this->model('User');
    }

    public function index()
    {
        $livres = $this->livreModel->getLivres();
        $data = [
            'livres' => $livres,
        ];

        $this->view('livres/index', $data);
    }

    public function add()
    {
        $body = [
            'id' => '',
            'image' => '',
            'titre' => '',
            'type' => '',
            'ecrivain' => '',
            'type_err'     => '',
            'titre_err'      => '',
            'ecrivain_err' => '',
            'image_err' => '',
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'image' => '',
                'type'         => trim($_POST['type']),
                'titre'          => trim($_POST['titre']),
                'ecrivain'          => trim($_POST['ecrivain']),
                'user_id'       => $_SESSION['user_id'],
                'type_err'     => '',
                'titre_err'      => '',
                'ecrivain_err' => '',
                'image_err' => '',
            ];
            // validate image

            if (!empty($_FILES["img"]["name"])) {
                // Get file info 
                $fileName = basename($_FILES["img"]["name"]);
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
                // Allow certain file formats 
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                if (in_array($fileType, $allowTypes)) {
                    $image = $_FILES['img']['tmp_name'];
                    $imgContent = addslashes(file_get_contents($image));
                    $data['image'] = $imgContent;
                } else {
                    $data['image_err'] = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
                }
            } else {
                $data['image_err'] = 'Please select an image file to upload.';
            }
            //validate title
            if (empty($data['titre'])) {
                $data['titre_err'] = 'Please enter title';
            }

            //validate body
            if (empty($data['type'])) {
                $data['type_err'] = 'Please enter type';
            }
            //
            if (empty($data['ecrivain'])) {
                $data['ecrivain_err'] = 'Please enter ecrivain';
            }
            //check if errors are present
            if (empty($data['title_err']) && empty($data['type_err']) && empty($data['ecrivain_err']) && empty($data['image_err']) && empty($data['image_err'])) {
                if ($this->livreModel->addLivres($data)) {

                    redirect('livres');
                } else {
                    die('Something went wrong');
                }
            } else {
                //load view with errors
                $data['action'] = 'add';

                $this->view('livres/add', $data);
            }
        } else {
            $data = [
                'titre' => 'editer un livre',
                'action' => 'add',
                'titre' => '',
                'type'  => '',
                'ecrivain'  => '',
                'body' => $body,
                'image' => '',

            ];

            $this->view('livres/add', $data);
        }
    }
    public function edit($id)
    {
        // Get data livre
        $livreId = $this->livreModel->getLivreById($id);
        // init body
        $body = [
            'id' => $livreId->id,
            'titre' => $livreId->titre,
            'type' => $livreId->type,
            'ecrivain' => $livreId->ecrivain,
            'image' => $livreId->image,
        ];

        // get existing post from model
        $livre = $this->livreModel->getLivreById($id);
        //check for owner
        $data = [
            'titre' => 'editer un livre',
            'action' => 'edit',
            'image' => $livre->image,
            'id' => $livre->id,
            'titre' => $livre->titre,
            'type'  => $livre->type,
            'ecrivain'  => $livre->ecrivain,
            'body' => $body,
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'titre' => 'editer un livre',
                'action' => 'edit',
                'id' => $livreId->id,
                'type'         => trim($_POST['type']),
                'titre'          => trim($_POST['titre']),
                'ecrivain'          => trim($_POST['ecrivain']),
                'image'       => '',
                'type_err'     => '',
                'titre_err'      => '',
                'ecrivain_err' => '',
                'image_err' => '',
            ];

            // validate image

            if (!empty($_FILES["img"]["name"])) {
                // Get file info 
                $fileName = basename($_FILES["img"]["name"]);
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
                // Allow certain file formats 
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                if (in_array($fileType, $allowTypes)) {
                    $image = $_FILES['img']['tmp_name'];
                    $imgContent = addslashes(file_get_contents($image));
                    $data['image'] = $imgContent;
                } else {
                    $data['image_err'] = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
                }
            } else {
                $data['image_err'] = 'Please select an image file to upload.';
            }
            //validate title
            if (empty($data['titre'])) {
                $data['titre_err'] = 'Please enter title';
            }

            //validate body
            if (empty($data['type'])) {
                $data['type_err'] = 'Please enter type';
            }
            //
            if (empty($data['ecrivain'])) {
                $data['ecrivain_err'] = 'Please enter ecrivain';
            }
            //check if errors are present
            if (empty($data['title_err']) && empty($data['type_err']) && empty($data['ecrivain_err']) && empty($data['image_err'])) {
                if ($this->livreModel->editLivres($data)) {


                    redirect('livres');
                } else {
                    die('Something went wrong');
                }
            } else {
                //load view with errors
                $data['action'] = 'edit';
                $this->view('livres/add', $data);
            }
        } else {
            $this->view('livres/add', $data);
        }
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if ($this->livreModel->deleteLivre($id)) {

                redirect('livres');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('livres');
        }
    }
}
