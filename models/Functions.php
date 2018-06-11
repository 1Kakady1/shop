<?php

class Functions
{
    public function stripToDomainName($suri = '')
    {
         $suri = strtolower(trim($suri));

           $suri = preg_replace('%^(http:\/\/)*(www.)*%usi', '', $suri);

          $suri = preg_replace('%\/.*$%usi' , '', $suri);

          return $suri;
    }
}

?>