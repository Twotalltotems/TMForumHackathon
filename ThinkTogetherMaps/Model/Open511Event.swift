//
//  Open511Event.swift
//  ThinkTogetherMaps
//
//  Created by Anson Yao on 2016-07-12.
//  Copyright © 2016 totems. All rights reserved.
//
import Foundation

import ObjectMapper

class Open511Event: Mappable {
//    var headline: String?
    var description: String?
    var eventType: String?
    var geoGraphy: [Double]?

    required init?(_ map: Map) {
    }
    
    // Mappable
    func mapping(map: Map) {
//       headline <- map["headline"]
        description <- map["description"]
        eventType <- map["type"]
        geoGraphy <- map["geo"]
    }
    
    func setupMarker(mapView: GMSMapView) {
        if geoGraphy != nil && geoGraphy!.count == 2 {
            let position = CLLocationCoordinate2DMake(geoGraphy![1], geoGraphy![0])
            let marker = GMSMarker(position: position)
            marker.title = description
            let imageView = UIImageView(frame: CGRect(x: 0.0, y: 0.0, width: 40.0, height: 40.0))
            imageView.contentMode = UIViewContentMode.ScaleAspectFit
            switch(eventType!) {
            case "CONSTRUCTION":
                imageView.image = UIImage(named: "Construction")
                break
            case "INCIDENT":
                imageView.image = UIImage(named: "flag")
                break
            default:
                imageView.image = UIImage(named: "Term of Use")
            }
            
            marker.iconView = imageView
            marker.map = mapView
        }
    }
}



