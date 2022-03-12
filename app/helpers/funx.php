<?php
/**
 * getSessionKey
 *
 * @return void
 */  

  function getSessionKeyForAlert()
  {
    $session_array = Session::all();

    $oldOrFlashedDataArray = $session_array['_flash']['old'];
    if (isset($oldOrFlashedDataArray)) {
      foreach ($oldOrFlashedDataArray as $sessionKey) {
        switch ($sessionKey) {
          case 'primary':
            $alertType = $sessionKey;
            break;
          case 'success':
            $alertType = $sessionKey;
            break;
          case 'warning':
            $alertType = $sessionKey;
            break;
          case 'info':
            $alertType = $sessionKey;
            break;
          case 'danger':
          case 'error':
            $alertType = $sessionKey;
            break;
        }
      }
    }
return $alertType;
    // $found = array_filter($oldOrFlashedDataArray, fn ($elem) => $elem == $key);
    // $key = implode(' ', $found); // convert the desired session key array to a string
    // echo "$key"; //now we have the session key for a particular case scenario

  }
