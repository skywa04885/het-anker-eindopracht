<?php

namespace Framework\Models
{
  use \PDO;

  // ==== The activity class definition ====
  class Activity
  {
    var $a_Name = null;
    var $a_Description = null;
    var $a_Location = null;
    var $a_StartTime = null;
    var $a_EndTime = null;
    var $a_Max = null;
    var $a_Used = null;
    var $a_DeadLine = null;
    var $a_ID = null;
    var $a_Image = null;

    /**
     * The default constructor for an id
     * ---
     * @Param a_Name
     * @Param a_Description
     * @Param a_Location
     * @Param a_StartTime
     * @Param a_EndTime
     * @Param a_Max
     * @Param a_Used
     * @Param a_Deadlime
     * @Param a_ID
     */
    public function __construct(
      $a_Name, $a_Description, $a_Location,
      $a_StartTime, $a_EndTime, $a_Max,
      $a_Used, $a_DeadLine, $a_Image,
      $a_ID = null
    )
    {
      $this->a_Name = $a_Name;
      $this->a_Description = $a_Description;
      $this->a_Location = $a_Location;
      $this->a_StartTime = $a_StartTime;
      $this->a_EndTime = $a_EndTime;
      $this->a_Max = $a_Max;
      $this->a_Used = $a_Used;
      $this->a_DeadLine = $a_DeadLine;
      $this->a_Image = $a_Image;
      $this->a_ID = $a_ID;
    }

    /**
     * Makes an object / array / map an activity
     * ---
     * @Param $e
     */
    public static function fromRaw($e)
    {
      // ==== Creates the activity from an map ====
      return new Activity(
        $e['a_name'], $e['a_desc'], $e['a_location'],
        $e['a_start_time'], $e['a_end_time'], $e['a_max'],
        $e['a_used'], $e['a_deadline'], $e['a_image'],
        $e['a_id']
      );
    }

    public static function getAll($conn, $limit = 100)
    {
      // ==== Prepares the query ====

      // Prepares the statement
      $stmt = $conn->prepare(
        'SELECT * FROM activities ORDER BY a_name ASC LIMIT :llmt'
      );

      // Binds the parameters
      $stmt->bindParam(':llmt', $limit, PDO::PARAM_INT);

      // ==== Gets the results ====

      // Executes the query
      $stmt->execute();

      // Gets the results
      $result = array();
      $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach ($data as $row)
        array_push($result, Activity::fromRaw($row));

      // Returns the result
      return $result;
    }
  };
}
