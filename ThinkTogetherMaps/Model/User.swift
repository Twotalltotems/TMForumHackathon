//
//  User.swift
//  ThinkTogetherMaps
//
//  Created by Evian on 2016-07-12.
//  Copyright © 2016 totems. All rights reserved.
//

import Foundation
import ObjectMapper

class User: Mappable {
    
    var email: String!  {
        get {
            let defaults = NSUserDefaults.standardUserDefaults()
            return defaults.objectForKey("email") as? String
        }
        set {
            let defaults = NSUserDefaults.standardUserDefaults()
            if let v = newValue {
                defaults.setObject(v, forKey: "email")
            } else {
                defaults.setObject(nil, forKey: "email")
            }
            defaults.synchronize()
        }
    }
    var id: String!
    var auth: String!
    var givenName: String!
    var lastname: String!
    
    required init?(_ map: Map) {
    }
    
    init(email: String) {
        self.email = email
    }
    
    func mapping(map: Map) {
        id          <- map["id"]
        auth        <- map["auth"]
        givenName   <- map["givenName"]
        lastname    <- map["lastname"]
    }
}
