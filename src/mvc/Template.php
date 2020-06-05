<?php

namespace Framework
{
  class Template
  {
    var $t_Variables = null;
    var $t_RenderVariables = null;
    static $t_BaseFile = null;
    static $t_Dir = null;
    static $t_DefaultVariables = array();

    /**
     * The default constructor for the Template
     * ---
     * @Param t_Variables
     */
    public function __construct($t_Variables)
    {
      $this->t_Variables = $t_Variables;
    }

    /**
     * Gets an variable from the template
     * ---
     * @Param key
     */
    public function getValue($key)
    {
      if (!isset($this->t_RenderVariables[$key])) return null;
      else return $this->t_RenderVariables[$key];
    }

    /**
     * Renders the file
     * ---
     * @Param filename
     */
    public function render($filename)
    {
      // ==== Merges the variables ====
      
      $this->t_RenderVariables = array();

      // Loops over the default variables and appends them
      // - If they're not in the variables
      foreach (Template::$t_DefaultVariables as $key => $value)
        if (!isset($this->t_Variables[$key]))
          $this->t_RenderVariables[$key] = $value;
      
      // Merges the other variables with the veriables array
      $this->t_RenderVariables = array_merge(
        $this->t_RenderVariables, 
        $this->t_Variables
      );

      // ==== Renders the file ====

      // Sets the constant for the include file
      define('render_include_sub', Template::$t_Dir . '/' . $filename);

      // Includes the base file
      include_once(Template::$t_Dir . '/' . Template::$t_BaseFile);
    }
  };
}