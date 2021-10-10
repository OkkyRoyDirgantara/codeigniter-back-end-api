<?php

namespace App\Models;

use CodeIgniter\Model;

class PostsModel extends Model
{
    //             "userId": 1,
    //             "id": 4,
    //             "title": "eum et est occaecati",
    //             "body": "ullam
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title', 'body'
    ];
}
