<?php

namespace TTM;

class LoginController {
  public function doLogin($request, $response, $args)
  {
    header('Content-Type: application/json');

    $aResult = CurlHelper::getTMAPI("partyManagement/v2/individual/33", false);

    $return = array(
                  "id" => $aResult["id"],
                  "auth" => "dGVzdHNkYWZh",
                  "givenName" => $aResult["givenName"],
                  "lastName" => $aResult["familyName"]);

    return json_encode($return);
  }
}
