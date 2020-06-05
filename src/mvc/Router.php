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

// ==== The route class ====
class Route
{
  var $r_Path = null;
  var $r_Callable = null;

  /**
   * Default constructor for route
   * ---
   * @Param r_Path
   * @Param r_Callable
   */
  public function __construct($r_Path, $r_Callable)
  {
    $this->r_Path = $r_Path;
    $this->r_Callable = $r_Callable;
  }

  /**
   * Checks if the current path matches the route
   * ---
   * @Param path
   */
  public function match($path)
  {
    // Checks if there is an match
    if (strcmp($this->r_Path, $path) == 0) return TRUE;
    else return FALSE;
  }

  /**
   * Executes the current route
   * ---
   * void
   */
  public function executeCallable($renderer)
  {
    // Checks if the function is valid
    if (!is_callable($this->r_Callable))
    {
      throw new Exception('Callable of path: \'{$this->r_Path}\' must be an function !');
    }
    // Executes the function
    call_user_func($this->r_Callable, $renderer);
  }
};

// ==== The class definition for the Router ====
class Router
{
  var $r_RoutesGet = null;
  var $r_RoutesPost = null;
  var $r_Path = null;
  var $r_Renderer = null;

  /**
   * Default constructor for the router
   * ---
   * @Param r_Path
   */
  public function __construct($r_Path, $r_Renderer)
  {
    $this->r_Path = $r_Path;
    $this->r_Renderer = $r_Renderer;
    // ==== Initializes the arrays ====
    $this->r_RoutesGet = array();
    $this->r_RoutesPost = array();
  }

  /**
   * Adds an get request
   * ---
   * @Param path
   * @Param callable ( function )
   */
  public function get($path, $callable)
  {
    // Pushes the path to the array
    array_push($this->r_RoutesGet, new Route($path, $callable));
  }

  /**
   * Adds an post request
   * ---
   * @Param path
   * @Param callable ( function )
   */
  public function post($path, $callable)
  {
    // Pushes the path to the array
    array_push($this->r_RoutesPost, new Route($path, $callable));
  }

  /**
   * Executes and follows the paths
   * ---
   * void
   */
  public function handleRoutes()
  {
    $found = FALSE;
    $searchArray = null;

    // ==== Tries to find the route ====

    // Checks the request method
    switch (strtolower($_SERVER['REQUEST_METHOD']))
    {
      case 'post':
      {
        // Sets the array
        $searchArray = $this->r_RoutesPost;
        // Breaks
        break;
      }
      case 'get':
      {
        // Sets the array
        $searchArray = $this->r_RoutesGet;
        // Breaks
        break;
      }
      default:
      {
        // Throws exception
        throw new Exception('Request {$_SERVER["REQUEST_METHOD"]} method not supported !');
      }
    }

    // Searches
    for ($i = 0; $i < count($searchArray); $i++)
    {
      if ($searchArray[$i]->match($this->r_Path))
      {
        // Sets found to true
        $found = TRUE;
        // Executes the function
        $searchArray[$i]->executeCallable($this->r_Renderer);
        // Breaks from the loop
        break;
      }
    }

    // Checks whether to return true or false
    if (!$found) return FALSE;
    else return TRUE;
  }
};