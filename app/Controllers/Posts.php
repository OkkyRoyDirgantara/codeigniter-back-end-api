<?php

namespace App\Controllers;

use App\Models\PostsModel;
use CodeIgniter\RESTful\ResourceController;

// use App\Controllers\BaseController;

class Posts extends ResourceController
{
    protected $modelName = 'App\Models\PostsModel';
    protected $format = 'json';
    public function index()
    {
        return $this->respond($this->model->orderBy('id', 'DESC')->findAll(), 200);
    }

    public function create()
    {
        if ($this->request) {
            if ($this->request->getJSON()) {

                $json = $this->request->getJSON();

                $post = $this->model->insert([
                    'id' => $json->id,
                    'userId' => $json->userId,
                    'title'     => $json->title,
                    'body'   => $json->body
                ]);
            } else {

                //get request from Postman and more
                $post = $this->model->insert([
                    'id' => $this->request->getPost('id'),
                    'userId' => $this->request->getPost('userId'),
                    'title'     => $this->request->getPost('title'),
                    'body'   => $this->request->getPost('body')
                ]);
            }

            return $this->respond([
                'statusCode' => 201,
                'message'    => 'Data Berhasil Disimpan!',
            ], 201);
        }
    }

    public function delete($id = null)
    {
        $post = $this->model->find($id);

        if ($post) {

            $this->model->delete($id);

            return $this->respond([
                'statusCode' => 200,
                'message'    => 'Data Berhasil Dihapus!',
            ], 200);
        }
    }

    public function update($id = null)
    {
        $post = $this->model;
        if ($this->request->getJSON()) {

            $json = $this->request->getJSON();

            $post->update($json->id, [
                'id' => $json->id,
                'userId' => $json->userId,
                'title'     => $json->title,
                'body'   => $json->body
            ]);
        } else {

            //get request from Postman and more
            $data = $this->request->getRawInput();
            $post->update($id, $data);
        }

        return $this->respond([
            'statusCode' => 200,
            'message'    => 'Data Berhasil Diupdate!',
        ], 200);
    }
}
