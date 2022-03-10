<?php


namespace Drupal\hello_world\Services;


class DateTime {  

  


   public function gettime($timezone) {  
     
  #  $DateandTime = date('m-d-Y h:i:s a', time());

  $date = new \DateTime(null, new \DateTimeZone($timezone));
   return $date->format('jS-M-Y h:i:A:e');
  }

  }