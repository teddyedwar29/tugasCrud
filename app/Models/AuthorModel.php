<?php

namespace App\Models;

use CodeIgniter\Model;
 
class AuthorModel extends Model
{
    protected $table = 'author';
    protected $primaryKey = 'id_author';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_author',
        'nama_author',
        'prodi',
        'afiliasi',
        'email',
        'wa'
    ];

    // Validation
    protected $validationRules = [];

    public function search($keyword) {
        $this->where('id_author', $keyword);
        $this->orLike('nama_author', $keyword, 'both');
        return $this->findAll();
    }

}