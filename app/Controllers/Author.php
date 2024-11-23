<?php

namespace App\Controllers;
use App\Models\AuthorModel;

class  Author extends BaseController
{
    protected $authorModel;
    public function __construct()
    {
        $this->authorModel = new AuthorModel();
    }
    public function index()
    {
        $authorModel = new AuthorModel();
        $keyword = $this->request->getPost('keyword');

        if($keyword) {
            $result = $authorModel->search($keyword);
        } else {
            $result = $authorModel->paginate(5,'author');
        }


       // $author = $this->authorModel -> findAll();

        $currentPage = $this->request->getVar('page_author') ? $this->request->getVar('page_author') : 1;

        $data = 
        [
            "tittle" => 'Halaman Author',
            "author" => $result,
            'pager' => $authorModel -> pager,
            'keyword' => $keyword,
            'currentPage' => $currentPage
        ];
        // cara connect db tanpa model
        // $db = \Config\Database::connect();```````````````
        // $author = $db->query("SELECT * FROM author");
        // foreach($author->getResultArray()as $row) {
        //     d($row);
        // }

        return view('author/index',$data);
    }

    public function create()
    {
        $data = 
        [
            'tittle' => 'Form Tambah Data Author'
        ];
        return view('author/create',$data);
    }

    public function save()
    {
        
        // inisialisasi model
        $authorModel = new AuthorModel();

        $rules = [
            'id_author'=> [
            'rules' => 'required|is_unique[author.id_author]',
            'errors' => [
                'required'=> '{field} wajib diisi',
                'is_unique' => 'Maaf {field} sudah digunakan'
            ]
            ],
        'nama_author'=> [
            'rules' => 'required',
            'errors' => [
                'required'=> '{field} wajib diisi'
                
            ]
            ],
        'prodi'=> [
            'rules' => 'required',
            'errors' => [
                'required'=> '{field} wajib diisi'
                
            ]
            ],
        'afiliasi'=> [
            'rules' => 'required',
            'errors' => [
                'required'=> '{field} wajib diisi'
                
            ]
            ],
        'email'=> [
            'rules' => 'required',
            'errors' => [
                'required'=> '{field} wajib diisi'
                
            ]
            ],
        'wa'=> [
            'rules' => 'required',
            'errors' => [
                'required'=> '{field} wajib diisi'
                
            ]
            ],
        ];

        if(!$this->validate($rules)) {
            // session()->setFlashdata('errors',$this->validator->listErrors());
            return redirect()->back()->withInput()->with('errors',$this->validator->listErrors());
        }

        // mengambil data dari form
        $data = [
                'id_author' => $this->request->getVar('id_author'),
                'nama_author' => $this->request->getVar('nama_author'),
                'prodi' => $this->request->getVar('prodi'),
                'afiliasi' => $this->request->getVar('afiliasi'),
                'email' => $this->request->getVar('email'),
                'wa' => $this->request->getVar('wa')
        ];

        // insert data kedalam tabel author
        $authorModel->insert($data);

        session()->setFlashData('pesan', 'Data Berhasil ditambahkan');

        return redirect()->to('/author');

    }

    public function delete ($id_author) {
        $authorModel = new AuthorModel();
        $authorModel->where('id_author',$id_author)->delete();
    
       // session()->setFlashdata('pesan', 'Berhasil Dihapus');
        return redirect()->to('author')->with('pesan', 'Berhasil Dihapus');
    }

    public function edit($id_author) {
        $authorModel = new AuthorModel();


        $data = [
            "tittle" => "Halaman Edit",
            "author" => $authorModel->where('id_author',$id_author)->first()

        ];
        return view('author/edit',$data);
    }

    public function update($id_author) {
        $authorModel = new AuthorModel();

        // validasi edit
        $rules = [
            'id_author'=> [
            'rules' => 'required',
            'errors' => [
                'required'=> '{field} wajib diisi'
            ]
            ],
        'nama_author'=> [
            'rules' => 'required',
            'errors' => [
                'required'=> '{field} wajib diisi'
                
            ]
            ],
        'prodi'=> [
            'rules' => 'required',
            'errors' => [
                'required'=> '{field} wajib diisi'
                
            ]
            ],
        'afiliasi'=> [
            'rules' => 'required',
            'errors' => [
                'required'=> '{field} wajib diisi'
                
            ]
            ],
        'email'=> [
            'rules' => 'required',
            'errors' => [
                'required'=> '{field} wajib diisi'
                
            ]
            ],
        'wa'=> [
            'rules' => 'required',
            'errors' => [
                'required'=> '{field} wajib diisi'
                
            ]
            ],
        ];

        if(!$this->validate($rules)) {
            // session()->setFlashdata('errors',$this->validator->listErrors());
            return redirect()->back()->withInput()->with('errors',$this->validator->listErrors());
        }


        $authorModel->where('id_author',$id_author)->update(null,$this->request->getPost()); 

        return redirect()->to('author')->with('pesan','Data Berhasil Dirubah');
    }

}
