<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class NoAuth implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    // Do something here
    if (session()->get('isLoggedIn')) {

      if (session()->get('id_role') == 1) {
        $role = '/admin';
      }
      if (session()->get('id_role') == 2) {
        $role = '/member';
      }
      return redirect()->to($role);
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Do something here
  }
}
