<?php

namespace Framework\MainController
{
  include_once(__DIR__ . '/../models/Activity.php');
  
  /**
   * The get index controller
   * ---
   * @Param renderer
   */
  function getIndex($conn)
  {
    // ==== Gets the data ====

    $activities = \Framework\Models\Activity::getAll($conn);

    // ==== Renders the page ====

    // Creates the template
    $template = new \Framework\Template(array(
      'title' => 'Home',
      'activities' => $activities,
      'stylesheets' => array_merge(array('/public/dist/css/index.css'), \Framework\Template::$t_DefaultVariables['stylesheets'])
    ));

    // Renders the template
    $template->render('index.view.php');
  }
}