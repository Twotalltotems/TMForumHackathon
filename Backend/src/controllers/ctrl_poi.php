<?php

namespace TTM;

class POIController {
  public function getPoIs($request, $response, $args)
  {
    header('Content-Type: application/json');

    $open511 = CurlHelper::getBCAPI("http://api.open511.gov.bc.ca/events?format=json&status=ALL&severity=MAJOR&jurisdiction=drivebc.ca&event_type=INCIDENT&area_id=drivebc.ca%2F1&bbox=-130%2C48%2C-116%2C60");

    return json_encode($open511);
  }
}
