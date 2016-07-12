<?php

namespace TTM;

class TroubleController {
  public function get($request, $response, $args)
  {
    header('Content-Type: application/json');

    $aResult = CurlHelper::getTMAPI("rest/S-KcN8-IUGtV-/troubleTicketManagement/v2//troubleTicket", false, null,
      "dGVzdHRyb3VibGV0aWNrZXQ6dGVzdHRyb3VibGV0aWNrZXQ=");

    $fResult = array();
    foreach ($aResult as $trouble)
    {
      if ($trouble["type"] != "TTT-MSNXSDJSMA")
        continue;

      $t["description"] = $trouble["description"];
      $t["severity"] = $trouble["severity"];
      array_push($fResult, $t);
    }

    return json_encode($fResult);
  }

  public function post($request, $response, $args)
  {
    header('Content-Type: application/json');

    $aResult = CurlHelper::getTMAPI("rest/S-KcN8-IUGtV-/troubleTicketManagement/v2//troubleTicket", true,
      array("description" => $request->getParam("description"), "severity" => $request->getParam("severity"), "type" => "TTT-MSNXSDJSMA"),
      "dGVzdHRyb3VibGV0aWNrZXQ6dGVzdHRyb3VibGV0aWNrZXQ=");

    return json_encode($aResult);
  }
}
