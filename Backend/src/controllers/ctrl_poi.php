<?php

namespace TTM;

class POIController {
  public function getPoIs($request, $response, $args)
  {
    header('Content-Type: application/json');

    $events = array();
    $open511 = CurlHelper::getBCAPI("http://api.open511.gov.bc.ca/events?format=json");

    foreach ($open511["events"] as $event)
    {
      $nEvent["id"] = $event["id"];
      $nEvent["type"] = $event["event_type"];
      $nEvent["description"] = $event["+ivr_message"];
      $nEvent["geo"] = (count($event["geography"]["coordinates"]) > 2 ? $event["geography"]["coordinates"][0] : $event["geography"]["coordinates"]);
      array_push($events, $nEvent);
    }

    $returnVal["events"] = $events;
    $returnVal["cams"] = self::getBCCams();

    return json_encode($returnVal);
  }

  function getBCCams()
  {
    return array (
            0 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/2.jpg',
              'name' => 'Coquihalla Great Bear Snowshed',
              'description' => 'Great Bear Snowshed looking north.',
              'latitude' => 49.594853000000001,
              'longitude' => -121.162381,
            ),
            1 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/4.jpg',
              'name' => 'Garibaldi',
              'description' => 'Hwy 99, south of Whistler, looking south.',
              'latitude' => 49.970551,
              'longitude' => -123.1448955,
            ),
            2 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/5.jpg',
              'name' => 'Kootenay Pass',
              'description' => 'Hwy 3, Salmo Creston Highway Summit, looking east.',
              'latitude' => 49.059504699999998,
              'longitude' => -117.03840080000001,
            ),
            3 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/6.jpg',
              'name' => 'Smithers',
              'description' => 'Hwy 16 at Main Street, looking west.',
              'latitude' => 54.782103999999997,
              'longitude' => -127.1667312,
            ),
            4 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/7.jpg',
              'name' => 'Cole Road - E',
              'description' => 'Hwy 1 at Cole Road Rest Area, looking east.',
              'latitude' => 49.057499999999997,
              'longitude' => -122.17700000000001,
            ),
            5 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/8.jpg',
              'name' => 'Malahat Drive - N',
              'description' => 'Hwy 1 at South Shawnigan Lake Road, looking north.',
              'latitude' => 48.561230999999999,
              'longitude' => -123.569743,
            ),
            6 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/9.jpg',
              'name' => 'Nanaimo Parkway',
              'description' => 'Hwy 19 at College Drive, looking north.',
              'latitude' => 49.153687599999998,
              'longitude' => -123.9717205,
            ),
            7 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/10.jpg',
              'name' => 'South Taylor Hill',
              'description' => 'Hwy 97 at South Taylor Hill, 20 km south of Fort St John, looking north.',
              'latitude' => 56.115551000000004,
              'longitude' => -120.6489643,
            ),
            8 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/11.jpg',
              'name' => 'Revelstoke',
              'description' => 'Hwy 1 at east end of Columbia River Bridge in Revelstoke, looking east.',
              'latitude' => 51.007261499999998,
              'longitude' => -118.2183304,
            ),
            9 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/12.jpg',
              'name' => 'Three Valley Gap',
              'description' => 'Hwy 1, 20 km west of Revelstoke, looking east.',
              'latitude' => 50.927657799999999,
              'longitude' => -118.47468480000001,
            ),
            10 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/13.jpg',
              'name' => 'Peace Arch',
              'description' => 'Hwy 99 at Peace Arch border crossing, looking north.',
              'latitude' => 49.001268000000003,
              'longitude' => -122.756658,
            ),
            11 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/14.jpg',
              'name' => 'Beach Road - N',
              'description' => 'Hwy 99 at Canada/USA border, looking north.',
              'latitude' => 49.007404200000003,
              'longitude' => -122.7578908,
            ),
            12 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/15.jpg',
              'name' => 'Pacific Border Crossing',
              'description' => 'Pacific Crossing at the border, looking north.',
              'latitude' => 49.003039999999999,
              'longitude' => -122.73563300000001,
            ),
            13 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/16.jpg',
              'name' => 'Second Ave - N',
              'description' => 'Pacific Crossing at 2nd Avenue, looking north.',
              'latitude' => 49.006636,
              'longitude' => -122.73507979999999,
            ),
            14 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/17.jpg',
              'name' => 'Causeway',
              'description' => 'Stanley Park Causeway at Stanley Park Entrance, looking south.',
              'latitude' => 49.295791399999999,
              'longitude' => -123.1366403,
            ),
            15 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/18.jpg',
              'name' => 'North End 1',
              'description' => 'North end of Lions Gate Bridge, looking south.',
              'latitude' => 49.317588000000001,
              'longitude' => -123.136585,
            ),
            16 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/19.jpg',
              'name' => 'Georgia St.',
              'description' => 'Georgia St at Chilco, looking south.',
              'latitude' => 49.294533000000001,
              'longitude' => -123.13690699999999,
            ),
            17 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/20.jpg',
              'name' => 'North End 2',
              'description' => 'North end of Lions Gate Bridge, looking north.',
              'latitude' => 49.324198000000003,
              'longitude' => -123.13015300000001,
            ),
            18 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/21.jpg',
              'name' => 'Taylor Way',
              'description' => 'Taylor Way at Marine Drive, looking north on Taylor Way.',
              'latitude' => 49.327635999999998,
              'longitude' => -123.134727,
            ),
            19 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/22.jpg',
              'name' => 'Marine Dr.',
              'description' => 'Taylor Way/Marine Drive intersection, looking east toward Lions Gate Bridge.',
              'latitude' => 49.327124900000001,
              'longitude' => -123.13296769999999,
            ),
            20 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/29.jpg',
              'name' => 'Steveston',
              'description' => 'Hwy 99, looking north from Steveston interchange.',
              'latitude' => 49.133216300000001,
              'longitude' => -123.0873333,
            ),
            21 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/30.jpg',
              'name' => 'Deas',
              'description' => 'Hwy 99 from north of Hwy 17A overpass, looking north.',
              'latitude' => 49.1103521,
              'longitude' => -123.0623638,
            ),
            22 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/31.jpg',
              'name' => 'South Approach',
              'description' => 'Hwy 99, north of Hwy 17A overpass, looking north.',
              'latitude' => 49.108682000000002,
              'longitude' => -123.056506,
            ),
            23 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/32.jpg',
              'name' => 'Blundell',
              'description' => 'Looking south between Blundell overpass and Steveston offramp.',
              'latitude' => 49.155586399999997,
              'longitude' => -123.0871374,
            ),
            24 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/33.jpg',
              'name' => 'Hwy 17A Overpass',
              'description' => 'Hwy 99 from Hwy 17A overpass, looking north.',
              'latitude' => 49.107249500000002,
              'longitude' => -123.05570160000001,
            ),
            25 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/34.jpg',
              'name' => 'Works Yard',
              'description' => 'Hwy 99 at Delta Works Yard, looking north.',
              'latitude' => 49.103021499999997,
              'longitude' => -123.04612849999999,
            ),
            26 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/36.jpg',
              'name' => 'Cassiar - S',
              'description' => 'Cassiar Tunnel - South Portal looking south on Hwy 1.',
              'latitude' => 49.277296499999999,
              'longitude' => -123.0311786,
            ),
            27 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/41.jpg',
              'name' => 'Elkhart',
              'description' => 'Hwy 97C (Okanagan Connector) 25 km east of Hwy 5A/97C Jct, looking west.',
              'latitude' => 49.8883796,
              'longitude' => -120.3245922,
            ),
            28 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/53.jpg',
              'name' => 'Begbie Summit',
              'description' => 'Hwy 97, Begbie Summit, 100 Mile House area, looking north.',
              'latitude' => 51.4794464,
              'longitude' => -121.3698388,
            ),
            29 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/54.jpg',
              'name' => 'Bradner Rd',
              'description' => 'Hwy 1, west of Abbotsford near Bradner Road, looking east.',
              'latitude' => 49.075325399999997,
              'longitude' => -122.42619500000001,
            ),
            30 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/55.jpg',
              'name' => 'Dragon Lake',
              'description' => 'Hwy 97, 10.5 km south of Quesnel, looking south.',
              'latitude' => 52.928246100000003,
              'longitude' => -122.4389833,
            ),
            31 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/56.jpg',
              'name' => 'Helmer Lake',
              'description' => 'Hwy 5, 24 km north of Merritt at Helmer Interchange, looking north.',
              'latitude' => 50.3206013,
              'longitude' => -120.6368413,
            ),
            32 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/57.jpg',
              'name' => 'Kalamalka Lookout',
              'description' => 'Hwy 97 at Vista Road turnoff south of Vernon, looking north.',
              'latitude' => 50.2115972,
              'longitude' => -119.30574780000001,
            ),
            33 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/58.jpg',
              'name' => 'Larson Hill',
              'description' => 'Hwy 5 at Larson HIll, 36 km south of Merritt, looking north.',
              'latitude' => 49.830002899999997,
              'longitude' => -120.9358332,
            ),
            34 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/59.jpg',
              'name' => 'Sicamous - W',
              'description' => 'Hwy 1, east of Sicamous at Cambie/Solsqua Roads, looking west.',
              'latitude' => 50.891691399999999,
              'longitude' => -118.8683837,
            ),
            35 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/60.jpg',
              'name' => 'Morrissey',
              'description' => 'Hwy 3, about 10km south of Fernie at Morrissey Jct, looking north.',
              'latitude' => 49.3907831,
              'longitude' => -115.0230347,
            ),
            36 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/61.jpg',
              'name' => 'Walloper',
              'description' => 'Hwy 5, about 30 km south of Kamloops, looking north.',
              'latitude' => 50.528942000000001,
              'longitude' => -120.4800817,
            ),
            37 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/64.jpg',
              'name' => 'Anarchist',
              'description' => 'Hwy 3, 9 km west of the Anarchist Summit, east of Osoyoos, looking east.',
              'latitude' => 49.007627300000003,
              'longitude' => -119.3362118,
            ),
            38 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/65.jpg',
              'name' => 'Allison Pass',
              'description' => 'Hwy 3 at Allison Pass, 10 km west of Manning Park resort area, looking east.',
              'latitude' => 49.116,
              'longitude' => -120.867,
            ),
            39 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/66.jpg',
              'name' => 'Hwy 99 at Shell Road',
              'description' => 'Hwy 99 at Shell Rd, approaching Oak St Bridge, looking north.',
              'latitude' => 49.181793800000001,
              'longitude' => -123.10300599999999,
            ),
            40 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/71.jpg',
              'name' => 'Ironworkers - S',
              'description' => 'Ironworkers Memorial Bridge, south end, looking north.',
              'latitude' => 49.291438800000002,
              'longitude' => -123.0259497,
            ),
            41 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/72.jpg',
              'name' => 'Ironworkers',
              'description' => 'Ironworkers Memorial Bridge, mid-span, looking south.',
              'latitude' => 49.296633300000003,
              'longitude' => -123.02635479999999,
            ),
            42 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/73.jpg',
              'name' => 'Ironworkers - N',
              'description' => 'Ironworkers Memorial Bridge, north end, looking south.',
              'latitude' => 49.302648099999999,
              'longitude' => -123.0264798,
            ),
            43 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/77.jpg',
              'name' => 'Hungry Hill',
              'description' => 'Hwy 16 at Anderson Road, 14 km NW of Houston, looking east.',
              'latitude' => 54.472342300000001,
              'longitude' => -126.7466873,
            ),
            44 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/78.jpg',
              'name' => 'Enterprise - N',
              'description' => 'Hwy 97, 37 km south of Williams Lake, looking north.',
              'latitude' => 51.9616708,
              'longitude' => -121.79306080000001,
            ),
            45 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/79.jpg',
              'name' => 'Hwy 10 at 152nd-N',
              'description' => 'Hwy 10 at 152nd Street, looking north on 152nd.',
              'latitude' => 49.104346999999997,
              'longitude' => -122.80119999999999,
            ),
            46 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/80.jpg',
              'name' => 'Hwy 10 at 152nd-E',
              'description' => 'Hwy 10 at 152nd Street, looking east on Hwy 10.',
              'latitude' => 49.104346999999997,
              'longitude' => -122.80119999999999,
            ),
            47 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/81.jpg',
              'name' => 'Hwy 10 at 152nd-S',
              'description' => 'Hwy 10 at 152nd Street, looking south on 152nd.',
              'latitude' => 49.104346999999997,
              'longitude' => -122.80119999999999,
            ),
            48 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/82.jpg',
              'name' => 'Hwy 10 at 152nd-W',
              'description' => 'Hwy 10 at 152nd Street, looking west on Hwy 10.',
              'latitude' => 49.104346999999997,
              'longitude' => -122.80119999999999,
            ),
            49 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/83.jpg',
              'name' => 'Hwy 15 at Hwy 10 - N',
              'description' => 'Hwy 15 at Hwy 10, looking north on Hwy 15',
              'latitude' => 49.104013000000002,
              'longitude' => -122.738501,
            ),
            50 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/84.jpg',
              'name' => 'Hwy 15 at Hwy 10 - E',
              'description' => 'Hwy 15 at Hwy 10, looking east on Hwy 10',
              'latitude' => 49.104013000000002,
              'longitude' => -122.738501,
            ),
            51 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/85.jpg',
              'name' => 'Hwy 15 at Hwy 10 - S',
              'description' => 'Hwy 15 at Hwy 10, looking south on Hwy 15.',
              'latitude' => 49.104013000000002,
              'longitude' => -122.738501,
            ),
            52 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/86.jpg',
              'name' => 'Hwy 15 at FH-N',
              'description' => 'Hwy 15 at Fraser Hwy (1A) looking north on Hwy 15',
              'latitude' => 49.138254000000003,
              'longitude' => -122.734876,
            ),
            53 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/87.jpg',
              'name' => 'Hwy 91A at QBBR-E',
              'description' => 'North end of Queensborough Bridge, looking east',
              'latitude' => 49.197791000000002,
              'longitude' => -122.950087,
            ),
            54 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/88.jpg',
              'name' => 'Hwy 91A at QBBR-S',
              'description' => 'North end of Queensborough Bridge, looking south',
              'latitude' => 49.197791000000002,
              'longitude' => -122.950087,
            ),
            55 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/89.jpg',
              'name' => 'Hwy 91A_QB-E',
              'description' => 'Hwy 91A at Boundary Road, looking east.',
              'latitude' => 49.183157000000001,
              'longitude' => -122.957148,
            ),
            56 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/90.jpg',
              'name' => 'Hwy 91A_QB-W',
              'description' => 'Hwy 91A at Boundary Road, looking west.',
              'latitude' => 49.183157000000001,
              'longitude' => -122.957148,
            ),
            57 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/93.jpg',
              'name' => 'Hwy 15 at FH-E',
              'description' => 'Hwy 15 at Fraser Hwy (1A) looking south-east on Fraser Hwy',
              'latitude' => 49.138254000000003,
              'longitude' => -122.734876,
            ),
            58 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/94.jpg',
              'name' => 'Hwy 15 at FH-S',
              'description' => 'Hwy 15 at Fraser Hwy (1A) looking south on Hwy 15',
              'latitude' => 49.138254000000003,
              'longitude' => -122.734876,
            ),
            59 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/95.jpg',
              'name' => 'Hwy 15 at FH-W',
              'description' => 'Hwy 15 at Fraser Hwy (1A) looking north-west on Fraser Hwy',
              'latitude' => 49.138254000000003,
              'longitude' => -122.734876,
            ),
            60 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/96.jpg',
              'name' => 'Brenda Mine - E',
              'description' => 'Hwy 97C (Okanagan Connector) about 22km west of 97/97C Jct, looking east.',
              'latitude' => 49.869669999999999,
              'longitude' => -119.937,
            ),
            61 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/97.jpg',
              'name' => 'Bednesti',
              'description' => 'Hwy 16 at Bednesti between Prince George and Vanderhoof, looking west.',
              'latitude' => 53.8743324,
              'longitude' => -123.389652,
            ),
            62 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/98.jpg',
              'name' => 'Peden Hill-Prince George 1',
              'description' => 'Hwy 16 at Davis Rd in Prince George, looking eastbound.',
              'latitude' => 53.874119499999999,
              'longitude' => -122.77850549999999,
            ),
            63 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/99.jpg',
              'name' => 'Peden Hill-Prince George 2',
              'description' => 'Hwy 16 at Vance Rd in Prince George, looking westbound.',
              'latitude' => 53.8808054,
              'longitude' => -122.77050250000001,
            ),
            64 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/100.jpg',
              'name' => 'Summit Lake',
              'description' => 'Hwy 97 at Summit Lake Rd, about 48.5 km north of Prince George, looking north.',
              'latitude' => 54.269923400000003,
              'longitude' => -122.6278415,
            ),
            65 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/101.jpg',
              'name' => 'Rogers Pass',
              'description' => 'Hwy 1, near Parks Headquarters at Glacier National Park, 72 km east of Revelstoke, looking east.',
              'latitude' => 51.301571099999997,
              'longitude' => -117.51990189999999,
            ),
            66 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/103.jpg',
              'name' => 'Hwy 10 at King George Hwy - E',
              'description' => 'Hwy 10 at King George Hwy, looking east on Hwy 10.',
              'latitude' => 49.105311,
              'longitude' => -122.832247,
            ),
            67 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/104.jpg',
              'name' => 'Hwy 10 at King George Hwy - W',
              'description' => 'Hwy 10 at King George Hwy, looking west on Hwy 10.',
              'latitude' => 49.105311,
              'longitude' => -122.832247,
            ),
            68 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/109.jpg',
              'name' => 'Boston Bar - N',
              'description' => 'Hwy 1 at Kahmoose Rd, 12 km north of Boston Bar, looking north.',
              'latitude' => 49.963844000000002,
              'longitude' => -121.4821384,
            ),
            69 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/110.jpg',
              'name' => 'Kitimat',
              'description' => 'Hwy 37 at Oolichan Avenue, 5 km north of Kitimat, looking North',
              'latitude' => 54.095474199999998,
              'longitude' => -128.60111330000001,
            ),
            70 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/111.jpg',
              'name' => 'Terrace',
              'description' => 'Hwy 16 at Hwy 37 near Terrace, looking east on Hwy 16.',
              'latitude' => 54.511675500000003,
              'longitude' => -128.55800629999999,
            ),
            71 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/112.jpg',
              'name' => 'Douglas Rd - E',
              'description' => 'Hwy 1 at Douglas Rd overpass, looking east.',
              'latitude' => 49.257750000000001,
              'longitude' => -122.983006,
            ),
            72 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/113.jpg',
              'name' => 'Douglas Rd - W',
              'description' => 'Hwy 1 at Willingdon Ave, looking west.',
              'latitude' => 49.257750000000001,
              'longitude' => -122.983006,
            ),
            73 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/114.jpg',
              'name' => 'Kensington - E',
              'description' => 'Hwy 1 at Kensington Ave, looking east.',
              'latitude' => 49.243673000000001,
              'longitude' => -122.968228,
            ),
            74 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/115.jpg',
              'name' => 'Kensington - W',
              'description' => 'Hwy 1 at Kensington Ave, looking west.',
              'latitude' => 49.243673000000001,
              'longitude' => -122.968228,
            ),
            75 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/120.jpg',
              'name' => 'Cook Creek Road',
              'description' => 'Hwy 19 at Cook Creek Road, about 29 km north of Parksville, looking north.',
              'latitude' => 49.432994999999998,
              'longitude' => -124.7445001,
            ),
            76 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/122.jpg',
              'name' => 'Savory Rest Area',
              'description' => 'Hwy 16, 48 km east of Burns Lake, looking west.',
              'latitude' => 54.0941756,
              'longitude' => -125.16917309999999,
            ),
            77 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/123.jpg',
              'name' => 'Tumbler Ridge',
              'description' => 'Hwy 29 at Hwy 52, looking west on Hwy 29.',
              'latitude' => 55.111334499999998,
              'longitude' => -120.96979349999999,
            ),
            78 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/124.jpg',
              'name' => 'Fort Nelson',
              'description' => 'Hwy 97 at Fort Nelson weigh scale, looking north.',
              'latitude' => 58.747749399999996,
              'longitude' => -122.6778489,
            ),
            79 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/125.jpg',
              'name' => 'Mile 73',
              'description' => 'Hwy 97 at Beaton Highway, 44 km north of Fort St. John, looking north.',
              'latitude' => 56.537302500000003,
              'longitude' => -121.2467259,
            ),
            80 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/126.jpg',
              'name' => 'Tupper Hwy',
              'description' => 'Hwy 2, 2km west of BC/Alberta border, looking east.',
              'latitude' => 55.482981899999999,
              'longitude' => -120.0182499,
            ),
            81 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/127.jpg',
              'name' => 'Kelowna',
              'description' => 'Hwy 97 at Hwy 33 in Kelowna, looking North on Hwy 97.',
              'latitude' => 49.889277,
              'longitude' => -119.42108210000001,
            ),
            82 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/128.jpg',
              'name' => 'Evans Road',
              'description' => 'Hwy 1 at Evans Road overpass near Chilliwack, looking east.',
              'latitude' => 49.143599999999999,
              'longitude' => -121.97799999999999,
            ),
            83 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/134.jpg',
              'name' => 'Port Edward - W',
              'description' => 'Hwy 16 at Port Edward arterial road, looking west.',
              'latitude' => 54.252321600000002,
              'longitude' => -130.2578134,
            ),
            84 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/135.jpg',
              'name' => 'Golden',
              'description' => 'Hwy 1, just north of Hwy 95 interchange, looking north-west.',
              'latitude' => 51.307145499999997,
              'longitude' => -116.9657983,
            ),
            85 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/137.jpg',
              'name' => 'Bamberton',
              'description' => 'Hwy 1 south of Mill Bay Rd Overpass at the Bamberton Park Entrance, looking south.',
              'latitude' => 48.601409799999999,
              'longitude' => -123.5348513,
            ),
            86 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/138.jpg',
              'name' => 'Goldstream',
              'description' => 'Hwy 1 near Sooke Lake Rd intersection at the south entrance to Goldstream Park, looking north.',
              'latitude' => 48.460324499999999,
              'longitude' => -123.5428716,
            ),
            87 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/139.jpg',
              'name' => 'Anahim Lake',
              'description' => 'Hwy 20, near Anahim Lake, about 140 km east of Bella Coola, looking west.',
              'latitude' => 52.461125199999998,
              'longitude' => -125.31591779999999,
            ),
            88 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/140.jpg',
              'name' => 'Francois Lake Ferry Landing',
              'description' => 'Hwy 35 at Southbank ferry landing on Francois Lake.',
              'latitude' => 54.025203300000001,
              'longitude' => -125.7701563,
            ),
            89 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/141.jpg',
              'name' => 'Red Pass',
              'description' => 'Hwy 16, 27 km east of Tete-Jaune Junction, 40 km west of BC/Alberta border.',
              'latitude' => 53.007438,
              'longitude' => -119.0592968,
            ),
            90 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/143.jpg',
              'name' => 'Kitwanga',
              'description' => 'Junction of Hwy 16 and Hwy 37, near Kitwanga, looking west on Hwy 16.',
              'latitude' => 55.095972000000003,
              'longitude' => -128.07702570000001,
            ),
            91 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/144.jpg',
              'name' => 'Onion Lake',
              'description' => 'Hwy 37S at Onion Lake Cross Country ski trails, looking north.',
              'latitude' => 54.283385500000001,
              'longitude' => -128.5334867,
            ),
            92 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/146.jpg',
              'name' => 'Kasiks',
              'description' => 'Hwy 16, at Kasiks resort area, 60 km west of Terrace, looking east.',
              'latitude' => 54.314319900000001,
              'longitude' => -129.34834720000001,
            ),
            93 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/151.jpg',
              'name' => 'Dease Lake',
              'description' => 'Junction of Hwy 37 and Commercial Drive in Dease Lake, looking north on Hwy 37.',
              'latitude' => 58.439376299999999,
              'longitude' => -129.9897072,
            ),
            94 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/152.jpg',
              'name' => 'Wedge',
              'description' => 'Hwy 99, about 13 km north of Whistler at Riverside Drive, looking north.',
              'latitude' => 50.184662000000003,
              'longitude' => -122.873938,
            ),
            95 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/155.jpg',
              'name' => 'Cache Creek',
              'description' => 'Hwy 1 at Collins Rd, looking east on Hwy 1/97.',
              'latitude' => 50.808799999999998,
              'longitude' => -121.325,
            ),
            96 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/156.jpg',
              'name' => 'Wire Cache',
              'description' => 'Hwy 5, about 15 km south of Avola, looking north.',
              'latitude' => 51.683517600000002,
              'longitude' => -119.4224739,
            ),
            97 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/157.jpg',
              'name' => 'Christina Lake',
              'description' => 'Hwy 3 at East Lake Drive on east side of Christina Lake, looking northwest.',
              'latitude' => 49.100701999999998,
              'longitude' => -118.22261210000001,
            ),
            98 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/158.jpg',
              'name' => 'Salmo',
              'description' => 'Hwy 3 at Hwy 6, looking west on Hwy 3.',
              'latitude' => 49.191758,
              'longitude' => -117.28647599999999,
            ),
            99 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/159.jpg',
              'name' => 'Jack McDonald Snowshed',
              'description' => 'Hwy 1, about 46 km east of Revelstoke, looking east.',
              'latitude' => 51.201263300000001,
              'longitude' => -117.7454156,
            ),
            100 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/160.jpg',
              'name' => 'Rossland',
              'description' => 'Hwy 3B at Hwy 22 (Rossland Weigh Scale) looking west on Hwy 22.',
              'latitude' => 49.078352899999999,
              'longitude' => -117.81582280000001,
            ),
            101 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/161.jpg',
              'name' => 'Coquihalla Lakes',
              'description' => 'Hwy 5, 61km south of Merritt, looking north.',
              'latitude' => 49.6086727,
              'longitude' => -121.0551598,
            ),
            102 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/162.jpg',
              'name' => 'Castlegar',
              'description' => 'Hwy 3 at 14th Ave. in Castlegar, looking east.',
              'latitude' => 49.288855900000001,
              'longitude' => -117.6619209,
            ),
            103 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/164.jpg',
              'name' => 'Sheridan Lake',
              'description' => 'Hwy 24, 63 km west of Little Fort, looking west.',
              'latitude' => 51.542615099999999,
              'longitude' => -120.9033706,
            ),
            104 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/165.jpg',
              'name' => 'Pine Pass',
              'description' => 'Hwy 97, north of Mackenzie Junction at Powder King access road, looking north.',
              'latitude' => 55.399988999999998,
              'longitude' => -122.63194799999999,
            ),
            105 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/166.jpg',
              'name' => 'Chetwynd',
              'description' => 'Hwy 97 at Wabi Estates Road, east of Chetwynd, looking east.',
              'latitude' => 55.678850199999999,
              'longitude' => -121.5303081,
            ),
            106 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/168.jpg',
              'name' => 'Aldergrove / Lynden-N',
              'description' => 'Canada/USA border crossing at Hwy 13 and 0 Ave, looking north.',
              'latitude' => 49.003641000000002,
              'longitude' => -122.48504200000001,
            ),
            107 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/170.jpg',
              'name' => 'Huntingdon / Sumas-S',
              'description' => 'Canada/USA border crossing at Hwy 11 and 2nd Ave, looking south.',
              'latitude' => 49.004327000000004,
              'longitude' => -122.265112,
            ),
            108 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/171.jpg',
              'name' => 'Huntingdon / Sumas-N',
              'description' => 'Canada/USA border crossing at Hwy 11 and 2nd Ave, looking north.',
              'latitude' => 49.004327000000004,
              'longitude' => -122.265112,
            ),
            109 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/173.jpg',
              'name' => 'New Denver',
              'description' => 'Hwy 6 at Hwy 31A in New Denver, looking north.',
              'latitude' => 49.991601000000003,
              'longitude' => -117.372274,
            ),
            110 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/174.jpg',
              'name' => 'Paulson Summit',
              'description' => 'Hwy 3, about 3 km east of Paulson Summit, looking west.',
              'latitude' => 49.257353999999999,
              'longitude' => -118.026915,
            ),
            111 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/175.jpg',
              'name' => 'Hosmer',
              'description' => 'Hwy 3, in Hosmer, north of Fernie, looking north-east',
              'latitude' => 49.588909999999998,
              'longitude' => -114.96312,
            ),
            112 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/176.jpg',
              'name' => 'Brisco',
              'description' => 'Hwy 95 in Brisco, at Brisco Road, looking north.',
              'latitude' => 50.825637,
              'longitude' => -116.268518,
            ),
            113 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/177.jpg',
              'name' => 'Wasa',
              'description' => 'Hwy 93/95 at junction of Hwy 95A, looking north.',
              'latitude' => 49.810341999999999,
              'longitude' => -115.769111,
            ),
            114 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/178.jpg',
              'name' => 'Function Junction',
              'description' => 'Hwy 99 at Cheakamus Lake Rd, 5 km south of Whistler, looking north.',
              'latitude' => 50.086806000000003,
              'longitude' => -123.037139,
            ),
            115 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/179.jpg',
              'name' => 'Alice Lake',
              'description' => 'Hwy 99 at Squamish Valley Rd, about 10 km north of Squamish, looking north.',
              'latitude' => 49.787500000000001,
              'longitude' => -123.134028,
            ),
            116 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/180.jpg',
              'name' => 'Furry Creek',
              'description' => 'Hwy 99, about 12km south of Squamish, looking south.',
              'latitude' => 49.593611000000003,
              'longitude' => -123.217889,
            ),
            117 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/182.jpg',
              'name' => 'Duffey Lake',
              'description' => 'Hwy 99 (Duffey Lake Rd) at Cayoosh summit, looking east.',
              'latitude' => 50.387222000000001,
              'longitude' => -122.462222,
            ),
            118 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/183.jpg',
              'name' => 'Line Creek Road',
              'description' => 'Hwy 43, between Sparwood and Elkford at Line Creek Mine Rd, looking north.',
              'latitude' => 49.883389000000001,
              'longitude' => -114.89025700000001,
            ),
            119 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/188.jpg',
              'name' => 'Shelter Bay - Front',
              'description' => 'Hwy 23, near the Upper Arrow Lake ferry landing at Shelter Bay, front of queue, looking north.',
              'latitude' => 50.635800000000003,
              'longitude' => -117.928,
            ),
            120 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/190.jpg',
              'name' => 'Skutz Falls',
              'description' => 'Hwy 18, at Skutz Falls Road, looking west.',
              'latitude' => 48.807493000000001,
              'longitude' => -123.958687,
            ),
            121 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/192.jpg',
              'name' => 'Lougheed Hwy',
              'description' => 'Hwy 7 (Lougheed Hwy) at Kennedy Road, looking southeast.',
              'latitude' => 49.242899999999999,
              'longitude' => -122.71899999999999,
            ),
            122 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/193.jpg',
              'name' => 'Lougheed at Kennedy Rd.',
              'description' => 'Hwy 7 (Lougheed Hwy) at Kennedy Road, looking northwest towards Pitt River Bridge.',
              'latitude' => 49.242899999999999,
              'longitude' => -122.71899999999999,
            ),
            123 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/194.jpg',
              'name' => 'Pitt River Bridge',
              'description' => 'Pitt River Bridge deck, northwest view from Lougheed Hwy at Kennedy Rd.',
              'latitude' => 49.242899999999999,
              'longitude' => -122.71899999999999,
            ),
            124 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/195.jpg',
              'name' => 'Pitt Meadows',
              'description' => 'Hwy 7 (Lougheed Hwy) at Kennedy Rd, zoomed southeast, towards Pitt Meadows.',
              'latitude' => 49.242899999999999,
              'longitude' => -122.71899999999999,
            ),
            125 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/196.jpg',
              'name' => 'Roosville',
              'description' => 'Hwy 93 at Canada/USA Border Crossing, looking north.',
              'latitude' => 49.000399999999999,
              'longitude' => -115.056,
            ),
            126 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/197.jpg',
              'name' => 'Skidegate',
              'description' => 'Hwy 16 at the ferry terminal on Haida Gwaii, looking north.',
              'latitude' => 53.247100000000003,
              'longitude' => -132.00899999999999,
            ),
            127 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/198.jpg',
              'name' => 'Masset',
              'description' => 'Hwy 16 at Hodges Road in Masset on Haida Gwaii, looking north.',
              'latitude' => 54.010300000000001,
              'longitude' => -132.136,
            ),
            128 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/199.jpg',
              'name' => 'Mary Hill Bypass',
              'description' => 'Hwy 7B, on Mary Hill, looking South-West towards Coquitlam.',
              'latitude' => 49.246760999999999,
              'longitude' => -122.742876,
            ),
            129 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/200.jpg',
              'name' => 'Laxgaltsap (Greenville)',
              'description' => 'Hwy 113, near Village of Laxgaltsap (Greenville) in the Nass Valley, looking eastbound.',
              'latitude' => 55.033900000000003,
              'longitude' => -129.584,
            ),
            130 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/202.jpg',
              'name' => 'Roberts Lake',
              'description' => 'Hwy 19, 31 km north of Campbell River, looking north.',
              'latitude' => 50.214337999999998,
              'longitude' => -125.545642,
            ),
            131 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/204.jpg',
              'name' => 'McCallum Road - W',
              'description' => 'Hwy 1 at McCallum Road overpass, looking west.',
              'latitude' => 49.034253,
              'longitude' => -122.29311199999999,
            ),
            132 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/205.jpg',
              'name' => 'Peace View Rest Area',
              'description' => 'Hwy 29, 29 km west of Ft. St. John, looking southwest.',
              'latitude' => 56.160977000000003,
              'longitude' => -121.596906,
            ),
            133 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/206.jpg',
              'name' => 'Lillooet-Fountain Valley',
              'description' => 'Hwy 99, near Fountain Slide, about 15 km north of Lillooet, looking southwest.',
              'latitude' => 50.747925000000002,
              'longitude' => -121.852057,
            ),
            134 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/207.jpg',
              'name' => 'Sutton Pass',
              'description' => 'Hwy 4 at Sutton Pass, between Ucluelet/Tofino and Port Alberni, looking southwest.',
              'latitude' => 49.280709999999999,
              'longitude' => -125.35321,
            ),
            135 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/208.jpg',
              'name' => 'Hwy 91 at Fraserwood-E',
              'description' => 'Hwy 91 at Fraserwood Way, on the East-West Connector, looking east.',
              'latitude' => 49.169400000000003,
              'longitude' => -122.98399999999999,
            ),
            136 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/209.jpg',
              'name' => 'Hwy 91 at Fraserwood-W',
              'description' => 'Hwy 91 at Fraserwood Way, on the East-West Connecter, looking West.',
              'latitude' => 49.169400000000003,
              'longitude' => -122.98399999999999,
            ),
            137 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/210.jpg',
              'name' => 'Hwy 91 at No.8 Rd-E',
              'description' => 'Hwy 91 at No.8 Rd on East-West Connector, looking east.',
              'latitude' => 49.1770444,
              'longitude' => -123.0244917,
            ),
            138 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/211.jpg',
              'name' => 'Hwy 91 at No.8 Rd-W',
              'description' => 'Hwy 91 at No.8 Rd on East-West Connector, looking west.',
              'latitude' => 49.1770444,
              'longitude' => -123.0244917,
            ),
            139 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/212.jpg',
              'name' => 'Hwy 99 at 8th Ave - N',
              'description' => 'Hwy 99 at 8th Avenue in White Rock, looking north.',
              'latitude' => 49.014668,
              'longitude' => -122.75811899999999,
            ),
            140 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/213.jpg',
              'name' => 'Cranbrook',
              'description' => 'Hwy3/95 at 9th Ave. in Cranbrook, looking northeast.',
              'latitude' => 49.512600999999997,
              'longitude' => -115.77008499999999,
            ),
            141 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/214.jpg',
              'name' => 'Kicking Horse Canyon',
              'description' => 'Hwy 1 (Kicking Horse Canyon) at 10 Mile Brake Check, looking east.',
              'latitude' => 51.273899999999998,
              'longitude' => -116.76300000000001,
            ),
            142 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/215.jpg',
              'name' => 'Spallumcheen',
              'description' => 'Hwy 97A at Larkin Cross Rd, about 14km north of Vernon, looking north.',
              'latitude' => 50.376283000000001,
              'longitude' => -119.233611,
            ),
            143 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/216.jpg',
              'name' => 'Crescent Spur',
              'description' => 'Hwy 16, about 50 km west of McBride at Loos Rd, looking west.',
              'latitude' => 53.537706,
              'longitude' => -120.70769199999999,
            ),
            144 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/217.jpg',
              'name' => 'Bowron River',
              'description' => 'Hwy 16, about 54 km east of Prince George near Purden Lake, looking west.',
              'latitude' => 53.899721999999997,
              'longitude' => -122.00444400000001,
            ),
            145 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/223.jpg',
              'name' => 'McCallum Road - E',
              'description' => 'Hwy 1 at McCallum Rd overpass, looking east.',
              'latitude' => 49.034253,
              'longitude' => -122.29311199999999,
            ),
            146 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/224.jpg',
              'name' => 'McCallum Rd Roundabout Northbound',
              'description' => 'McCallum Rd roundabout, looking north.',
              'latitude' => 49.034253,
              'longitude' => -122.29311199999999,
            ),
            147 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/225.jpg',
              'name' => 'McCallum Rd Roundabout Southbound',
              'description' => 'McCallum Rd roundabout, looking south.',
              'latitude' => 49.034253,
              'longitude' => -122.29311199999999,
            ),
            148 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/226.jpg',
              'name' => 'Fort St. James',
              'description' => 'Hwy 27, about 32 km south of Fort St. James, looking north.',
              'latitude' => 54.187232000000002,
              'longitude' => -124.208404,
            ),
            149 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/227.jpg',
              'name' => 'Sooke',
              'description' => 'Hwy 14 at Lazzar Rd near Sooke, looking west.',
              'latitude' => 48.387742000000003,
              'longitude' => -123.698728,
            ),
            150 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/228.jpg',
              'name' => 'Horseshoe Bay',
              'description' => 'Hwy 1 ramp at Horseshoe Bay, looking east.',
              'latitude' => 49.360810000000001,
              'longitude' => -123.271899,
            ),
            151 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/229.jpg',
              'name' => 'Nakusp',
              'description' => 'Junction of Hwy 6 and Hwy 23 in Nakusp, looking south along Hwy 6.',
              'latitude' => 50.249721999999998,
              'longitude' => -117.811111,
            ),
            152 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/230.jpg',
              'name' => 'Falkland',
              'description' => 'Hwy 97 at Silvernails Road near Falkland, looking southeast.',
              'latitude' => 50.496426,
              'longitude' => -119.542649,
            ),
            153 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/231.jpg',
              'name' => 'Hunter Creek',
              'description' => 'Hwy 1 at Hunter Creek, looking east.',
              'latitude' => 49.354371999999998,
              'longitude' => -121.579971,
            ),
            154 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/232.jpg',
              'name' => 'Mission - E',
              'description' => 'Hwy 7 at Hwy 11 approaching Mission, looking east.',
              'latitude' => 49.132804,
              'longitude' => -122.326369,
            ),
            155 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/234.jpg',
              'name' => 'Coffee Creek',
              'description' => 'Hwy 31, 45 km north of Nelson and 25km south of Kaslo, looking north.',
              'latitude' => 49.698999999999998,
              'longitude' => -116.912845,
            ),
            156 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/235.jpg',
              'name' => 'Keremeos',
              'description' => 'Hwy 3 at Keremeos Bypass Rd, looking west.',
              'latitude' => 49.205359999999999,
              'longitude' => -119.841449,
            ),
            157 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/236.jpg',
              'name' => 'Hwy 16 at Augier Rd',
              'description' => 'Hwy 16 at Augier Rd, about 22 km east of Burns Lake, looking west.',
              'latitude' => 54.173026999999998,
              'longitude' => -125.460943,
            ),
            158 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/238.jpg',
              'name' => 'Hwy 17 at Sayward Rd - S',
              'description' => 'Patricia Bay Hwy at Sayward Rd in Saanich, looking south.',
              'latitude' => 48.537438000000002,
              'longitude' => -123.38901300000001,
            ),
            159 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/239.jpg',
              'name' => 'Kamloops',
              'description' => 'Hwy 1 at Peterson Creek bridge in Kamloops, looking west.',
              'latitude' => 50.661724999999997,
              'longitude' => -120.324461,
            ),
            160 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/240.jpg',
              'name' => 'Bridal Falls',
              'description' => 'Hwy 1 near Bridal Falls, looking east.',
              'latitude' => 49.184317999999998,
              'longitude' => -121.75217499999999,
            ),
            161 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/241.jpg',
              'name' => 'Hope',
              'description' => 'Hwy 1 at Hwy 7 near Hope, looking west.',
              'latitude' => 49.393340999999999,
              'longitude' => -121.459191,
            ),
            162 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/242.jpg',
              'name' => 'Agassiz',
              'description' => 'Hwy 7 at Hwy 9 (Evergreen Drive) in Agassiz, looking east.',
              'latitude' => 49.240248999999999,
              'longitude' => -121.765856,
            ),
            163 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/243.jpg',
              'name' => 'Secret Cove',
              'description' => 'Hwy 101 at Brooks Rd on the Sunshine Coast, looking south.',
              'latitude' => 49.521276,
              'longitude' => -123.922957,
            ),
            164 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/244.jpg',
              'name' => 'Earls Cove',
              'description' => 'Hwy 101 at Egmont Rd, south of Earls Cove on the Sunshine Coast, looking South.',
              'latitude' => 49.745663999999998,
              'longitude' => -124.001841,
            ),
            165 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/245.jpg',
              'name' => 'Powell River',
              'description' => 'Hwy 101 at Loubert Rd in Powell River on the Sunshine Coast, looking south.',
              'latitude' => 49.775087999999997,
              'longitude' => -124.30063699999999,
            ),
            166 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/246.jpg',
              'name' => 'Sunday Summit',
              'description' => 'On Hwy 3, approximately 32 km south of Princeton. Looking north.',
              'latitude' => 49.239379999999997,
              'longitude' => -120.562309,
            ),
            167 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/247.jpg',
              'name' => 'Eholt Summit',
              'description' => 'Hwy 3 at Eholt Summit, east of Greenwood, looking west bound.',
              'latitude' => 49.145152000000003,
              'longitude' => -118.534594,
            ),
            168 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/248.jpg',
              'name' => '50-Mile',
              'description' => 'Hwy 23, 90 km north of Revelstoke, looking north.',
              'latitude' => 51.599040000000002,
              'longitude' => -118.601366,
            ),
            169 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/249.jpg',
              'name' => 'McCulloch',
              'description' => 'Hwy 33, 41 km southeast of Kelowna, just south of Big White turnoff, looking north.',
              'latitude' => 49.757720999999997,
              'longitude' => -119.126135,
            ),
            170 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/250.jpg',
              'name' => 'Monashee Pass',
              'description' => 'Hwy 6, 83 km east of Vernon, looking westbound.',
              'latitude' => 50.041666999999997,
              'longitude' => -118.549167,
            ),
            171 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/251.jpg',
              'name' => 'Pennask Summit',
              'description' => 'Hwy 97C, 74km west of Kelowna, looking east.',
              'latitude' => 49.909300000000002,
              'longitude' => -120.02416700000001,
            ),
            172 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/252.jpg',
              'name' => 'Hixon',
              'description' => 'Hwy 97 at Swanson Road near Hixon, looking north.',
              'latitude' => 53.428277000000001,
              'longitude' => -122.594469,
            ),
            173 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/253.jpg',
              'name' => 'John Hart Hwy',
              'description' => 'Hwy 97 (John Hart Hwy) at Mason-Semple Rd, looking east.',
              'latitude' => 55.757894,
              'longitude' => -120.48382100000001,
            ),
            174 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/254.jpg',
              'name' => 'Blue River',
              'description' => 'Hwy 5 at Shell Rd., looking north-east.',
              'latitude' => 52.108936999999997,
              'longitude' => -119.309045,
            ),
            175 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/255.jpg',
              'name' => 'Stewart',
              'description' => 'Hwy 37a between Stewart,BC and Hyder, USA, looking north.',
              'latitude' => 55.927731000000001,
              'longitude' => -130.00646399999999,
            ),
            176 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/256.jpg',
              'name' => 'Meziadin Junction',
              'description' => 'Hwy 37 and Hwy 37A at Meziadin Junction, looking north.',
              'latitude' => 56.100369999999998,
              'longitude' => -129.30717200000001,
            ),
            177 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/257.jpg',
              'name' => 'Woss',
              'description' => 'Hwy 19, 75 km south east of Port McNeill and 128 km north of Campbell River, looking east.',
              'latitude' => 50.215912000000003,
              'longitude' => -126.59483400000001,
            ),
            178 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/259.jpg',
              'name' => 'Hwy 11 at Farmer Rd-N',
              'description' => 'Hwy 11 at Farmer Rd, looking north.',
              'latitude' => 49.009475000000002,
              'longitude' => -122.26523899999999,
            ),
            179 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/260.jpg',
              'name' => 'Hwy 11 at Farmer Rd-S',
              'description' => 'Hwy 11 at Farmer Rd, looking south.',
              'latitude' => 49.009475000000002,
              'longitude' => -122.26523899999999,
            ),
            180 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/261.jpg',
              'name' => 'Hwy 13 @ 264 Diversion-S',
              'description' => 'Hwy 13 @ 264 Diversion,south of 8th Ave, looking south.',
              'latitude' => 49.011816000000003,
              'longitude' => -122.492594,
            ),
            181 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/262.jpg',
              'name' => 'Gold River Highway',
              'description' => 'Hwy 28, (Gold River Hwy) about 24 km west of Campbell River, looking west.',
              'latitude' => 49.961677999999999,
              'longitude' => -125.510814,
            ),
            182 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/263.jpg',
              'name' => 'McTavish Rd - N',
              'description' => 'Hwy 17 at McTavish Road, looking north.',
              'latitude' => 48.629976999999997,
              'longitude' => -123.412233,
            ),
            183 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/264.jpg',
              'name' => 'McTavish Rd - S',
              'description' => 'Hwy 17 at McTavish Road, looking south.',
              'latitude' => 48.629976999999997,
              'longitude' => -123.412233,
            ),
            184 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/265.jpg',
              'name' => 'Burnaby - E',
              'description' => 'Hwy 1, about 500m west of Gaglardi Way, looking east.',
              'latitude' => 49.240174000000003,
              'longitude' => -122.91850100000001,
            ),
            185 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/266.jpg',
              'name' => 'Burnaby - W',
              'description' => 'Hwy 1, about 500m west of Gaglardi Way, looking west.',
              'latitude' => 49.240174000000003,
              'longitude' => -122.91850100000001,
            ),
            186 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/267.jpg',
              'name' => 'Hwy 17 at Sayward Rd - N',
              'description' => 'Hwy 17 at Sayward Road, looking north.',
              'latitude' => 48.537438000000002,
              'longitude' => -123.38901300000001,
            ),
            187 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/268.jpg',
              'name' => 'Clearbrook - N',
              'description' => 'Hwy 1 at Clearbrook Rd, looking north.',
              'latitude' => 49.037658999999998,
              'longitude' => -122.337231,
            ),
            188 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/269.jpg',
              'name' => 'Clearbrook - E',
              'description' => 'Hwy 1 at Clearbrook Rd, looking east.',
              'latitude' => 49.037658999999998,
              'longitude' => -122.337231,
            ),
            189 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/270.jpg',
              'name' => 'Clearbrook - S',
              'description' => 'Hwy 1 at Clearbrook Rd, looking south.',
              'latitude' => 49.037658999999998,
              'longitude' => -122.337231,
            ),
            190 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/271.jpg',
              'name' => 'Clearbrook - W',
              'description' => 'Hwy 1 at Clearbrook Rd, looking west.',
              'latitude' => 49.037658999999998,
              'longitude' => -122.337231,
            ),
            191 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/272.jpg',
              'name' => 'South Shawnigan Lake Rd - W',
              'description' => 'Hwy 1 at South Shawnigan Lake Rd, looking west.',
              'latitude' => 48.561230999999999,
              'longitude' => -123.569743,
            ),
            192 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/273.jpg',
              'name' => 'Malahat Drive - S',
              'description' => 'Hwy 1 at South Shawnigan Lake Road, looking south.',
              'latitude' => 48.561230999999999,
              'longitude' => -123.569743,
            ),
            193 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/275.jpg',
              'name' => 'Port Mann Bridge - E',
              'description' => 'Hwy 1 at Port Mann Bridge, looking eastbound.',
              'latitude' => 49.210133999999996,
              'longitude' => -122.80746499999999,
            ),
            194 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/277.jpg',
              'name' => 'Hwy 1 at 232nd St - N',
              'description' => 'Hwy 1 westbound on-ramp from 232nd St, looking north.',
              'latitude' => 49.134869000000002,
              'longitude' => -122.579894,
            ),
            195 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/278.jpg',
              'name' => 'Hwy 1 at 232nd St - W',
              'description' => 'Hwy 1 at 232nd St. overpass, looking west.',
              'latitude' => 49.134869000000002,
              'longitude' => -122.579894,
            ),
            196 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/279.jpg',
              'name' => 'Hwy 1 at 232nd St - E',
              'description' => 'Hwy 1, at 232nd Street Overpass, looking east.',
              'latitude' => 49.134869000000002,
              'longitude' => -122.579894,
            ),
            197 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/280.jpg',
              'name' => 'Hwy 1 at 232nd St - S',
              'description' => 'Hwy 1 eastbound on-ramp from 232nd St, looking south.',
              'latitude' => 49.134869000000002,
              'longitude' => -122.579894,
            ),
            198 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/281.jpg',
              'name' => 'Othello - N',
              'description' => 'Hwy 5 at Othello, about 11 km east of Hope, looking north.',
              'latitude' => 49.378051999999997,
              'longitude' => -121.34116899999999,
            ),
            199 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/282.jpg',
              'name' => 'Othello - S',
              'description' => 'Hwy 5 at Othello, about 11 km east of Hope, looking south.',
              'latitude' => 49.378051999999997,
              'longitude' => -121.34116899999999,
            ),
            200 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/284.jpg',
              'name' => 'Hwy 99 - 32nd Ave Diversion - S',
              'description' => 'Hwy 99, north of 32nd Ave Diversion, looking south.',
              'latitude' => 49.062945999999997,
              'longitude' => -122.807643,
            ),
            201 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/285.jpg',
              'name' => 'Hwy 99 - 32nd Ave Diversion - N',
              'description' => 'Hwy 99, north of 32nd Ave Diversion, looking north.',
              'latitude' => 49.062945999999997,
              'longitude' => -122.807643,
            ),
            202 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/286.jpg',
              'name' => 'Chimdemash',
              'description' => 'Hwy 16 near Chimdemash Creek, about 22 KM east of Hwy 16 and Hwy 37 Junction near Terrace looking north east.',
              'latitude' => 54.657221,
              'longitude' => -128.38556,
            ),
            203 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/287.jpg',
              'name' => 'Comstock',
              'description' => 'Hwy 5 at Comstock Rd, about 15 km south of Merritt, looking north.',
              'latitude' => 50.019719000000002,
              'longitude' => -120.82043299999999,
            ),
            204 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/291.jpg',
              'name' => 'Hwy 99 at Westminster Hwy - N',
              'description' => 'Hwy 99 at Westminster Hwy in Richmond, looking north.',
              'latitude' => 49.167279999999998,
              'longitude' => -123.086831,
            ),
            205 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/292.jpg',
              'name' => 'Port Mann Bridge - W',
              'description' => 'Hwy 1 at Port Mann Bridge, looking westbound.',
              'latitude' => 49.210133999999996,
              'longitude' => -122.80746499999999,
            ),
            206 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/293.jpg',
              'name' => 'Hwy 13 @ 264 Diversion-N',
              'description' => 'Hwy 13 @ 264 Diversion,south of 8th Ave, looking north.',
              'latitude' => 49.011816000000003,
              'longitude' => -122.492594,
            ),
            207 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/294.jpg',
              'name' => 'Monte Creek - E',
              'description' => 'Hwy 1, between Monte Creek and Pritchard, looking east.',
              'latitude' => 50.645980000000002,
              'longitude' => -119.90503200000001,
            ),
            208 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/295.jpg',
              'name' => 'Monte Creek - W',
              'description' => 'Hwy 1, between Monte Creek and Pritchard, looking west.',
              'latitude' => 50.645980000000002,
              'longitude' => -119.90503200000001,
            ),
            209 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/296.jpg',
              'name' => 'Clanwilliam Railway Overpass - E',
              'description' => 'Hwy 1, west of Revelstoke, looking east.',
              'latitude' => 50.967548000000001,
              'longitude' => -118.359165,
            ),
            210 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/297.jpg',
              'name' => 'Hells Gate - S',
              'description' => 'Hwy 1 at Bradley Hill, about 3.5 km south of Hells Gate, looking south.',
              'latitude' => 49.757026000000003,
              'longitude' => -121.418144,
            ),
            211 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/298.jpg',
              'name' => 'Hells Gate - N',
              'description' => 'Hwy 1 at Bradley Hill, about 3.5 km south of Hells Gate, looking north.',
              'latitude' => 49.757026000000003,
              'longitude' => -121.418144,
            ),
            212 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/299.jpg',
              'name' => 'Hwy 11 at Harris Rd - E',
              'description' => 'Hwy 11 at Harris Rd, looking east',
              'latitude' => 49.103718000000001,
              'longitude' => -122.289908,
            ),
            213 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/300.jpg',
              'name' => 'Hwy 11 at Harris Rd - W',
              'description' => 'Hwy 11 at Harris Rd, looking west.',
              'latitude' => 49.103718000000001,
              'longitude' => -122.289908,
            ),
            214 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/301.jpg',
              'name' => 'Hwy 11 at Harris Rd - N',
              'description' => 'Hwy 11 at Harris Rd, looking north',
              'latitude' => 49.103718000000001,
              'longitude' => -122.289908,
            ),
            215 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/302.jpg',
              'name' => 'Hwy 11 at Harris Rd - S',
              'description' => 'Hwy 11 at Harris Rd, looking south.',
              'latitude' => 49.103718000000001,
              'longitude' => -122.289908,
            ),
            216 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/303.jpg',
              'name' => 'Balfour Ferry Terminal',
              'description' => 'Balfour inland ferry terminal, looking north towards Hwy 3A.',
              'latitude' => 49.624352000000002,
              'longitude' => -116.95933599999999,
            ),
            217 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/304.jpg',
              'name' => 'Kootenay Bay Ferry Terminal',
              'description' => 'Kootenay Bay Ferry Terminal, looking northeast on Hwy 3A.',
              'latitude' => 49.675227,
              'longitude' => -116.87272900000001,
            ),
            218 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/305.jpg',
              'name' => 'Nelson',
              'description' => 'Hwy 6 near Hwy 3A and Rosemont/Uphill interchange, looking south.',
              'latitude' => 49.482156000000003,
              'longitude' => -117.292697,
            ),
            219 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/306.jpg',
              'name' => 'Creston',
              'description' => 'Hwy 3 and Hwy 3A junction at Creston, looking southeast.',
              'latitude' => 49.118626999999996,
              'longitude' => -116.523822,
            ),
            220 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/307.jpg',
              'name' => 'Trail',
              'description' => 'Hwy 3B at Devito Drive, looking east.',
              'latitude' => 49.089964000000002,
              'longitude' => -117.632644,
            ),
            221 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/308.jpg',
              'name' => 'Hwy 99 at Westminster Hwy - S',
              'description' => 'Hwy 99 at Westminster Hwy in Richmond, looking south.',
              'latitude' => 49.167279999999998,
              'longitude' => -123.086831,
            ),
            222 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/309.jpg',
              'name' => 'Hwy 99 at Cambie Rd-N',
              'description' => 'Hwy 99 at Cambie Rd in Richmond, looking north.',
              'latitude' => 49.184859000000003,
              'longitude' => -123.10840899999999,
            ),
            223 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/310.jpg',
              'name' => 'Hwy 99 at Cambie Rd-S',
              'description' => 'Hwy 99 at Cambie Rd in Richmond, looking south.',
              'latitude' => 49.184859000000003,
              'longitude' => -123.10840899999999,
            ),
            224 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/311.jpg',
              'name' => 'Hwy 17A at Hwy 10 - N',
              'description' => 'Hwy 17A, about 0.5 km south of Hwy 10 in Delta, looking north.',
              'latitude' => 49.083666000000001,
              'longitude' => -123.056938,
            ),
            225 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/312.jpg',
              'name' => 'Hwy 17A at Hwy 10 - S',
              'description' => 'Hwy 17A, about 0.5 km south of Hwy 10 in Delta, looking south.',
              'latitude' => 49.083666000000001,
              'longitude' => -123.056938,
            ),
            226 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/313.jpg',
              'name' => 'Hwy 99 at Mud Bay - W',
              'description' => 'Hwy 99 near Hwy 91 (Mud Bay) in Surrey, looking west on Hwy 99 (northbound).',
              'latitude' => 49.091036000000003,
              'longitude' => -122.872608,
            ),
            227 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/314.jpg',
              'name' => 'Hwy 99 at Mud Bay - E',
              'description' => 'Hwy 99 near Hwy 91 (Mud Bay) in Surrey, looking east on Hwy 99 (southbound).',
              'latitude' => 49.091036000000003,
              'longitude' => -122.872608,
            ),
            228 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/315.jpg',
              'name' => 'Hwy 91 at 72nd Ave - N',
              'description' => 'Hwy 91 at 72<sup>nd</sup> Ave. in Delta, looking north.',
              'latitude' => 49.134141,
              'longitude' => -122.92861600000001,
            ),
            229 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/316.jpg',
              'name' => 'Hwy 91 at 72nd Ave - S',
              'description' => 'Hwy 91 at 72<sup>nd</sup> Ave. in Delta, looking south.',
              'latitude' => 49.134141,
              'longitude' => -122.92861600000001,
            ),
            230 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/317.jpg',
              'name' => 'Hwy 91 at 72nd Ave - E',
              'description' => 'Hwy 91 at 72<sup>nd</sup> Ave in Delta, looking east on 72nd.',
              'latitude' => 49.134141,
              'longitude' => -122.92861600000001,
            ),
            231 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/318.jpg',
              'name' => 'Hwy 91A at Howes-E',
              'description' => 'Hwy 91A at Howes, looking east.',
              'latitude' => 49.184873000000003,
              'longitude' => -122.952709,
            ),
            232 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/319.jpg',
              'name' => 'Hwy 91A at Howes-W',
              'description' => 'Hwy 91A at Howes, looking west.',
              'latitude' => 49.184873000000003,
              'longitude' => -122.952709,
            ),
            233 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/322.jpg',
              'name' => 'Hwy 91 at No.6 Rd-E',
              'description' => 'Hwy 91 (East-West Connector) at No.6 Rd, looking east.',
              'latitude' => 49.177774999999997,
              'longitude' => -123.06607099999999,
            ),
            234 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/323.jpg',
              'name' => 'Hwy 91 at No.6 Rd-W',
              'description' => 'Hwy 91 (East-West Connector) at No.6 Rd, looking West.',
              'latitude' => 49.177774999999997,
              'longitude' => -123.06607099999999,
            ),
            235 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/324.jpg',
              'name' => 'Annis Rd - N',
              'description' => 'Hwy 1 at Annis Rd, looking north.',
              'latitude' => 49.154525999999997,
              'longitude' => -121.830299,
            ),
            236 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/325.jpg',
              'name' => 'Annis Rd - E',
              'description' => 'Hwy 1 at Annis Rd, looking east.',
              'latitude' => 49.154525999999997,
              'longitude' => -121.830299,
            ),
            237 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/326.jpg',
              'name' => 'Annis Rd - S',
              'description' => 'Hwy 1 at Annis Rd, looking south.',
              'latitude' => 49.154525999999997,
              'longitude' => -121.830299,
            ),
            238 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/327.jpg',
              'name' => 'Annis Rd - W',
              'description' => 'Hwy 1 at Annis Rd, looking west.',
              'latitude' => 49.154525999999997,
              'longitude' => -121.830299,
            ),
            239 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/328.jpg',
              'name' => 'Granisle Hwy',
              'description' => 'Granisle Hwy - Hwy 118, near summit. Approximately 14.5 km north of Topley, looking north.',
              'latitude' => 54.657052,
              'longitude' => -126.30359,
            ),
            240 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/329.jpg',
              'name' => 'Hwy 9 at Agassiz-Rosedale Bridge',
              'description' => 'Hwy 9 at Rosedale Bridge on north side, looking south.',
              'latitude' => 49.201911000000003,
              'longitude' => -121.777916,
            ),
            241 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/330.jpg',
              'name' => 'Prest Rd - N',
              'description' => 'Hwy 1 at Prest Rd, Chilliwack, looking north.',
              'latitude' => 49.155264000000003,
              'longitude' => -121.918114,
            ),
            242 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/331.jpg',
              'name' => 'Prest Rd - E',
              'description' => 'Hwy 1 at Prest Rd, Chilliwack, looking east.',
              'latitude' => 49.155264000000003,
              'longitude' => -121.918114,
            ),
            243 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/332.jpg',
              'name' => 'Prest Rd - S',
              'description' => 'Hwy 1 at Prest Rd, Chilliwack, looking south.',
              'latitude' => 49.155264000000003,
              'longitude' => -121.918114,
            ),
            244 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/333.jpg',
              'name' => 'Prest Rd - W',
              'description' => 'Hwy 1 at Prest Rd, Chilliwack, looking west.',
              'latitude' => 49.155264000000003,
              'longitude' => -121.918114,
            ),
            245 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/334.jpg',
              'name' => 'Bombi Pass',
              'description' => 'Hwy 3, at the Bombi Summit, approximately 21.5 km south-east of Castlegar, looking west.',
              'latitude' => 49.236002999999997,
              'longitude' => -117.520886,
            ),
            246 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/335.jpg',
              'name' => 'Gitwinksihlkw',
              'description' => 'Hwy 113 at Anlaw Rd, near Gitwinksihlkw, within Nisgaa Memorial Lava Bed Provincial Park, looking east.',
              'latitude' => 55.186928999999999,
              'longitude' => -129.19994800000001,
            ),
            247 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/336.jpg',
              'name' => 'Hwy 16 at Trout Creek',
              'description' => 'Hwy 16 at the Trout Creek bridge, looking east.',
              'latitude' => 54.941204999999997,
              'longitude' => -127.325592,
            ),
            248 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/337.jpg',
              'name' => 'Sorrento - Blind Bay',
              'description' => 'Hwy 1, at Highland Drive east of Sorrento at the Blind Bay turn off, looking southeast.',
              'latitude' => 50.875802999999998,
              'longitude' => -119.38977,
            ),
            249 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/338.jpg',
              'name' => 'Barriere',
              'description' => 'Hwy 5 at Agate Bay Rd, south of Barriere. Looking south.',
              'latitude' => 51.142158000000002,
              'longitude' => -120.12253699999999,
            ),
            250 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/339.jpg',
              'name' => 'Dunster Station Rd',
              'description' => 'Hwy 16 at Dunster Station Rd, about 30 km east of McBride, looking east.',
              'latitude' => 53.151755999999999,
              'longitude' => -119.82450799999999,
            ),
            251 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/340.jpg',
              'name' => 'McLeese Lake',
              'description' => 'Hwy 97 and Beaver Lake Rd junction north of McLeese Lake, looking east.',
              'latitude' => 52.425919,
              'longitude' => -122.299924,
            ),
            252 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/341.jpg',
              'name' => 'Jackass Mnt. Summit',
              'description' => 'Hwy 1 at Jackass Mt. Summit, between Boston Bar and Lytton, looking north.',
              'latitude' => 50.076144999999997,
              'longitude' => -121.54767099999999,
            ),
            253 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/342.jpg',
              'name' => 'Hwy 14 at Trailhead Dr',
              'description' => 'Hwy 14 near Cormorant Way/Trailhead Dr, looking east.',
              'latitude' => 48.432102,
              'longitude' => -124.06997,
            ),
            254 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/343.jpg',
              'name' => 'Cobble Hill Rd',
              'description' => 'Hwy 1 at Cowichan Bay Rd/Cobble Hill Rd',
              'latitude' => 48.707287000000001,
              'longitude' => -123.60755899999999,
            ),
            255 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/344.jpg',
              'name' => 'Helmcken - N',
              'description' => 'Hwy 1 at Helmcken Overpass looking north',
              'latitude' => 48.463884,
              'longitude' => -123.43094499999999,
            ),
            256 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/345.jpg',
              'name' => 'Helmcken - S',
              'description' => 'Hwy 1 at Helmcken overpass, looking south.',
              'latitude' => 48.463884,
              'longitude' => -123.43094499999999,
            ),
            257 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/346.jpg',
              'name' => 'Helmcken - E',
              'description' => 'Hwy 1 at Helmcken overpass, looking east.',
              'latitude' => 48.463884,
              'longitude' => -123.43094499999999,
            ),
            258 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/347.jpg',
              'name' => 'Helmcken - W',
              'description' => 'Hwy 1 at Helmcken Overpass, looking west.',
              'latitude' => 48.463884,
              'longitude' => -123.43094499999999,
            ),
            259 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/348.jpg',
              'name' => 'French Creek Bridge',
              'description' => 'Hwy 19 at French Creek Bridge, south of Hwy 4 intersection, looking northwest.',
              'latitude' => 49.322141999999999,
              'longitude' => -124.41121099999999,
            ),
            260 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/349.jpg',
              'name' => 'Admirals-McKenzie - N',
              'description' => 'Hwy 1, at Admirals Rd - McKenzie Ave, looking north.',
              'latitude' => 48.459606000000001,
              'longitude' => -123.404776,
            ),
            261 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/350.jpg',
              'name' => 'Admirals-McKenzie - S',
              'description' => 'Hwy 1, at Admirals Rd - McKenzie Ave, looking south.',
              'latitude' => 48.459606000000001,
              'longitude' => -123.404776,
            ),
            262 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/351.jpg',
              'name' => 'Admirals-McKenzie - W',
              'description' => 'Hwy 1, at Admirals Rd - McKenzie Ave, looking west.',
              'latitude' => 48.459606000000001,
              'longitude' => -123.404776,
            ),
            263 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/352.jpg',
              'name' => 'Admirals-McKenzie - E',
              'description' => 'Hwy 1, at Admirals Rd - McKenzie Ave, looking east.',
              'latitude' => 48.459606000000001,
              'longitude' => -123.404776,
            ),
            264 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/353.jpg',
              'name' => 'BC-Yukon Border',
              'description' => 'Hwy 37 at BC-Yukon Border',
              'latitude' => 59.998044999999998,
              'longitude' => -129.05408399999999,
            ),
            265 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/354.jpg',
              'name' => 'Bradner Rd - W',
              'description' => 'Hwy 1, west of Abbotsford near Bradner Road, looking west.',
              'latitude' => 49.076058000000003,
              'longitude' => -122.427633,
            ),
            266 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/355.jpg',
              'name' => 'McDonald Summit',
              'description' => 'Hwy 24, 15 km west of Little Fort, looking west.',
              'latitude' => 51.496785000000003,
              'longitude' => -120.338723,
            ),
            267 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/356.jpg',
              'name' => 'Bradner Rd - E',
              'description' => 'Hwy 1, eastbound west of Abbotsford near Bradner Road, looking east.',
              'latitude' => 49.076058000000003,
              'longitude' => -122.427633,
            ),
            268 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/357.jpg',
              'name' => 'Mary Hill Bypass at Shaughnessy - E',
              'description' => 'Hwy 7B/Mary Hill Bypass at Shaughnessy St looking east.',
              'latitude' => 49.227347000000002,
              'longitude' => -122.79571900000001,
            ),
            269 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/358.jpg',
              'name' => 'Mary Hill Bypass at Shaughnessy - W',
              'description' => 'Hwy 7B/Mary Hill Bypass at Shaughnessy St looking west.',
              'latitude' => 49.227347000000002,
              'longitude' => -122.79571900000001,
            ),
            270 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/359.jpg',
              'name' => 'Lougheed at Harris Rd - E',
              'description' => 'Hwy 7 (Lougheed Hwy) at Harris Road, looking east.',
              'latitude' => 49.230910999999999,
              'longitude' => -122.689322,
            ),
            271 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/360.jpg',
              'name' => 'Lougheed at Harris Rd - W',
              'description' => 'Hwy 7 (Lougheed Hwy) at Harris Road, looking west.',
              'latitude' => 49.230910999999999,
              'longitude' => -122.689322,
            ),
            272 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/361.jpg',
              'name' => 'Lougheed at Harris Rd - S',
              'description' => 'Hwy 7 (Lougheed Hwy) at Harris Road, looking south.',
              'latitude' => 49.230910999999999,
              'longitude' => -122.689322,
            ),
            273 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/362.jpg',
              'name' => 'Lougheed at Harris Rd - N',
              'description' => 'Hwy 7 (Lougheed Hwy) at Harris Road, looking north.',
              'latitude' => 49.230910999999999,
              'longitude' => -122.689322,
            ),
            274 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/363.jpg',
              'name' => 'Lougheed at Maple Meadows Way - S',
              'description' => 'Lougheed Hwy looking south onto Maple Meadows Way.',
              'latitude' => 49.221046000000001,
              'longitude' => -122.66417800000001,
            ),
            275 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/364.jpg',
              'name' => 'Lougheed at Dewdney Trunk Rd - N',
              'description' => 'Lougheed Hwy looking north onto Dewdney Trunk Rd.',
              'latitude' => 49.221046000000001,
              'longitude' => -122.66417800000001,
            ),
            276 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/365.jpg',
              'name' => 'Lougheed at Dewdney Trunk Rd - W',
              'description' => 'Lougheed Hwy looking west.',
              'latitude' => 49.221046000000001,
              'longitude' => -122.66417800000001,
            ),
            277 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/366.jpg',
              'name' => 'Lougheed at Dewdney Trunk Rd - E',
              'description' => 'Lougheed Highway looking east.',
              'latitude' => 49.221046000000001,
              'longitude' => -122.66417800000001,
            ),
            278 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/367.jpg',
              'name' => 'Six Mile Hill',
              'description' => 'On Hwy 16, 40 km west of Burns Lake looking west.',
              'latitude' => 54.453837999999998,
              'longitude' => -126.19616499999999,
            ),
            279 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/368.jpg',
              'name' => 'Big Bar',
              'description' => 'Hwy 97, 8 km north of Clinton just before Big Bar rest area, looking north.',
              'latitude' => 51.145319999999998,
              'longitude' => -121.501611,
            ),
            280 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/369.jpg',
              'name' => 'Callan Rd',
              'description' => 'Hwy 97 at Callan Rd, about 6 km north of Summerland, about 15 km south of Peachland. Looking south.',
              'latitude' => 49.656300000000002,
              'longitude' => -119.699618,
            ),
            281 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/370.jpg',
              'name' => 'Aspen Grove',
              'description' => 'Hwy 97C at Hwy 5A Junction, near Aspen Grove, looking south.',
              'latitude' => 49.953639000000003,
              'longitude' => -120.61747200000001,
            ),
            282 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/371.jpg',
              'name' => 'Hwy 99 at Hwy 17A - South',
              'description' => 'Hwy 99, north of Hwy 17A overpass, looking south on Hwy 99 at northbound lanes.',
              'latitude' => 49.108682000000002,
              'longitude' => -123.056506,
            ),
            283 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/372.jpg',
              'name' => 'Hwy 99 at Hwy 17A - West',
              'description' => 'Hwy 99 at Hwy 17A overpass, looking west to Hwy 17A.',
              'latitude' => 49.108682000000002,
              'longitude' => -123.056506,
            ),
            284 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/373.jpg',
              'name' => 'Hwy 99 at Hwy 17A - River Rd',
              'description' => 'Hwy 99 at Hwy 17A overpass, looking east to 62B/River Rd.',
              'latitude' => 49.108682000000002,
              'longitude' => -123.056506,
            ),
            285 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/374.jpg',
              'name' => 'Hwy 99 at Hwy 17A - Northbound',
              'description' => 'Hwy 99, north of Hwy 17A overpass, looking north on Hwy 99 at northbound lanes.',
              'latitude' => 49.109189000000001,
              'longitude' => -123.05441500000001,
            ),
            286 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/375.jpg',
              'name' => 'Kennedy Lake',
              'description' => 'Hwy 4, by Kennedy Lake, looking west.',
              'latitude' => 49.100650000000002,
              'longitude' => -125.45269,
            ),
            287 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/376.jpg',
              'name' => 'Mackenzie Junction',
              'description' => 'Hwy 97 at Hwy 39, about 29 km south of Mackenzie looking east.',
              'latitude' => 55.119377,
              'longitude' => -122.959238,
            ),
            288 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/377.jpg',
              'name' => 'Boston Bar - S',
              'description' => 'Hwy 1 at Kahmoose Rd, 12 km north of Boston Bar, looking south.',
              'latitude' => 49.963844000000002,
              'longitude' => -121.4821384,
            ),
            289 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/378.jpg',
              'name' => 'New Hazelton',
              'description' => 'Hwy 16 at McLeod St in New Hazelton, looking east.',
              'latitude' => 55.246651,
              'longitude' => -127.58424599999999,
            ),
            290 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/379.jpg',
              'name' => 'Coquihalla Summit - N',
              'description' => 'Hwy 5, at Zopkios, near the Coquihalla Summit, looking north.',
              'latitude' => 49.595621000000001,
              'longitude' => -121.116056,
            ),
            291 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/380.jpg',
              'name' => 'Coquihalla Summit - S',
              'description' => 'Hwy 5, at Zopkios, near the Coquihalla Summit, looking south.',
              'latitude' => 49.595621000000001,
              'longitude' => -121.116056,
            ),
            292 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/381.jpg',
              'name' => 'Ucluelet-Tofino Hwy Junction',
              'description' => 'Hwy 4 at Ucluelet-Tofino Hwy junction, looking north.',
              'latitude' => 48.991852999999999,
              'longitude' => -125.587997,
            ),
            293 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/382.jpg',
              'name' => 'Grizzly Hill',
              'description' => 'Hwy 113 (Nass Rd) about 3 km southwest of Village of Laxgaltsap (Greenville), looking west.',
              'latitude' => 55.018414,
              'longitude' => -129.61819499999999,
            ),
            294 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/383.jpg',
              'name' => 'Hwy 3 at Hwy3/5 Jct-E',
              'description' => 'Highway 3 at 3/5 junction looking east.',
              'latitude' => 49.36159,
              'longitude' => -121.36359400000001,
            ),
            295 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/385.jpg',
              'name' => 'Donald Bridge - E',
              'description' => 'Hwy 1, about 28 km north of Golden at Donald Bridge, looking east.',
              'latitude' => 51.486975000000001,
              'longitude' => -117.16541100000001,
            ),
            296 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/386.jpg',
              'name' => 'Donald Bridge - W',
              'description' => 'Hwy 1, about 28 km north of Golden at Donald Bridge, looking west.',
              'latitude' => 51.486975000000001,
              'longitude' => -117.16541100000001,
            ),
            297 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/390.jpg',
              'name' => 'King George Blvd at Hwy 99 - E',
              'description' => 'King George Blvd at Hwy 99, looking east.',
              'latitude' => 49.074044999999998,
              'longitude' => -122.822264,
            ),
            298 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/391.jpg',
              'name' => 'Hwy 99 at King George Blvd - N',
              'description' => 'Hwy 99 at King George Blvd, looking north.',
              'latitude' => 49.074044999999998,
              'longitude' => -122.822264,
            ),
            299 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/392.jpg',
              'name' => 'Hwy 99 at King George Blvd - S',
              'description' => 'Hwy 99 at King George Blvd, looking south.',
              'latitude' => 49.074044999999998,
              'longitude' => -122.822264,
            ),
            300 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/393.jpg',
              'name' => 'King George Blvd at Hwy 99 - W',
              'description' => 'King George Blvd at Hwy 99, looking west.',
              'latitude' => 49.074044999999998,
              'longitude' => -122.822264,
            ),
            301 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/395.jpg',
              'name' => 'Mill Bay - N',
              'description' => 'Hwy 1 at Shawnigan Mill Bay Rd, looking north.',
              'latitude' => 48.657324000000003,
              'longitude' => -123.561089,
            ),
            302 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/396.jpg',
              'name' => 'Mill Bay - S',
              'description' => 'Hwy 1 at Shawnigan Mill Bay Rd, looking south.',
              'latitude' => 48.657324000000003,
              'longitude' => -123.561089,
            ),
            303 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/397.jpg',
              'name' => 'Mill Bay - W',
              'description' => 'Hwy 1 at Shawnigan Mill Bay Rd, looking west.',
              'latitude' => 48.657324000000003,
              'longitude' => -123.561089,
            ),
            304 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/398.jpg',
              'name' => 'Duncan - E',
              'description' => 'Hwy 1 in Duncan at Trunk Rd, looking east.',
              'latitude' => 48.776744000000001,
              'longitude' => -123.698943,
            ),
            305 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/399.jpg',
              'name' => 'Duncan - N',
              'description' => 'Hwy 1 in Duncan at Trunk Rd, looking north.',
              'latitude' => 48.776744000000001,
              'longitude' => -123.698943,
            ),
            306 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/400.jpg',
              'name' => 'Duncan - S',
              'description' => 'Hwy 1 in Duncan at Trunk Rd, looking south.',
              'latitude' => 48.776744000000001,
              'longitude' => -123.698943,
            ),
            307 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/402.jpg',
              'name' => 'Hwy 19 at Port Alice Rd',
              'description' => 'Hwy 19 at Hwy 30 (Port Alice Rd) junction, between Port Hardy and Port McNeill, looking south.',
              'latitude' => 50.603530999999997,
              'longitude' => -127.308842,
            ),
            308 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/403.jpg',
              'name' => 'Sumas Way - W',
              'description' => 'Hwy 1 at Hwy 11 (Sumas Way) in Abbotsford, looking west.',
              'latitude' => 49.033129000000002,
              'longitude' => -122.266335,
            ),
            309 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/404.jpg',
              'name' => 'Sumas Way - E',
              'description' => 'Hwy 1 at Hwy 11 (Sumas Way) in Abbotsford, looking east.',
              'latitude' => 49.033129000000002,
              'longitude' => -122.266335,
            ),
            310 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/405.jpg',
              'name' => 'Sumas Way - N',
              'description' => 'Hwy 1 at Hwy 11 (Sumas Way) in Abbotsford, looking north.',
              'latitude' => 49.033129000000002,
              'longitude' => -122.266335,
            ),
            311 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/406.jpg',
              'name' => 'Sumas Way - S',
              'description' => 'Hwy 1 at Hwy 11 (Sumas Way) in Abbotsford, looking south.',
              'latitude' => 49.033129000000002,
              'longitude' => -122.266335,
            ),
            312 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/423.jpg',
              'name' => 'Colwood - W',
              'description' => 'Hwy 1, southbound, near the View Royal/Colwood exit, looking west.',
              'latitude' => 48.462105000000001,
              'longitude' => -123.449183,
            ),
            313 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/424.jpg',
              'name' => 'Malahat Summit - N',
              'description' => 'Hwy 1, about 3.7 km south of Bamberton, looking east.',
              'latitude' => 48.567912,
              'longitude' => -123.542123,
            ),
            314 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/425.jpg',
              'name' => 'Butterfield Rd - N',
              'description' => 'Hwy 1, approximately 3 km south of Mill Bay, looking north.',
              'latitude' => 48.627186000000002,
              'longitude' => -123.548202,
            ),
            315 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/426.jpg',
              'name' => 'Tsitika',
              'description' => 'Hwy 19, Tsitika, 101 km north of Campbell River and about 27 km south of Woss, looking south-east.',
              'latitude' => 50.283389,
              'longitude' => -126.351743,
            ),
            316 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/427.jpg',
              'name' => 'Malahat Summit - S',
              'description' => 'Hwy 1, about 3.7 km south of Bamberton, looking west.',
              'latitude' => 48.567912,
              'longitude' => -123.542123,
            ),
            317 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/428.jpg',
              'name' => 'Butterfield Rd - S',
              'description' => 'Hwy 1, approximately 3 km south of Mill Bay, looking south.',
              'latitude' => 48.627186000000002,
              'longitude' => -123.548202,
            ),
            318 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/429.jpg',
              'name' => 'Colwood - E',
              'description' => 'Hwy 1, northbound, near the View Royal/Colwood exit, looking east.',
              'latitude' => 48.462105000000001,
              'longitude' => -123.449183,
            ),
            319 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/430.jpg',
              'name' => 'Ladysmith',
              'description' => 'Hwy 1 at South Davis Rd, south of Ladysmith, looking south.',
              'latitude' => 48.968398000000001,
              'longitude' => -123.790583,
            ),
            320 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/431.jpg',
              'name' => 'Sicamous - E',
              'description' => 'Hwy 1, east of Sicamous at Cambie/Solsqua Roads, looking east.',
              'latitude' => 50.891691399999999,
              'longitude' => -118.8683837,
            ),
            321 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/432.jpg',
              'name' => 'Spencer Rd - N',
              'description' => 'Hwy 1 at Spencer Rd, northbound looking west.',
              'latitude' => 48.452964999999999,
              'longitude' => -123.50999299999999,
            ),
            322 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/433.jpg',
              'name' => 'Spencer Rd - S',
              'description' => 'Hwy 1 at Spencer Rd, southbound looking east.',
              'latitude' => 48.452964999999999,
              'longitude' => -123.50999299999999,
            ),
            323 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/434.jpg',
              'name' => 'Hwy 10 at Fraser Hwy - NW',
              'description' => 'Hwy 10 at Fraser Hwy in Langley, looking northwest.',
              'latitude' => 49.111891999999997,
              'longitude' => -122.675444,
            ),
            324 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/435.jpg',
              'name' => 'Hwy 10 at Fraser Hwy - NE',
              'description' => 'Hwy 10 at Fraser Hwy in Langley, looking northwest.',
              'latitude' => 49.111891999999997,
              'longitude' => -122.675444,
            ),
            325 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/436.jpg',
              'name' => 'Hwy 10 at Fraser Hwy - SW',
              'description' => 'Hwy 10 at Fraser Hwy in Langley, looking southwest.',
              'latitude' => 49.111891999999997,
              'longitude' => -122.675444,
            ),
            326 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/437.jpg',
              'name' => 'Hwy 10 at Fraser Hwy - SE',
              'description' => 'Hwy 10 at Fraser Hwy in Langley, looking southeast.',
              'latitude' => 49.111891999999997,
              'longitude' => -122.675444,
            ),
            327 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/438.jpg',
              'name' => 'Hwy 10 at 200th St - N',
              'description' => 'Hwy 10 at 200th St in Langley, looking north.',
              'latitude' => 49.113,
              'longitude' => -122.668464,
            ),
            328 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/439.jpg',
              'name' => 'Hwy 10 at 200th St - W',
              'description' => 'Hwy 10 at 200th St in Langley, looking west.',
              'latitude' => 49.113,
              'longitude' => -122.668464,
            ),
            329 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/440.jpg',
              'name' => 'Hwy 10 at 200th St - E',
              'description' => 'Hwy 10 at 200th St in Langley, looking east.',
              'latitude' => 49.113,
              'longitude' => -122.668464,
            ),
            330 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/441.jpg',
              'name' => 'Hwy 10 at 200th St - S',
              'description' => 'Hwy 10 at 200th St in Langley, looking south.',
              'latitude' => 49.113,
              'longitude' => -122.668464,
            ),
            331 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/442.jpg',
              'name' => 'Needles Ferry',
              'description' => 'Hwy 6 at Needles Ferry landing, looking west.',
              'latitude' => 49.874377799999998,
              'longitude' => -118.09762499999999,
            ),
            332 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/443.jpg',
              'name' => 'Fauquier Ferry',
              'description' => 'Hwy 6 at Fauquier ferry landing, looking east.',
              'latitude' => 49.871677800000001,
              'longitude' => -118.08153059999999,
            ),
            333 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/444.jpg',
              'name' => 'Hwy 99 at 8th Ave - S',
              'description' => 'Hwy 99 at 8th Avenue in White Rock, looking south.',
              'latitude' => 49.014668,
              'longitude' => -122.75811899999999,
            ),
            334 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/445.jpg',
              'name' => 'Beach Road - S',
              'description' => 'Hwy 99 near Canada/USA border, looking south.',
              'latitude' => 49.007404200000003,
              'longitude' => -122.7578908,
            ),
            335 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/446.jpg',
              'name' => 'Rock Creek',
              'description' => 'Hwy 3 at Hwy 33 junction in Rock Creek, looking north-west.',
              'latitude' => 49.057313999999998,
              'longitude' => -118.99953600000001,
            ),
            336 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/447.jpg',
              'name' => 'Hwy 15 at 8th Ave - S',
              'description' => 'Hwy 15 at 8th Ave, in South Surrey, looking south.',
              'latitude' => 49.016575000000003,
              'longitude' => -122.735478,
            ),
            337 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/448.jpg',
              'name' => 'Silverdale - E',
              'description' => 'Hwy 7 (Lougheed Hwy) at Hayward St in Mission, looking south-east along Hwy 7.',
              'latitude' => 49.164118000000002,
              'longitude' => -122.406093,
            ),
            338 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/449.jpg',
              'name' => 'Silverdale - N',
              'description' => 'Hwy 7 (Lougheed Hwy) at Hayward St in Mission, looking north-east along Hayward St.',
              'latitude' => 49.164118000000002,
              'longitude' => -122.406093,
            ),
            339 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/450.jpg',
              'name' => 'Silverdale - W',
              'description' => 'Hwy 7 (Lougheed Hwy) at Hayward St in Mission, looking north-west along Hwy 7.',
              'latitude' => 49.164118000000002,
              'longitude' => -122.406093,
            ),
            340 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/451.jpg',
              'name' => 'Savona',
              'description' => 'Hwy 1 at Holloway Drive, near Savona, looking west.',
              'latitude' => 50.732326999999998,
              'longitude' => -120.69246800000001,
            ),
            341 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/452.jpg',
              'name' => 'Princeton',
              'description' => 'Hwy 3 at Frontage Rd on the west side of Princeton, looking south.',
              'latitude' => 49.452643999999999,
              'longitude' => -120.525408,
            ),
            342 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/453.jpg',
              'name' => 'Little Fort',
              'description' => 'Hwy 5, in Little Fort at Hwy 5/Hwy 24 junction, looking north.',
              'latitude' => 51.423831999999997,
              'longitude' => -120.205352,
            ),
            343 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/454.jpg',
              'name' => 'Highland Valley Rd',
              'description' => 'Hwy 97C, at Highland Valley Rd, about 61 km north of Merritt and 46 km south of Ashcroft, looking north.',
              'latitude' => 50.478591000000002,
              'longitude' => -121.00331,
            ),
            344 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/455.jpg',
              'name' => 'Hagensborg',
              'description' => 'Hwy 20, between Bella Coola and Hagensborg, looking west.',
              'latitude' => 52.377079999999999,
              'longitude' => -126.60558,
            ),
            345 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/456.jpg',
              'name' => 'Albion - W',
              'description' => 'Hwy 7 (Lougheed Hwy) at 240th St, looking west along Hwy 7.',
              'latitude' => 49.182304999999999,
              'longitude' => -122.556731,
            ),
            346 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/457.jpg',
              'name' => 'Albion - E',
              'description' => 'Hwy 7 (Lougheed Hwy) at 240th St, looking east along Hwy 7.',
              'latitude' => 49.182304999999999,
              'longitude' => -122.556731,
            ),
            347 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/458.jpg',
              'name' => 'Albion - S',
              'description' => 'Hwy 7 (Lougheed Hwy) at 240th St, looking south along 240th St.',
              'latitude' => 49.182304999999999,
              'longitude' => -122.556731,
            ),
            348 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/459.jpg',
              'name' => 'Albion - N',
              'description' => 'Hwy 7 (Lougheed Hwy) at 240th St, looking north along 240th St.',
              'latitude' => 49.182304999999999,
              'longitude' => -122.556731,
            ),
            349 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/460.jpg',
              'name' => 'Silverdale - S',
              'description' => 'Hwy 7 (Lougheed Hwy) at Hayward St in Mission, looking south-west along Hayward St.',
              'latitude' => 49.164118000000002,
              'longitude' => -122.406093,
            ),
            350 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/461.jpg',
              'name' => 'Mt Lehman - N',
              'description' => 'Hwy 1 at Mt. Lehman Rd, looking north.',
              'latitude' => 49.057774999999999,
              'longitude' => -122.38146500000001,
            ),
            351 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/462.jpg',
              'name' => 'Mt Lehman - W',
              'description' => 'Hwy 1 at Mt. Lehman Rd, looking west.',
              'latitude' => 49.057774999999999,
              'longitude' => -122.38146500000001,
            ),
            352 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/463.jpg',
              'name' => 'Mt Lehman - E',
              'description' => 'Hwy 1 at Mt. Lehman Rd, looking east.',
              'latitude' => 49.057774999999999,
              'longitude' => -122.38146500000001,
            ),
            353 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/464.jpg',
              'name' => 'Mt Lehman - S',
              'description' => 'Hwy 1 at Mt. Lehman Rd, looking south.',
              'latitude' => 49.057774999999999,
              'longitude' => -122.38146500000001,
            ),
            354 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/465.jpg',
              'name' => 'Highlands Blvd',
              'description' => 'Hwy 7 (Lougheed Hwy) at Highlands Blvd, approximately 3 km east of Harrison Mills, looking east.',
              'latitude' => 49.236708,
              'longitude' => -121.906617,
            ),
            355 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/466.jpg',
              'name' => 'Yale',
              'description' => 'Hwy 1, at Victoria Street in Yale, looking south.',
              'latitude' => 49.562913000000002,
              'longitude' => -121.43377599999999,
            ),
            356 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/467.jpg',
              'name' => 'Hope Slide',
              'description' => 'Hwy 3 at the Hope Slide pullout, looking east.',
              'latitude' => 49.297616699999999,
              'longitude' => -121.2640667,
            ),
            357 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/468.jpg',
              'name' => 'Chilliwack Lake',
              'description' => 'Chilliwack Lake Rd, at Paulsen Rd. About 42 km east of Chilliwack, looking east.',
              'latitude' => 49.099488999999998,
              'longitude' => -121.48182199999999,
            ),
            358 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/469.jpg',
              'name' => 'Heckman Summit',
              'description' => 'Hwy 20, about 88 km from Bella Coola, near gate at top of Bella Coola hill, looking west.',
              'latitude' => 52.522449000000002,
              'longitude' => -125.822441,
            ),
            359 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/470.jpg',
              'name' => 'Strawberry Pass',
              'description' => 'Hwy 3B, about 15 km north of Rossland and 4 km south of summit, looking north.',
              'latitude' => 49.176349999999999,
              'longitude' => -117.8611028,
            ),
            360 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/471.jpg',
              'name' => 'Dawson Creek - N',
              'description' => 'Hwy 97 at Dangerous Goods Route, west of Dawson Creek, looking north.',
              'latitude' => 55.766562,
              'longitude' => -120.27650300000001,
            ),
            361 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/472.jpg',
              'name' => 'Dawson Creek - W',
              'description' => 'Hwy 97 at Dangerous Goods Route, west of Dawson Creek, looking west.',
              'latitude' => 55.766562,
              'longitude' => -120.27650300000001,
            ),
            362 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/473.jpg',
              'name' => 'Dawson Creek - E',
              'description' => 'Hwy 97 at Dangerous Goods Route, west of Dawson Creek, looking east.',
              'latitude' => 55.766562,
              'longitude' => -120.27650300000001,
            ),
            363 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/475.jpg',
              'name' => 'Dawson Creek - S',
              'description' => 'Hwy 97 at Dangerous Goods Route, west of Dawson Creek, looking south.',
              'latitude' => 55.766562,
              'longitude' => -120.27650300000001,
            ),
            364 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/476.jpg',
              'name' => 'Nanaimo Airport - N',
              'description' => 'Hwy 1, at Vowels Rd next to Nanaimo Airport, looking north.',
              'latitude' => 49.053682000000002,
              'longitude' => -123.877292,
            ),
            365 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/477.jpg',
              'name' => 'Hwy 15 at 8th Ave - N',
              'description' => 'Hwy 15 at 8th Ave, in South Surrey, looking north.',
              'latitude' => 49.016575000000003,
              'longitude' => -122.735478,
            ),
            366 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/478.jpg',
              'name' => 'Lempriere',
              'description' => 'Hwy 5, approximately 40 km north of Blue River, looking south.',
              'latitude' => 52.385539999999999,
              'longitude' => -119.179818,
            ),
            367 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/479.jpg',
              'name' => 'Nanaimo Airport - S',
              'description' => 'Hwy 1, at Vowels Rd next to Nanaimo Airport, looking south.',
              'latitude' => 49.053682000000002,
              'longitude' => -123.877292,
            ),
            368 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/480.jpg',
              'name' => 'Chemainus',
              'description' => 'Hwy 1 at Henry Rd near Chemainus, looking south.',
              'latitude' => 48.907431000000003,
              'longitude' => -123.72858600000001,
            ),
            369 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/481.jpg',
              'name' => 'Galena Bay - N',
              'description' => 'Hwy 23, near the Upper Arrow Lake ferry landing at Galena Bay, about 48 km north of Nakusp, looking northbound.',
              'latitude' => 50.625120000000003,
              'longitude' => -117.86443,
            ),
            370 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/482.jpg',
              'name' => 'Galena Bay - S',
              'description' => 'Hwy 23, near the Upper Arrow Lake ferry landing at Galena Bay, about 48 km north of Nakusp, looking southbound.',
              'latitude' => 50.625120000000003,
              'longitude' => -117.86443,
            ),
            371 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/483.jpg',
              'name' => 'Tete Jaune Cache',
              'description' => 'Hwy 16 at Hwy 5 junction, looking east.',
              'latitude' => 52.975816999999999,
              'longitude' => -119.42209699999999,
            ),
            372 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/485.jpg',
              'name' => 'Liard Hwy Junction',
              'description' => 'Hwy 97 - Hwy 77 junction, on Hwy 97 about 28 km north of Ft. Nelson, looking east.',
              'latitude' => 58.901441699999999,
              'longitude' => -123.1243389,
            ),
            373 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/486.jpg',
              'name' => 'Albert Canyon',
              'description' => 'Hwy 1, about 30 km east of Revelstoke, looking east.',
              'latitude' => 51.138125000000002,
              'longitude' => -117.874897,
            ),
            374 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/487.jpg',
              'name' => 'Quartz Creek',
              'description' => 'Hwy 1, 40 km west of Golden, near the Quartz Creek bridge, looking east.',
              'latitude' => 51.484493999999998,
              'longitude' => -117.335311,
            ),
            375 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/488.jpg',
              'name' => 'East Pine Hill',
              'description' => 'Hwy 97 on East Pine Hill, about 27 km east of Chetwynd, looking east.',
              'latitude' => 55.719343000000002,
              'longitude' => -121.25896400000001,
            ),
            376 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/489.jpg',
              'name' => 'Good Hope Lake',
              'description' => 'Hwy 37 near Good Hope Lake, looking north.',
              'latitude' => 59.295036000000003,
              'longitude' => -129.289053,
            ),
            377 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/491.jpg',
              'name' => 'Rosswood',
              'description' => 'Hwy 113 near Rosswood, about 44 km north of Terrace, looking north.',
              'latitude' => 54.838149999999999,
              'longitude' => -128.7945028,
            ),
            378 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/492.jpg',
              'name' => 'Deroche - E',
              'description' => 'Hwy 7 at Deroche Rd and Nicomen Rd railway crossing, looking east.',
              'latitude' => 49.188127999999999,
              'longitude' => -122.072956,
            ),
            379 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/493.jpg',
              'name' => 'Deroche - W',
              'description' => 'Hwy 7 at Deroche Rd and Nicomen Rd railway crossing, looking west.',
              'latitude' => 49.188127999999999,
              'longitude' => -122.072956,
            ),
            380 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/494.jpg',
              'name' => 'Lemon Creek',
              'description' => 'Hwy 6 at Kennedy Rd, looking south near Lemon Creek, about 8km south of Slocan.',
              'latitude' => 49.700240000000001,
              'longitude' => -117.480649,
            ),
            381 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/495.jpg',
              'name' => 'Messiter Summit',
              'description' => 'Hwy 5, about 20 km south of Blue River and 19 km north of Avola, looking north.',
              'latitude' => 51.925860999999998,
              'longitude' => -119.328689,
            ),
            382 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/496.jpg',
              'name' => 'Priestly Hill',
              'description' => 'Hwy 16, about 32 km east of Burns Lake, looking east.',
              'latitude' => 54.131763999999997,
              'longitude' => -125.354664,
            ),
            383 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/497.jpg',
              'name' => 'Brenda Mine - W',
              'description' => 'Hwy 97C (Okanagan Connector) about 22km west of 97/97C Jct, looking west.',
              'latitude' => 49.869669999999999,
              'longitude' => -119.937,
            ),
            384 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/498.jpg',
              'name' => 'Hwy 17 at Cloverdale Ave - N',
              'description' => 'Hwy 17 at Cloverdale Ave in Victoria, looking north.',
              'latitude' => 48.450867000000002,
              'longitude' => -123.36941899999999,
            ),
            385 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/499.jpg',
              'name' => 'Hwy 17 at Cloverdale Ave - S',
              'description' => 'Hwy 17 at Cloverdale Ave in Victoria, looking south.',
              'latitude' => 48.450867000000002,
              'longitude' => -123.36941899999999,
            ),
            386 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/501.jpg',
              'name' => 'Clearwater - N',
              'description' => 'Hwy 5 at Clearwater Valley Rd, looking north.',
              'latitude' => 51.651085000000002,
              'longitude' => -120.037871,
            ),
            387 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/502.jpg',
              'name' => 'Clearwater - S',
              'description' => 'Hwy 5 at Clearwater Valley Rd, looking south.',
              'latitude' => 51.651085000000002,
              'longitude' => -120.037871,
            ),
            388 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/503.jpg',
              'name' => 'Mission - N',
              'description' => 'Hwy 7 at Hwy 11 approaching Mission, looking north.',
              'latitude' => 49.132804,
              'longitude' => -122.326369,
            ),
            389 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/504.jpg',
              'name' => 'Mission - W',
              'description' => 'Hwy 7 at Hwy 11 approaching Mission, looking west.',
              'latitude' => 49.132804,
              'longitude' => -122.326369,
            ),
            390 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/505.jpg',
              'name' => 'Mission - S',
              'description' => 'Hwy 7 at Hwy 11 approaching Mission, looking south.',
              'latitude' => 49.132804,
              'longitude' => -122.326369,
            ),
            391 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/506.jpg',
              'name' => 'Mica Dam',
              'description' => 'Hwy 23 at Mica Dam, about 152 km north of Revelstoke, looking south.',
              'latitude' => 52.077207999999999,
              'longitude' => -118.55811799999999,
            ),
            392 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/507.jpg',
              'name' => 'Hwy 17 at Saanich Rd 1 - N',
              'description' => 'Hwy 17 southbound (Blanshard St) at Saanich Rd, looking north.',
              'latitude' => 48.455419999999997,
              'longitude' => -123.37211000000001,
            ),
            393 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/508.jpg',
              'name' => 'Hwy 17 at Saanich Rd 1 - S',
              'description' => 'Hwy 17 southbound (Blanshard St) at Saanich Rd, looking south.',
              'latitude' => 48.455419999999997,
              'longitude' => -123.37211000000001,
            ),
            394 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/509.jpg',
              'name' => 'Hwy 17 at Saanich Rd 1 - E',
              'description' => 'Hwy 17 southbound (Blanshard St) at Saanich Rd, looking east.',
              'latitude' => 48.455419999999997,
              'longitude' => -123.37211000000001,
            ),
            395 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/510.jpg',
              'name' => 'Hwy 17 at Saanich Rd 1 - W',
              'description' => 'Hwy 17, Blanshard St at Saanich Rd, looking west.',
              'latitude' => 48.455480999999999,
              'longitude' => -123.37132,
            ),
            396 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/511.jpg',
              'name' => 'Hwy 17 at Saanich Rd 2 - N',
              'description' => 'Hwy 17 northbound at Saanich Rd, looking north.',
              'latitude' => 48.455865000000003,
              'longitude' => -123.370795,
            ),
            397 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/512.jpg',
              'name' => 'Hwy 17 at Saanich Rd 2 - S',
              'description' => 'Hwy 17 northbound at Saanich Rd, looking south.',
              'latitude' => 48.455865000000003,
              'longitude' => -123.370795,
            ),
            398 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/513.jpg',
              'name' => 'Hwy 17 at Saanich Rd 2 - E',
              'description' => 'Hwy 17 northbound at Saanich Rd, looking east.',
              'latitude' => 48.455865000000003,
              'longitude' => -123.370795,
            ),
            399 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/514.jpg',
              'name' => 'Hwy 17 at Saanich Rd 2 - W',
              'description' => 'Hwy 17 northbound at Saanich Rd, looking west.',
              'latitude' => 48.455865000000003,
              'longitude' => -123.370795,
            ),
            400 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/515.jpg',
              'name' => 'Deltaport Way - W',
              'description' => 'Hwy 17 (South Fraser Perimeter Rd) at Deltaport Way in South Delta, looking west.',
              'latitude' => 49.057929399999999,
              'longitude' => -123.05690269999999,
            ),
            401 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/516.jpg',
              'name' => 'Enterprise - S',
              'description' => 'Hwy 97, 37 km south of Williams Lake, looking south.',
              'latitude' => 51.9616708,
              'longitude' => -121.79306080000001,
            ),
            402 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/517.jpg',
              'name' => 'Clanwilliam Railway Overpass - W',
              'description' => 'Hwy 1, west of Revelstoke, looking west.',
              'latitude' => 50.967548000000001,
              'longitude' => -118.359165,
            ),
            403 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/518.jpg',
              'name' => 'Shelter Bay - Middle',
              'description' => 'Hwy 23, near the Upper Arrow Lake ferry landing at Shelter Bay, middle of queue, looking north.',
              'latitude' => 50.635800000000003,
              'longitude' => -117.928,
            ),
            404 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/519.jpg',
              'name' => 'Whistler Village Gate - N',
              'description' => 'Hwy 99, in Whistler at Village Gate Blvd, looking north.',
              'latitude' => 50.116028,
              'longitude' => -122.95921800000001,
            ),
            405 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/522.jpg',
              'name' => 'Whistler Village Gate - S',
              'description' => 'Hwy 99, in Whistler at Village Gate Blvd, looking south.',
              'latitude' => 50.116028,
              'longitude' => -122.95921800000001,
            ),
            406 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/525.jpg',
              'name' => 'Deltaport Way - N',
              'description' => 'Hwy 17 (South Fraser Perimeter Rd) at Deltaport Way in South Delta, looking north.',
              'latitude' => 49.057929399999999,
              'longitude' => -123.05690269999999,
            ),
            407 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/528.jpg',
              'name' => 'Whistler Village Gate - E',
              'description' => 'Hwy 99, in Whistler at looking east on Village Gate Blvd.',
              'latitude' => 50.116028,
              'longitude' => -122.95921800000001,
            ),
            408 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/531.jpg',
              'name' => 'Cowichan',
              'description' => 'Hwy 18, mid-point between Hwy 1 turn-off and Cowichan Lake exit, looking west.',
              'latitude' => 48.797356999999998,
              'longitude' => -123.881568,
            ),
            409 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/532.jpg',
              'name' => 'Winfield - N',
              'description' => 'Hwy 97, north of Winfield, by Wood Lake, looking north.',
              'latitude' => 50.057110999999999,
              'longitude' => -119.407653,
            ),
            410 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/533.jpg',
              'name' => 'Winfield - S',
              'description' => 'Hwy 97, north of Winfield, by Wood Lake, looking south.',
              'latitude' => 50.057110999999999,
              'longitude' => -119.407653,
            ),
            411 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/535.jpg',
              'name' => 'Hwy 1 at 264th St - N',
              'description' => 'Hwy 1 off-ramp to 264th Street, looking north.',
              'latitude' => 49.101421999999999,
              'longitude' => -122.495311,
            ),
            412 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/536.jpg',
              'name' => 'Hwy 1 at 264th St - W',
              'description' => 'Hwy 1 at 264th St, looking west.',
              'latitude' => 49.101421999999999,
              'longitude' => -122.495311,
            ),
            413 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/537.jpg',
              'name' => 'Hwy 1 at 264th St - E',
              'description' => 'Hwy 1 at 264th St, looking east.',
              'latitude' => 49.101421999999999,
              'longitude' => -122.495311,
            ),
            414 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/538.jpg',
              'name' => 'Hwy 1 at 264th St - S',
              'description' => 'Hwy 1 on-ramp from 264th Street, looking south.',
              'latitude' => 49.101421999999999,
              'longitude' => -122.495311,
            ),
            415 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/539.jpg',
              'name' => 'Hwy 99 at 8th Ave - W',
              'description' => 'Hwy 99 at 8th Avenue in White Rock, looking west at southbound ramp from 8th Ave.',
              'latitude' => 49.014668,
              'longitude' => -122.75811899999999,
            ),
            416 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/541.jpg',
              'name' => 'Campbell River - N',
              'description' => 'Hwy 19 at Willis Rd, about 2.5 km south of Campbell River, looking north.',
              'latitude' => 50.013911,
              'longitude' => -125.282994,
            ),
            417 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/542.jpg',
              'name' => 'Campbell River - S',
              'description' => 'Hwy 19 at Willis Rd, about 2.5 km south of Campbell River, looking south.',
              'latitude' => 50.013911,
              'longitude' => -125.282994,
            ),
            418 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/543.jpg',
              'name' => 'Campbell River - W',
              'description' => 'Hwy 19 at Willis Rd, about 2.5 km south of Campbell River, looking west.',
              'latitude' => 50.013911,
              'longitude' => -125.282994,
            ),
            419 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/544.jpg',
              'name' => 'Campbell River - E',
              'description' => 'Hwy 19 at Willis Rd, about 2.5 km south of Campbell River, looking east.',
              'latitude' => 50.013911,
              'longitude' => -125.282994,
            ),
            420 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/545.jpg',
              'name' => 'Nanoose Bay - N',
              'description' => 'Hwy 19 at Northwest Bay Rd, near Nanoose Bay, looking north.',
              'latitude' => 49.263477999999999,
              'longitude' => -124.199736,
            ),
            421 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/546.jpg',
              'name' => 'Nanoose Bay - S',
              'description' => 'Hwy 19 at Northwest Bay Rd, near Nanoose Bay, looking south.',
              'latitude' => 49.263477999999999,
              'longitude' => -124.199736,
            ),
            422 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/547.jpg',
              'name' => 'Nanoose Bay - E',
              'description' => 'Hwy 19 at Northwest Bay Rd, near Nanoose Bay, looking east.',
              'latitude' => 49.263477999999999,
              'longitude' => -124.199736,
            ),
            423 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/548.jpg',
              'name' => 'Veterans Memorial Pkwy - N',
              'description' => 'Hwy 14 (Veterans Memorial Parkway) at Goldstream Ave in Langford, looking north.',
              'latitude' => 48.447493999999999,
              'longitude' => -123.49584400000001,
            ),
            424 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/549.jpg',
              'name' => 'Veterans Memorial Pkwy - S',
              'description' => 'Hwy 14 (Veterans Memorial Parkway) at Goldstream Ave in Langford, looking south.',
              'latitude' => 48.447493999999999,
              'longitude' => -123.49584400000001,
            ),
            425 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/550.jpg',
              'name' => 'Veterans Memorial Pkwy - W',
              'description' => 'Hwy 14 (Veterans Memorial Parkway) at Goldstream Ave in Langford, looking west.',
              'latitude' => 48.447493999999999,
              'longitude' => -123.49584400000001,
            ),
            426 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/551.jpg',
              'name' => 'Veterans Memorial Pkwy - E',
              'description' => 'Hwy 14 (Veterans Memorial Parkway) at Goldstream Ave in Langford, looking east.',
              'latitude' => 48.447493999999999,
              'longitude' => -123.49584400000001,
            ),
            427 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/552.jpg',
              'name' => 'Mt Newton X Rd - N',
              'description' => 'Hwy 17 at Mt Newton Cross Rd, looking north.',
              'latitude' => 48.594099999999997,
              'longitude' => -123.398506,
            ),
            428 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/553.jpg',
              'name' => 'Mt Newton X Rd - S',
              'description' => 'Hwy 17 at Mt Newton Cross Rd, looking south.',
              'latitude' => 48.594099999999997,
              'longitude' => -123.398506,
            ),
            429 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/554.jpg',
              'name' => 'Mt Newton X Rd - W',
              'description' => 'Hwy 17 at Mt Newton Cross Rd, looking west.',
              'latitude' => 48.594099999999997,
              'longitude' => -123.398506,
            ),
            430 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/555.jpg',
              'name' => 'Mt Newton X Rd - E',
              'description' => 'Hwy 17 at Mt Newton Cross Rd, looking east.',
              'latitude' => 48.594099999999997,
              'longitude' => -123.398506,
            ),
            431 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/561.jpg',
              'name' => 'Highbridge',
              'description' => 'Hwy 33, about 14 km north of Westbridge and 20 km south of Beaverdell, looking north.',
              'latitude' => 49.280223999999997,
              'longitude' => -119.0261,
            ),
            432 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/562.jpg',
              'name' => 'Hwy 15 at 8th Ave - W',
              'description' => 'Hwy 15 at 8th Ave, in South Surrey, looking west.',
              'latitude' => 49.016575000000003,
              'longitude' => -122.735478,
            ),
            433 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/563.jpg',
              'name' => 'Hwy 15 at 8th Ave - E',
              'description' => 'Hwy 15 at 8th Ave, in South Surrey, looking east.',
              'latitude' => 49.016575000000003,
              'longitude' => -122.735478,
            ),
            434 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/564.jpg',
              'name' => 'Second Ave - S',
              'description' => 'Pacific Crossing at 2nd Avenue, looking south.',
              'latitude' => 49.006636,
              'longitude' => -122.73507979999999,
            ),
            435 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/565.jpg',
              'name' => 'Chamulak Rd',
              'description' => 'Hwy 97, in Stoner at Chamulak Rd, about 36 km south of Prince George, looking north.',
              'latitude' => 53.624538999999999,
              'longitude' => -122.663428,
            ),
            436 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/566.jpg',
              'name' => 'Rainbow Summit',
              'description' => 'Hwy 16, east of Prince Rupert at Rainbow Summit, looking west.',
              'latitude' => 54.206961999999997,
              'longitude' => -129.979072,
            ),
            437 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/567.jpg',
              'name' => 'Harrop Ferry Landing North View',
              'description' => 'Harrop Ferry Landing, on south side of Kootenay Lake, looking at the north side landing.',
              'latitude' => 49.611263999999998,
              'longitude' => -117.05413900000001,
            ),
            438 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/568.jpg',
              'name' => 'Suyer Road',
              'description' => 'Hwy 14, between Langford and Sooke near Suyer Rd, looking east.',
              'latitude' => 48.422207999999998,
              'longitude' => -123.575928,
            ),
            439 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/569.jpg',
              'name' => 'Harrop Ferry',
              'description' => 'Harrop Ferry Landing on the south side of Kootenay Lake, looking north.',
              'latitude' => 49.611263999999998,
              'longitude' => -117.05413900000001,
            ),
            440 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/570.jpg',
              'name' => 'Harrop Ferry Landing South View',
              'description' => 'Harrop Ferry Landing, looking south at northbound line-up.',
              'latitude' => 49.611263999999998,
              'longitude' => -117.05413900000001,
            ),
            441 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/571.jpg',
              'name' => 'Hwy 17 at 80th St - W',
              'description' => 'Hwy 17 (South Fraser Perimeter Rd)at 80th St, looking west.',
              'latitude' => 49.140363999999998,
              'longitude' => -122.995733,
            ),
            442 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/572.jpg',
              'name' => 'Hwy 17 at 80th St - E',
              'description' => 'Hwy 17 (South Fraser Perimeter Rd) at 80th St, looking east.',
              'latitude' => 49.140363999999998,
              'longitude' => -122.995733,
            ),
            443 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/573.jpg',
              'name' => 'Hwy 17 at Hwy 91 Connector - N',
              'description' => 'Hwy 17 (South Fraser Perimeter Rd), at Hwy 91 Connector, looking north.',
              'latitude' => 49.148978,
              'longitude' => -122.95329700000001,
            ),
            444 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/574.jpg',
              'name' => 'Hwy 17 at Hwy 91 Connector - W',
              'description' => 'Hwy 17 (South Fraser Perimeter Rd), at Hwy 91 Connector, looking west.',
              'latitude' => 49.148978,
              'longitude' => -122.95329700000001,
            ),
            445 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/575.jpg',
              'name' => 'Hwy 17 at Hwy 91 Connector - E',
              'description' => 'Hwy 17 (South Fraser Perimeter Rd), at Hwy 91 Connector, looking east.',
              'latitude' => 49.148978,
              'longitude' => -122.95329700000001,
            ),
            446 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/576.jpg',
              'name' => 'Hwy 17 at Hwy 91 Connector - S',
              'description' => 'Hwy 17 (South Fraser Perimeter Rd), at Hwy 91 Connector, looking south.',
              'latitude' => 49.148978,
              'longitude' => -122.95329700000001,
            ),
            447 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/580.jpg',
              'name' => 'Bridgeview Dr - W',
              'description' => 'Hwy 17 (South Fraser Perimeter Rd) at Bridgeview Dr, looking west.',
              'latitude' => 49.213189,
              'longitude' => -122.861842,
            ),
            448 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/581.jpg',
              'name' => 'Bridgeview Dr - E',
              'description' => 'Hwy 17 (South Fraser Perimeter Rd) at Bridgeview Dr, looking east.',
              'latitude' => 49.213189,
              'longitude' => -122.861842,
            ),
            449 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/582.jpg',
              'name' => 'Bridgeview Dr - S',
              'description' => 'Hwy 17 (South Fraser Perimeter Rd) at Bridgeview Dr, looking south.',
              'latitude' => 49.213189,
              'longitude' => -122.861842,
            ),
            450 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/583.jpg',
              'name' => 'Retallack',
              'description' => 'Hwy 31A, at Retallack between New Denver and Kaslo, looking west.',
              'latitude' => 50.042433000000003,
              'longitude' => -117.14943599999999,
            ),
            451 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/584.jpg',
              'name' => 'Hwy 1 at Hwy 23 - N',
              'description' => 'Hwy 1 at Hwy 23 in Revelstoke, looking north to Westside Road.',
              'latitude' => 51.003183,
              'longitude' => -118.225953,
            ),
            452 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/585.jpg',
              'name' => 'Hwy 1 at Hwy 23 - W',
              'description' => 'Hwy 1 at Hwy 23 in Revelstoke, looking west.',
              'latitude' => 51.003183,
              'longitude' => -118.225953,
            ),
            453 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/586.jpg',
              'name' => 'Hwy 1 at Hwy 23 - E',
              'description' => 'Hwy 1 at Hwy 23 in Revelstoke, looking east.',
              'latitude' => 51.003183,
              'longitude' => -118.225953,
            ),
            454 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/587.jpg',
              'name' => 'Hwy 1 at Hwy 23 - S',
              'description' => 'Hwy 1 at Hwy 23 in Revelstoke, looking south to Hwy 23.',
              'latitude' => 51.003183,
              'longitude' => -118.225953,
            ),
            455 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/589.jpg',
              'name' => 'Fort St John - N',
              'description' => 'Hwy 97 at 100<sup>th</sup> Ave in Fort St. John, looking north.',
              'latitude' => 56.237082999999998,
              'longitude' => -120.847492,
            ),
            456 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/590.jpg',
              'name' => 'Fort St John - NW',
              'description' => 'Hwy 97 at 100<sup>th</sup> Ave in Fort St. John, looking northwest.',
              'latitude' => 56.237082999999998,
              'longitude' => -120.847492,
            ),
            457 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/591.jpg',
              'name' => 'Fort St John - SE',
              'description' => 'Hwy 97 at 100<sup>th</sup> Ave in Fort St. John, looking southeast.',
              'latitude' => 56.237082999999998,
              'longitude' => -120.847492,
            ),
            458 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/592.jpg',
              'name' => 'Fort St John - S',
              'description' => 'Hwy 97 at 100<sup>th</sup> Ave in Fort St. John, looking south.',
              'latitude' => 56.237082999999998,
              'longitude' => -120.847492,
            ),
            459 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/593.jpg',
              'name' => 'Kwinitsa',
              'description' => 'Hwy 16, about 52 KM east of Port Edward, looking east.',
              'latitude' => 54.229647,
              'longitude' => -129.52999399999999,
            ),
            460 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/594.jpg',
              'name' => 'Dufferin - W',
              'description' => 'Hwy 1 in Kamloops, east of Copperhead Drive, looking west.',
              'latitude' => 50.655636999999999,
              'longitude' => -120.388019,
            ),
            461 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/595.jpg',
              'name' => 'Dufferin - E',
              'description' => 'Hwy 1 in Kamloops, east of Copperhead Drive, looking east.',
              'latitude' => 50.655636999999999,
              'longitude' => -120.388019,
            ),
            462 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/596.jpg',
              'name' => 'Pemberton - N',
              'description' => 'Hwy 99 at Portage Rd in Pemberton, looking north.',
              'latitude' => 50.317186,
              'longitude' => -122.798492,
            ),
            463 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/597.jpg',
              'name' => 'Pemberton - W',
              'description' => 'Hwy 99 at Portage Rd in Pemberton, looking west.',
              'latitude' => 50.317186,
              'longitude' => -122.798492,
            ),
            464 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/598.jpg',
              'name' => 'Pemberton - E',
              'description' => 'Hwy 99 at Portage Rd in Pemberton, looking east.',
              'latitude' => 50.317186,
              'longitude' => -122.798492,
            ),
            465 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/599.jpg',
              'name' => 'Pemberton - S',
              'description' => 'Hwy 99 at Portage Rd in Pemberton, looking south.',
              'latitude' => 50.317186,
              'longitude' => -122.798492,
            ),
            466 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/600.jpg',
              'name' => 'Crest Lake',
              'description' => 'Hwy 28, (Gold River Hwy), at Crest Lake, about 14 km east of Gold River, looking east.',
              'latitude' => 49.843370999999998,
              'longitude' => -125.907967,
            ),
            467 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/601.jpg',
              'name' => 'Port Edward - E',
              'description' => 'Hwy 16 at Port Edward arterial road, looking east.',
              'latitude' => 54.252321999999999,
              'longitude' => -130.257814,
            ),
            468 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/602.jpg',
              'name' => 'Port Edward - S',
              'description' => 'Hwy 16 at Port Edward arterial road, looking south.',
              'latitude' => 54.252321999999999,
              'longitude' => -130.257814,
            ),
            469 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/603.jpg',
              'name' => 'Malakwa - W',
              'description' => 'Hwy 1 near Malakwa Bridge, about 30 km east of Sicamous, looking west.',
              'latitude' => 50.948455000000003,
              'longitude' => -118.771698,
            ),
            470 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/604.jpg',
              'name' => 'Malakwa - E',
              'description' => 'Hwy 1 near Malakwa Bridge, about 30 km east of Sicamous, looking east.',
              'latitude' => 50.948455000000003,
              'longitude' => -118.771698,
            ),
            471 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/605.jpg',
              'name' => 'Halston Ave - N',
              'description' => 'Hwy 5 at Halston Ave in Kamloops, looking north.',
              'latitude' => 50.709631999999999,
              'longitude' => -120.32977,
            ),
            472 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/606.jpg',
              'name' => 'Halston Ave - W',
              'description' => 'Hwy 5 at Halston Ave in Kamloops, looking west.',
              'latitude' => 50.709631999999999,
              'longitude' => -120.32977,
            ),
            473 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/607.jpg',
              'name' => 'Halston Ave - E',
              'description' => 'Hwy 5 at Halston Ave in Kamloops, looking east.',
              'latitude' => 50.709631999999999,
              'longitude' => -120.32977,
            ),
            474 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/608.jpg',
              'name' => 'Halston Ave - S',
              'description' => 'Hwy 5 at Halston Ave in Kamloops, looking south.',
              'latitude' => 50.709631999999999,
              'longitude' => -120.32977,
            ),
            475 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/609.jpg',
              'name' => 'Hwy 5 at Mt. Paul Way - N',
              'description' => 'Hwy 5 at Mt. Paul Way in Kamloops, looking northbound.',
              'latitude' => 50.693396999999997,
              'longitude' => -120.321608,
            ),
            476 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/610.jpg',
              'name' => 'Hwy 5 at Mt. Paul Way - SE',
              'description' => 'Hwy 5 at Mt. Paul Way in Kamloops, looking southeast.',
              'latitude' => 50.693396999999997,
              'longitude' => -120.321608,
            ),
            477 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/611.jpg',
              'name' => 'Mt. Paul Way',
              'description' => 'Hwy 5 at Mt. Paul Way in Kamloops, looking southbound.',
              'latitude' => 50.693396999999997,
              'longitude' => -120.321608,
            ),
            478 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/614.jpg',
              'name' => 'Lonsdale - N',
              'description' => 'Hwy 1 (Upper Levels Highway) at Lonsdale Ave, looking north.',
              'latitude' => 49.331910999999998,
              'longitude' => -123.072056,
            ),
            479 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/615.jpg',
              'name' => 'Lonsdale - W',
              'description' => 'Hwy 1 (Upper Levels Highway) at Lonsdale Ave, looking west.',
              'latitude' => 49.331910999999998,
              'longitude' => -123.072056,
            ),
            480 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/616.jpg',
              'name' => 'Lonsdale - E',
              'description' => 'Hwy 1 (Upper Levels Highway) at Lonsdale Ave, looking east.',
              'latitude' => 49.331910999999998,
              'longitude' => -123.072056,
            ),
            481 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/617.jpg',
              'name' => 'Lonsdale - S',
              'description' => 'Hwy 1 (Upper Levels Highway) at Lonsdale Ave, looking south.',
              'latitude' => 49.331910999999998,
              'longitude' => -123.072056,
            ),
            482 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/618.jpg',
              'name' => 'Westview - N',
              'description' => 'Hwy 1 (Upper Levels Highway) at Westview Dr. looking north.',
              'latitude' => 49.332011000000001,
              'longitude' => -123.088139,
            ),
            483 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/619.jpg',
              'name' => 'Westview - W',
              'description' => 'Hwy 1 (Upper Levels Highway) at Westview Dr. looking west',
              'latitude' => 49.332011000000001,
              'longitude' => -123.088139,
            ),
            484 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/620.jpg',
              'name' => 'Westview - E',
              'description' => 'Hwy 1 (Upper Levels Highway) at Westview Dr. looking east',
              'latitude' => 49.332011000000001,
              'longitude' => -123.088139,
            ),
            485 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/621.jpg',
              'name' => 'Westview - S',
              'description' => 'Hwy 1 (Upper Levels Highway) at Westview Dr. looking south.',
              'latitude' => 49.332011000000001,
              'longitude' => -123.088139,
            ),
            486 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/622.jpg',
              'name' => 'Capilano - N',
              'description' => 'Hwy 1 (Upper Levels Highway) at Capilano Rd. looking north.',
              'latitude' => 49.332622000000001,
              'longitude' => -123.115036,
            ),
            487 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/623.jpg',
              'name' => 'Capilano - W',
              'description' => 'Hwy 1 (Upper Levels Highway) at Capilano Rd. looking west.',
              'latitude' => 49.332622000000001,
              'longitude' => -123.115036,
            ),
            488 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/624.jpg',
              'name' => 'Capilano - E',
              'description' => 'Hwy 1 (Upper Levels Highway) at Capilano Rd. looking east.',
              'latitude' => 49.332622000000001,
              'longitude' => -123.115036,
            ),
            489 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/625.jpg',
              'name' => 'Capilano - S',
              'description' => 'Hwy 1 (Upper Levels Highway) at Capilano Rd. looking south.',
              'latitude' => 49.332622000000001,
              'longitude' => -123.115036,
            ),
            490 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/626.jpg',
              'name' => 'Ymir',
              'description' => 'Hwy 6, in Ymir at First Ave, looking south.',
              'latitude' => 49.27825,
              'longitude' => -117.21182,
            ),
            491 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/627.jpg',
              'name' => 'Playmor Junction - N',
              'description' => 'Hwy 6 at Hwy 3A in Playmor Junction, looking north.',
              'latitude' => 49.441786999999998,
              'longitude' => -117.535861,
            ),
            492 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/628.jpg',
              'name' => 'Playmor Junction - W',
              'description' => 'Hwy 6 at Hwy 3A in Playmor Junction, looking west.',
              'latitude' => 49.441786999999998,
              'longitude' => -117.535861,
            ),
            493 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/630.jpg',
              'name' => 'Playmor Junction - S',
              'description' => 'Hwy 6 at Hwy 3A in Playmor Junction, looking south.',
              'latitude' => 49.441786999999998,
              'longitude' => -117.535861,
            ),
            494 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/631.jpg',
              'name' => 'Moyie Lake',
              'description' => 'Hwy 3, near the south end of Moyie Lake, looking north.',
              'latitude' => 49.319299999999998,
              'longitude' => -115.827997,
            ),
            495 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/632.jpg',
              'name' => 'Sanca Creek',
              'description' => 'Hwy 3A near Sanca Creek, 1.6 km south of Sanca Creek Bridge, looking south.',
              'latitude' => 49.368333,
              'longitude' => -116.72750000000001,
            ),
            496 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/634.jpg',
              'name' => 'Kaleden - N',
              'description' => 'Hwy 97 at Hwy 3A junction, just south of Kaleden Weigh Scale, looking north.',
              'latitude' => 49.383442000000002,
              'longitude' => -119.610167,
            ),
            497 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/635.jpg',
              'name' => 'Kaleden - W',
              'description' => 'Hwy 97 at Hwy 3A junction, just south of Kaleden Weigh Scale, looking west.',
              'latitude' => 49.383442000000002,
              'longitude' => -119.610167,
            ),
            498 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/636.jpg',
              'name' => 'Kaleden - S',
              'description' => 'Hwy 97 at Hwy 3A junction, just south of Kaleden Weigh Scale, looking south.',
              'latitude' => 49.383442000000002,
              'longitude' => -119.610167,
            ),
            499 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/637.jpg',
              'name' => 'Hwy 97 at Hwy 97C - N',
              'description' => 'Hwy 97 at Hwy 97C junction, about 5 km south of Westbank, looking north.',
              'latitude' => 49.804375999999998,
              'longitude' => -119.66513399999999,
            ),
            500 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/638.jpg',
              'name' => 'Hwy 97 at Hwy 97C - W',
              'description' => 'Hwy 97 at Hwy 97C junction, about 5 km south of Westbank, looking west.',
              'latitude' => 49.804375999999998,
              'longitude' => -119.66513399999999,
            ),
            501 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/639.jpg',
              'name' => 'Hwy 97 at Hwy 97C - E',
              'description' => 'Hwy 97 at Hwy 97C junction, about 5 km south of Westbank, looking east.',
              'latitude' => 49.804375999999998,
              'longitude' => -119.66513399999999,
            ),
            502 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/640.jpg',
              'name' => 'Hwy 97 at Hwy 97C - S',
              'description' => 'Hwy 97 at Hwy 97C junction, about 5 km south of Westbank, looking south.',
              'latitude' => 49.804375999999998,
              'longitude' => -119.66513399999999,
            ),
            503 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/641.jpg',
              'name' => 'Aulds Rd - N',
              'description' => 'Hwy 19, at Aulds Rd in Nanaimo, looking north.',
              'latitude' => 49.234481000000002,
              'longitude' => -124.052334,
            ),
            504 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/642.jpg',
              'name' => 'Aulds Rd - W',
              'description' => 'Hwy 19, at Aulds Rd in Nanaimo, looking west.',
              'latitude' => 49.234481000000002,
              'longitude' => -124.052334,
            ),
            505 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/643.jpg',
              'name' => 'Aulds Rd - E',
              'description' => 'Hwy 19, at Aulds Rd in Nanaimo, looking east.',
              'latitude' => 49.234481000000002,
              'longitude' => -124.052334,
            ),
            506 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/644.jpg',
              'name' => 'Aulds Rd - S',
              'description' => 'Hwy 19, at Aulds Rd in Nanaimo, looking south.',
              'latitude' => 49.234481000000002,
              'longitude' => -124.052334,
            ),
            507 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/645.jpg',
              'name' => 'Northfield Rd - N',
              'description' => 'Hwy 19 at Northfield Rd in Nanaimo, looking north.',
              'latitude' => 49.188465999999998,
              'longitude' => -124.002467,
            ),
            508 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/646.jpg',
              'name' => 'Northfield Rd - W',
              'description' => 'Hwy 19 at Northfield Rd in Nanaimo, looking west.',
              'latitude' => 49.188465999999998,
              'longitude' => -124.002467,
            ),
            509 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/647.jpg',
              'name' => 'Northfield Rd - E',
              'description' => 'Hwy 19 at Northfield Rd in Nanaimo, looking east',
              'latitude' => 49.188465999999998,
              'longitude' => -124.002467,
            ),
            510 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/648.jpg',
              'name' => 'Northfield Rd - S',
              'description' => 'Hwy 19 at Northfield Rd in Nanaimo, looking south.',
              'latitude' => 49.188465999999998,
              'longitude' => -124.002467,
            ),
            511 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/649.jpg',
              'name' => 'Hwy 4 at Alberni Hwy - N',
              'description' => 'Hwy 4 at Alberni Hwy (Hwy 4A) junction, about 2 km west of Coombs, looking north.',
              'latitude' => 49.303629999999998,
              'longitude' => -124.454829,
            ),
            512 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/650.jpg',
              'name' => 'Hwy 4 at Alberni Hwy - W',
              'description' => 'Hwy 4 at Alberni Hwy (Hwy 4A) junction, about 2 km west of Coombs, looking west.',
              'latitude' => 49.303629999999998,
              'longitude' => -124.454829,
            ),
            513 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/651.jpg',
              'name' => 'Hwy 4 at Alberni Hwy - E',
              'description' => 'Hwy 4 at Alberni Hwy (Hwy 4A) junction, about 2 km west of Coombs, looking east.',
              'latitude' => 49.303629999999998,
              'longitude' => -124.454829,
            ),
            514 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/652.jpg',
              'name' => 'Royal Oak - N',
              'description' => 'Hwy 17 at Royal Oak Dr, looking north.',
              'latitude' => 48.498786000000003,
              'longitude' => -123.384967,
            ),
            515 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/653.jpg',
              'name' => 'Royal Oak - W',
              'description' => 'Hwy 17 at Royal Oak Dr, looking west.',
              'latitude' => 48.498786000000003,
              'longitude' => -123.384967,
            ),
            516 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/654.jpg',
              'name' => 'Royal Oak - E',
              'description' => 'Hwy 17 at Royal Oak Dr, looking east.',
              'latitude' => 48.498786000000003,
              'longitude' => -123.384967,
            ),
            517 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/655.jpg',
              'name' => 'Royal Oak - S',
              'description' => 'Hwy 17 at Royal Oak Dr, looking south.',
              'latitude' => 48.498786000000003,
              'longitude' => -123.384967,
            ),
            518 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/656.jpg',
              'name' => 'Cole Road - W',
              'description' => 'Hwy 1 at Cole Road Rest Area, looking west.',
              'latitude' => 49.057499999999997,
              'longitude' => -122.17700000000001,
            ),
            519 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/657.jpg',
              'name' => 'Mine Creek',
              'description' => 'Hwy 5 southbound, at Mine Creek Rd, looking south.',
              'latitude' => 49.686413999999999,
              'longitude' => -121.013756,
            ),
            520 =>
            array (
              'image' => 'http://images.drivebc.ca/bchighwaycam/pub/cameras/682.jpg',
              'name' => 'Deltaport Way - S',
              'description' => 'Hwy 17 (South Fraser Perimeter Rd) at Deltaport Way in South Delta, looking south.',
              'latitude' => 49.057929399999999,
              'longitude' => -123.05690269999999,
            ),
          );
  }
}
