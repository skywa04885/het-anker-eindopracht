<?php

  /*
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, version 3 of the License.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <https://www.gnu.org/licenses/>.
  */

namespace Framework\MainRouter
{
  include_once(__DIR__ . '/../controllers/main.controller.php');
  
  function add($router)
  {
    $router->get('/', function ($conn) {
      \Framework\MainController\getIndex($conn);
    });
    
    $router->get('/contact', function ($conn) {
      \Framework\MainController\getContact($conn);
    });
    
    $router->get('/about', function ($conn) {
      $renderer->setFile('/views/about.php');
    });
    
    $router->get('/admin', function ($conn) {
      $renderer->setFile('/views/admin.php');
    });

    $router->post('/rest/contact-submit', function ($conn) {
      \Framework\MainController\postContact($conn);
    });
  }
}