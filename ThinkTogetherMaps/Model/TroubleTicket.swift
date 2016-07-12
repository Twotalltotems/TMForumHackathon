//
//  TroubleTicket.swift
//  ThinkTogetherMaps
//
//  Created by Evian on 2016-07-12.
//  Copyright © 2016 totems. All rights reserved.
//

import Foundation
import ObjectMapper

class TroubleTicket: Mappable {
    
    var description: String!
    var severity: String!
    
    required init?(_ map: Map) {
    }
    
    func mapping(map: Map) {
        description     <- map["description"]
        severity        <- map["severity"]
    }
}
