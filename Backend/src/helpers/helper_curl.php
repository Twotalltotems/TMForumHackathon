<?php

namespace TTM;

class CurlHelper {
  public function getTMAPI($url, $post)
  {
    $curl = curl_init();

    if ($post)
    {
        curl_setopt($curl, CURLOPT_POST, 1);
    }

    curl_setopt($curl, CURLOPT_URL, "http://192.176.47.48:27010/rest/S-IcN8-IUGtV-/" . $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic MDc3N2Q5YzZkYjU3NGQzMzc2NjdjZWM2ZDQ0NjRkMDNkNjBjNzQ0NGM5ZDFkYTNkNTY6VjRjTkZmSlFSY2QwWVYyVjZTM05vZGREbWVXaWliUHJydFU4Wm9pczEwWEw1alpwWEc=',
                                                 'Content-Type: application/json',
                                                 'Accept: application/json'));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $cResult = curl_exec($curl);
    curl_close($curl);

    return json_decode($cResult, true);
  }

  public function getBCAPI($url)
  {
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
                                                 'Accept: application/json'));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $cResult = curl_exec($curl);
    curl_close($curl);

    return json_decode($cResult, true);
  }
}
