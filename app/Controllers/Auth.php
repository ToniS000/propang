<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersM;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->usersM = new UsersM();
    }

    public function index()
    {
        helper(['form']);
        $data = [
            'title' => 'SimPangan | Login'
        ];

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => [
                    'rules'  => 'required|min_length[5]|max_length[20]|valid_email',
                    'errors' => [
                        'required' => '{field} harus diisi.',
                        'min_length' => '{field} minimal 5 digit.',
                        'max_length' => '{field} terlalu panjang'
                    ]
                ],
                'password' => [
                    'rules'  => 'required|min_length[5]|max_length[20]|validateUser[email,password_u]',
                    'errors' => [
                        'required' => '{field} harus diisi.',
                        'min_length' => '{field} minimal 5 digit.',
                        'max_length' => '{field} terlalu panjang',
                        'validateUser' => 'email/password tidak cocok!'
                    ]
                ]
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'email/password tidak cocok!'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $user = $this->usersM->where('email', $this->request->getVar('email'))
                    ->first();

                $this->setUserSession($user);

                if ($user['id_role'] == 1) {
                    return redirect()->to('/admin');
                } else {
                    return redirect()->to('/user');
                }
            }
        }

        return view('auth/login', $data);
    }
    private function setUserSession($user)
    {
        $data = [
            'id_users' => $user['id_users'],
            'name' => $user['name'],
            'email' => $user['email'],
            'id_role' => $user['id_role'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function register()
    {
        helper(['form']);
        $data = [
            'title' => 'SimPangan | Register'
        ];

        if ($this->request->getMethod() == 'post') {
            // let's do the validation here
            $rules = [
                'name' => [
                    'rules'  => 'required|min_length[3]|max_length[50]',
                    'errors' => [
                        'required' => 'nama harus diisi.',
                        'min_length' => 'nama minimal 3 digit.',
                        'max_length' => 'nama terlalu panjang',
                    ]
                ],
                'email' => [
                    'rules'  => 'required|min_length[5]|max_length[20]|valid_email|is_unique[users.email]',
                    'errors' => [
                        'required' => '{field} harus diisi.',
                        'min_length' => '{field} minimal 5 digit.',
                        'max_length' => '{field} terlalu panjang',
                        'valid_email' => '{field} yang di masukan tidak valid'
                    ]
                ],
                'password1' => [
                    'rules'  => 'required|min_length[5]|max_length[20]',
                    'errors' => [
                        'required' => 'password harus diisi.',
                        'min_length' => 'password minimal 5 digit.',
                        'max_length' => 'password terlalu panjang'
                    ]
                ],
                'password2' => [
                    'rules'  => 'matches[password1]',
                    'errors' => [
                        'matches' => 'password confirm tidak sesuai.'
                    ]
                ]
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $newData = [
                    'name' => $this->request->getVar('name'),
                    'images' => 'default.png',
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password1'),
                    'id_role' => 2,
                    'is_active' => 1,

                ];
                $this->usersM->save($newData);

                session()->setFlashdata('success', 'Register Berhasil, Silahkan login!');
                return redirect()->to('/login');
            }
        }

        return view('auth/register', $data);
    }

    public function profile()
    {
        helper(['form']);
        $model = new UsersM();

        // if ($this->request->getMethod() == 'post') {
        //     $rules = [
        //         'nama_u' => [
        //             'rules'  => 'required|min_length[3]|max_length[50]',
        //             'errors' => [
        //                 'required' => 'nama harus diisi.',
        //                 'min_length' => 'nama minimal 3 digit.',
        //                 'max_length' => 'nama terlalu panjang',
        //             ]
        //         ],
        //         'username_u' => [
        //             'rules'  => 'required|min_length[5]|max_length[20]',
        //             'errors' => [
        //                 'required' => 'username harus diisi.',
        //                 'min_length' => 'username minimal 5 digit.',
        //                 'max_length' => 'username terlalu panjang',
        //             ]
        //         ],
        //         'gbr_u' => [
        //             'rules'  => 'max_size[gbr_u,2048]|is_image[gbr_u]|mime_in[gbr_u,image/png,image/jpg,image/jpeg]',
        //             'errors' => [
        //                 'max_size' => 'ukuran gambar terlalu besar.',
        //                 'is_image' => 'ini bukan gambar.',
        //                 'mime_in' => 'file yang dipilih bukan gambar',
        //             ]
        //         ]
        //     ];

        //     if ($this->request->getPost('password_u') != '') {
        //         // $rules['password_u'] = 'required|min_length[5]|max_length[255]';
        //         // $rules['password_confirm'] = 'matches[password_u]';
        //         $rules = [
        //             'password_u' => [
        //                 'rules'  => 'required|min_length[5]|max_length[20]',
        //                 'errors' => [
        //                     'required' => 'password harus diisi.',
        //                     'min_length' => 'password minimal 5 digit.',
        //                     'max_length' => 'password terlalu panjang'
        //                 ]
        //             ],
        //             'password_confirm' => [
        //                 'rules'  => 'matches[password_u]',
        //                 'errors' => [
        //                     'matches' => 'password tidak sesuai.'
        //                 ]
        //             ]
        //         ];
        //     }

        //     if (!$this->validate($rules)) {
        //         $data['validation'] = $this->validator;
        //     } else {
        //         $fileGambar = $this->request->getFile('gbr_u');
        //         if ($fileGambar->getError() == 4) {
        //             $namaGambar = $this->request->getVar('gambarLama');
        //         } else {
        //             $fileGambar->move('img');
        //             $namaGambar = $fileGambar->getName();
        //         }

        //         $newData = [
        //             'id_u' => session()->get('id_u'),
        //             'nama_u' => $this->request->getPost('nama_u'),
        //             'gbr_u' => $namaGambar,
        //             'username_u' => $this->request->getPost('username_u'),
        //         ];

        //         if ($this->request->getPost('password_u') != '') {
        //             $newData['password_u'] = $this->request->getPost('password_u');
        //         }

        //         $model->save($newData);
        //         $user = $model->where('username_u', $this->request->getVar('username_u'))
        //             ->first();

        //         $this->setUserSession($user);

        //         session()->setFlashdata('success', 'Berhasil Update Profile!!');
        //         return redirect()->to('profile');
        //     }
        // }

        $data = [
            'title' => 'SimPangan | Profile',
            'user' => $model->where('id_users', session()->get('id_users'))->first()
        ];

        return view('auth/profile', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
