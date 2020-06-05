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

class Renderer
{
  var $r_FileName = null;
  var $r_Base = null;
  var $r_Root = null;
  var $r_Stylesheets = null;
  var $r_PublicBase = null;

  /**
   * The renderer default constructor
   * --
   * @Param r_Base
   * @Param r_FileName (404 preffered)
   * @Param r_Root
   * @Param r_PublicBase
   */
  public function __construct($r_Base, $r_FileName, $r_Root, $r_PublicBase)
  {
    $this->r_Base = $r_Base;
    $this->r_FileName = $r_FileName;
    $this->r_Root = $r_Root;
    $this->r_PublicBase = $r_PublicBase;
    // ==== Default array values ====
    $this->r_Stylesheets = array();
  }

  /**
   * Adds an stylesheet / stylesheets to renderer
   * ---
   * @Param stylesheets
   */
  public function addStylesheets(...$stylesheets)
  {
    foreach ($stylesheets as $stylesheet)
      array_push($this->r_Stylesheets, $this->r_PublicBase . $stylesheet);
  }

  /**
   * Updates the site meta \
   * If null inserted keep old value
   * ---
   * @Param title
   * @Param keywords
   * @Param description
   * @Param copyright
   * @Param author
   */
  public function updateMeta(
    $title,
    $keywords,
    $description,
    $copyright,
    $author
  )
  {
    // ==== Updates the values, if chosen to update ====
    if ($author !== null) define('render_meta_author', $author);
    if ($keywords !== null) define('render_meta_keywords', $keywords);
    if ($description !== null) define('render_meta_description', $description);
    if ($copyright !== null) define('render_meta_copyright', $copyright);
    if ($title !== null) define('render_meta_title', $title);
  }

  /**
   * Sets the new file name
   * ---
   * @Param filename
   */
  public function setFile($filename)
  {
    $this->r_FileName = $filename;
  }

  /**
   * Adds the root to an filename
   * ---
   * @Param filename
   */
  private function addRoot($filename)
  {
    return $this->r_Root . $filename;
  }

  /**
   * Renders the file
   * ---
   * void
   */
  public function render()
  {
    // Sets the required variables
    define('render_filename', $this->addRoot($this->r_FileName));
    define('render_stylesheets', $this->r_Stylesheets);

    // Gets the base template
    include_once($this->r_Root . $this->r_Base);
  }
};