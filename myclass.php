<?php
/*   myclass.php
     ~/.composer/laravel# php artisan tinker

     require_once "myclass.php";
  
  public static function first_day_of( $month , $year)
  public static function prefill( $month , $year)
  public static function show_cal( $month , $year )
  public static function postfill( $month , $year)
  public static function last_day_of( $month , $year)
  public static function days_in_month( $month , $year )
  public static function make_cal_array( $month , $year )
  public static function is_leap_year( $year )
*/

class Mycal
{
  public static function first_day_of( $month , $year)
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

    $d = date('w' , strtotime('1-'. $month . '-'. $year ));
    $day_array = [
                    0 => "Sun" ,
                    1 => "Mon" ,
                    2 => "Tue" ,
                    3 => "Wed" ,
                    4 => "Thu" ,
                    5 => "Fri" ,
                    6 => "Sat"
                ];

    return $day_array[$d];
}

  public static function prefill( $month , $year)
  {
    /*
      returns integer -> number of days needed
      to be added to the front of a 7-day calendar period
      to make a full 7-day period 
      
       >>> Mycal::prefill(10,2015);
       => 4
       >>> Mycal::prefill(11,2015);
       => 0
       >>> Mycal::prefill(1,1974);
       => 2
       >>> Mycal::prefill(1.5,1974);
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

    $f = Mycal::first_day_of( $month , $year);
    $day_array = [
                    "Sun" => 0 ,
                    "Mon" => 1 ,
                    "Tue" => 2 ,
                    "Wed" => 3 ,
                    "Thu" => 4 ,
                    "Fri" => 5 ,
                    "Sat" => 6
                ];

    return $day_array[$f];
  }

  public static function show_cal( $month , $year )
  {
    $g = Mycal::make_cal_array( $month , $year );
    for ( $a = 0  ; $a <  7; $a++ ){  print $g[$a] . " "; }
    print "\n";
    for ( $a = 7  ; $a < 14; $a++ ){  print $g[$a] . " "; }
    print "\n";
    for ( $a = 14 ; $a < 21; $a++ ){  print $g[$a] . " "; }
    print "\n";
    for ( $a = 21 ; $a < 28; $a++ ){  print $g[$a] . " "; }
    print "\n";
    for ( $a = 28 ; $a < 35; $a++ ){  print $g[$a] . " "; }
    print "\n";
  }

  public static function postfill( $month , $year )
  {
    /*
      returns integer -> number of days needed
      to round-out a full 7-day calendar period

       >>> Mycal::postfill(1,1974);
       => 2
       >>> Mycal::postfill(5,1974);
       => 1
       >>> Mycal::postfill(8,1974);
       => 0
       >>> Mycal::postfill(9,2015);
       => 3
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

    $f = Mycal::last_day_of( $month , $year);

    $day_array = [
                    "Sun" => 6 ,
                    "Mon" => 5 ,
                    "Tue" => 4 ,
                    "Wed" => 3 ,
                    "Thu" => 2 ,
                    "Fri" => 1 ,
                    "Sat" => 0
                ];

    return $day_array[$f];
  }

  public static function last_day_of( $month , $year)
  {
    /*
     >>> Mycal::last_day_of(10,2015);
     => "Sat"
     >>> Mycal::last_day_of(12,2015);
     => "Thu"
     >>> Mycal::last_day_of(2,1974);
     => "Thu"
     >>> Mycal::last_day_of(8,1974);
     => "Sat"
     >>> Mycal::last_day_of(8.8,1974);
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

    $dimz = Mycal::days_in_month( $month , $year);
    $d = date('w' , strtotime( $dimz . '-' . $month . '-'. $year ) );

    $day_array = [
                    "0" => "Sun" ,
                    "1" => "Mon" ,
                    "2" => "Tue" ,
                    "3" => "Wed" ,
                    "4" => "Thu" ,
                    "5" => "Fri" ,
                    "6" => "Sat"
                ];
     return $day_array[$d];  // todo
  }

  public static function days_in_month( $month , $year )
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

    return cal_days_in_month( CAL_GREGORIAN , $month , $year );
  }

  public static function make_cal_array( $month , $year )
  {
    $too = Mycal::days_in_month( $month , $year );
    $body = range( 1, $too );

    $hd = Mycal::prefill( $month , $year );
    $tl = Mycal::postfill( $month , $year );

    if ( ( $hd == 0 ) and ( $tl == 0 ) )
    {
        $all = $body;
        return $all;
    }

    if ( ( $hd > 0 ) and ( $tl > 0 ) )
    {
      $front = array_fill(0 , $hd , "--");
      $back  = array_fill(0 , $tl , "++");

      $all = array_merge( $front ,  $body , $back );

      return  $all;
    }

    if ( ( $hd ==  0 )  and ( $tl > 0 ) )
    {
      // $front = array_fill(0 , $hd , "--");
      $back  = array_fill(0 , $tl , "++");
      $all = array_merge( $body , $back );

      return $all;
    }

    if ( ( $hd > 0 )  and ( $tl == 0 ) )
    {
      $front = array_fill(0 , $hd , "--");
      $all = array_merge( $front , $body );

      return $all;
    }
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

    if ( cal_days_in_month( CAL_GREGORIAN, 2, $year ) == 29 )
    {
      return true;
    } else {
      return false;
    }
  }
}
