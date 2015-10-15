class Mycal
{
  // The start of a web calendar in PHP
  // todo:  add some handy unit tests
  // First commit on Wed 2015-10-14
  //
  public static function first_day_of( $month, $year)
  {
    /*
    >>> Mycal::first_day_of(10,2015);
    => "Thu"
    >>> Mycal::first_day_of(7,1974);
    => "Mon"
    >>> Mycal::first_day_of(17,1974);
    => "error"
    >>> Mycal::first_day_of(1.0,1974);
    => "error"
    >>> Mycal::first_day_of(10,1974.5);
    => "error"
    */

    // make sure input is an integer 
    if ( ! ( is_integer($month) ) or ( ! ( is_integer($year) ) ) ) 
    {
      return "error";
    } 

    // make sure month is in range  
    if ( ( $month < 1 ) or ( $month > 12 ) )
    {
      return "error";
    }

    $d = date('w', strtotime('1-'. $month . '-'. $year ));
    switch ( $d ) {
      case "0":
        return "Sun";
        break;
      case "1":
        return "Mon";
        break;
      case "2":
        return "Tue";
        break;
      case "3":
        return "Wed";
        break;
      case "4":
        return "Thu";
        break;
      case "5":
        return "Fri";
        break;
      case "6":
        return "Sat";
        break;
      default:
        return "error";
        break;
  }
}

  public static function days_in_month( $month, $year )
  {
    /* 
    >>> Mycal::days_in_month(2,2008);
    => 29
    >>> Mycal::days_in_month(2,1964);
    => 29
    >>> Mycal::days_in_month(8,2012);
    => 31
    >>> Mycal::days_in_month(6,2012);
    => 30
    >>> Mycal::days_in_month(2,2001);
    => 28
    >>> Mycal::days_in_month(3,2008);
    => 31
    */

    if ( ! ( is_integer($month) ) or ( ! ( is_integer($year) ) ) ) 
    {
      return "error";
    } 

    // make sure month is in range  
    if ( ( $month < 1 ) or ( $month > 12 ) )
    {
      return "error";
    }

    return cal_days_in_month( CAL_GREGORIAN, $month, $year );
  }
  
  public static function is_leap_year( $year )
  {
    /*
    >>> Mycal::is_leap_year(1972);
    => true
    >>> Mycal::is_leap_year(1988);
    => true
    >>> Mycal::is_leap_year(1990);
    => false
    >>> Mycal::is_leap_year(2002);
    => false
    */

    if ( ! ( is_integer($year) ) ) 
    {
      return "error";
    } 

    if (cal_days_in_month( CAL_GREGORIAN, 2, $year) == 29 )
    {
      return true;
    } else {
      return false;
    }
  }

}
