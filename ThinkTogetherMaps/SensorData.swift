//
//  SensorData.swift
//  ThinkTogetherMaps
//
//  Created by Anson Yao on 2016-07-11.
//  Copyright © 2016 totems. All rights reserved.
//

import Foundation

import ObjectMapper

class SensorData: Mappable {
    var payload: String?
    var dust: Double?
    var humidity: Double?
    var temperature: Double?
    var oxygen: Double?
    
    required init?(_ map: Map) {
    }
    
    // Mappable
    func mapping(map: Map) {
        payload <- map["payload"]
//       parse(payload!)
//        dust = payload?.substringToIndex(index: Index)
    }
    
    func parse(str: String) {
        var startIndex = str.rangeOfString("sensors.arduino.dust")?.endIndex.advancedBy(2)
        var endIndex = str.rangeOfString("sensors.arduino.dust")?.endIndex.advancedBy(8)
        dust = Double(str.substringWithRange(Range<String.Index>(start: startIndex!, end: endIndex!)))
        
        startIndex = str.rangeOfString("sensors.arduino.dust")?.endIndex.advancedBy(2)
        endIndex = str.rangeOfString("sensors.arduino.dust")?.endIndex.advancedBy(8)
        humidity = Double(str.substringWithRange(Range<String.Index>(start: startIndex!, end: endIndex!)))
        
        startIndex = str.rangeOfString("sensors.arduino.dust")?.endIndex.advancedBy(2)
        endIndex = str.rangeOfString("sensors.arduino.dust")?.endIndex.advancedBy(8)
        dust = Double(str.substringWithRange(Range<String.Index>(start: startIndex!, end: endIndex!)))
        
        startIndex = str.rangeOfString("sensors.arduino.dust")?.endIndex.advancedBy(2)
        endIndex = str.rangeOfString("sensors.arduino.dust")?.endIndex.advancedBy(8)
        dust = Double(str.substringWithRange(Range<String.Index>(start: startIndex!, end: endIndex!)))
    }
    
}


