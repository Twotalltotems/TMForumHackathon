//
//  Open511Cam.swift
//  ThinkTogetherMaps
//
//  Created by Anson Yao on 2016-07-12.
//  Copyright © 2016 totems. All rights reserved.
//

import Foundation

import ObjectMapper

class Open511Cam: Mappable {
    var imageURL: String?
    var description: String?
    var name: String?
    var latitude: Double?
    var longitude: Double?

    
    required init?(_ map: Map) {
    }
    
    // Mappable
    func mapping(map: Map) {
        name <- map["name"]
        imageURL <- map["image"]
        description <- map["description"]
        latitude <- map["latitude"]
        longitude <- map["longitude"]
    }
    
    
    func setupMarker(mapView: GMSMapView) {
        if shouldGenerateMarker() && latitude != nil && longitude != nil {
            let position = CLLocationCoordinate2DMake(latitude!, longitude!)
            let marker = GMSMarker(position: position)
            marker.title = "Camera"
            marker.snippet = description
            let imageView = UIImageView(frame: CGRect(x: 0.0, y: 0.0, width: 40.0, height: 40.0))
            imageView.contentMode = UIViewContentMode.ScaleAspectFit
            imageView.image = UIImage(named: "Camera")
            marker.iconView = imageView
            marker.map = mapView
            marker.userData = self
        }
    }
    
    func shouldGenerateMarker() -> Bool {
        let value = Int(arc4random_uniform(20))
        return  value < 1
    }
}
