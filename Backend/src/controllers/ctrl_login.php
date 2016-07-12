<?php

namespace TTM;

class LoginController {
  public function doLogin($request, $response, $args)
  {
    header('Content-Type: application/json');

    $aResult = CurlHelper::getTMAPI("rest/S-IcN8-IUGtV-/partyManagement/v2/individual/33", false, null,
                                "MDc3N2Q5YzZkYjU3NGQzMzc2NjdjZWM2ZDQ0NjRkMDNkNjBjNzQ0NGM5ZDFkYTNkNTY6VjRjTkZmSlFSY2QwWVYyVjZTM05vZGREbWVXaWliUHJydFU4Wm9pczEwWEw1alpwWEc=");

    $return = array(
                  "id" => $aResult["id"],
                  "auth" => "dGVzdHNkYWZh",
                  "givenName" => $aResult["givenName"],
                  "lastName" => $aResult["familyName"]);

    return json_encode($return);
  }
}
