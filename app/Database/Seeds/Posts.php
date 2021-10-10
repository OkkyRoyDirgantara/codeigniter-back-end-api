<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Posts extends Seeder
{
    public function run()
    {
        $newsData = [
            [
                'id' => 1,
                'userId' => 1,
                'title' => "Halo semua",
                'body' => "apa kabar"
            ],
            [
                'id' => 2,
                'userId' => 1,
                'title' => "Halo semua",
                'body' => "apa kabar"
            ],
            [
                'id' => 3,
                'userId' => 1,
                'title' => "Halo semua",
                'body' => "apa kabar"
            ]
        ];

        foreach ($newsData as $data) {
            $this->db->table('posts')->insert($data);
        }
    }
}
