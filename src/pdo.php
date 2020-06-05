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

namespace Framework\Database
{
  use \PDO;

  /**
   * Connects to the MySQL database
   * ---
   * @Param database ( REQUIRED )
   * @Param hostname
   * @Param username
   * @Param password
   */
  function connect(
    $database,
    $hostname = 'localhost',
    $username = 'root',
    $password = 'kanker'
  )
  {
    // Creates the PHP database object
    $conn = new PDO('mysql:host=' . $hostname . ';dbname=' . $database, $username, $password);
    // Sets the pdo options
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Returns the connection
    return $conn;
  }
}

?>