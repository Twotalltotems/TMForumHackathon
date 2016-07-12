//
//  GeoGraphy.swift
//  ThinkTogetherMaps
//
//  Created by Anson Yao on 2016-07-12.
//  Copyright © 2016 totems. All rights reserved.
//

import Foundation


import Foundation

import ObjectMapper

class GeoGraphy: Mappable {
    var type: String?
    var coordinates: [Double]?
    
    required init?(_ map: Map) {
    }
    
    // Mappable
    func mapping(map: Map) {
        type <- map["type"]
        coordinates <- map["coordinates"]
    }
}
