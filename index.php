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

// ==== Includes the required files ====

include_once(__DIR__ . '/src/mvc/Router.php');
include_once(__DIR__ . '/src/mvc/Renderer.php');

// ==== Function definitions ====

/**
 * Parses the url to path only
 * ---
 * @Param raw
 */
function parseUrl($raw)
{
  $result = '';

  // Checks if we even have an get parameter / parameters
  if (strpos($raw, '?') == FALSE) $result = $raw;
  else $result = substr($raw, 0, strpos($raw, '?'));

  // Removes the not required '/'
  if (substr($result, -1) == '/') $result = substr($result, 0, -1);
  if ($result == '') $result = '/';

  // Returns the result
  return $result;
}

// ==== Here starts the serving ====

// Parses the url, so we have the path only
$path = parseUrl($_SERVER['REQUEST_URI']);

// Creats the rendered
$renderer = new Renderer('/views/base.php', '/views/error.php', __DIR__, "/public/dist");
// Creates the router
$router = new Router($path, $renderer);

// Adds the required paths
include_once(__DIR__ . '/routes/main.php');

// ==== Adds the default config ====

// Sets the default meta
$renderer->updateMeta(
  'Unknown page',
  'unknown,page,school',
  'This page has nothing specified by the creator !',
  'Het Anker',
  'Luke A.C.A. Rieff'
);

// Sets the stylesheets
$renderer->addStylesheets('/css/reset.css', '/css/default.css');

// ==== Executes the router and renderer ====

// Executes the router
try {
  // Handles the routes
  if (!$router->handleRoutes())
  {
    // ==== Prepares the error page ====

    define('error_code', 404);
    define('error_message', 'Page not found !');
    define('error_description', 'Please try another URL, 
    this one was not found on the server !');

    // ==== Sends the error page ====

    $renderer->setFile('/views/error.php');
  }
} catch (Exception $e)
{
  // ==== Prepares the error page ====

  // ==== Sends the error page ====
  $renderer->setFile('/views/error.php');
}

// ==== Renders the file ====
$renderer->render();