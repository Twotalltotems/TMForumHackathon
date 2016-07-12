<?php

namespace TTM;

class CurlHelper {
  public function getTMAPI($url, $post, $data, $auth)
  {
    $curl = curl_init();

    if ($post)
    {
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    }

    curl_setopt($curl, CURLOPT_URL, "http://192.176.47.48:27010/" . $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $auth, //ODhmMDhmN2ZhODhlMzFiMWUzZWQ4YzBiNmU2YWFlMGJlZTVjZmNmMzljZWU4MjY1ZTI6UmQ4bENCUndjZHN5Wlp0R29kZ3ZxWTE0VDhyckhSbFE2NWhDTUVWWTZIN1A5RmxNaHI=',
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
