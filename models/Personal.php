<?php

namespace Framework\Models
{
  use \PDO;

  // ==== The personal class definition ====
  class Personal
  {
    var $p_ID = null;
    var $p_PersonalNumber = null;
    var $p_FirstLetter = null;
    var $p_FancyName = null;
    var $p_LastName = null;
    var $p_Email = null;
    var $p_Voucher = null;

    /**
     * Default constructor for Personal class
     * ---
     * @Param p_ID
     * @Param p_PersonalNumber
     * @Param p_FirstLetter
     * @Param p_FancyName
     * @Param p_LastName
     * @Param p_Email
     * @Param p_Voucher
     */
    public function __construct(
      $p_ID,
      $p_PersonalNumber,
      $p_FirstLetter,
      $p_FancyName,
      $p_LastName,
      $p_Email,
      $p_Voucher
    )
    {
      $this->p_ID = $p_ID;
      $this->p_PersonalNumber = $p_PersonalNumber;
      $this->p_FirstLetter = $p_FirstLetter;
      $this->p_FancyName = $p_FancyName;
      $this->p_LastName = $p_LastName;
      $this->p_Email = $p_Email;
      $this->p_Voucher = $p_Voucher;
    }

    /**
     * The from raw map/object/array
     * ---
     * @Param e
     */
    public static function fromRaw($e)
    {
      return new Personal(
        $e['p_id'], $e['p_personal_number'], $e['p_first_letter'],
        $e['p_fancy_name'], $e['p_last_name'], $e['p_email'],
        $e['p_voucher']
      );
    }
    
    public static function getByPersonalNumber($conn, $num)
    {
      // ==== Prepares the query ====

      // Prepares the statement
      $stmt = $conn->prepare(
        'SELECT * FROM `personal` WHERE p_personal_number = :pnum'
      );

      // Binds the parameters
      $stmt->bindParam(':pnum', $num, PDO::PARAM_INT);

      // ==== Gets the result ====

      // Executes the query
      $stmt->execute();

      // Gets the results
      $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

      // Returns the data
      if (count($data) === 0) return null;
      else return Personal::fromRaw($data[0]);
    }

    public static function findById($conn, $id)
    {
      // ==== Prepares the query ====

      // Prepares the statement
      $stmt = $conn->prepare(
        'SELECT * FROM `personal` WHERE p_id = :idd'
      );

      // Binds the parameters
      $stmt->bindParam(':idd', $id, PDO::PARAM_INT);

      // ==== Gets the result ====

      // Executes the query
      $stmt->execute();

      // Gets the results
      $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

      // Returns the data
      if (count($data) === 0) return null;
      else return Personal::fromRaw($data[0]);
    }
  };
}