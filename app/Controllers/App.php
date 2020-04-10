<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\app_model;
 
class App extends Controller
{
    public function index()
    {
        $model = new app_model();
        $data['data'] = $model->readData();
        echo view('app_view',$data);
    }

    public function create()
    {
        $model = new app_model();
        $data = ['data'  => $this->request->getPost('data')];
        $model->createData($data);
        return redirect()->to('/app');
    }

    public function update()
    {
        $model = new app_model();
        $id = $this->request->getPost('id');
        $data = ['data'  => $this->request->getPost('data')];
        $model->updateData($data, $id);
        return redirect()->to('/app');
    }

    public function delete($id)
    {
        $model = new app_model();
        $model->deleteData($id);
        return redirect()->to('/app');
    }
 
}