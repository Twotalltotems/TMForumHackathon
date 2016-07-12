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
    var luminosity: Double?
    var noise: Double?
    var oxygen: Double?
    var temperature: Double?
    
    
    required init?(_ map: Map) {
    }
    
    // Mappable
    func mapping(map: Map) {
        payload <- map["payload"]
        parse(payload!)
//        dust = payload?.substringToIndex(index: Index)
    }
    
    func parse(str: String) {
        var startIndex = str.rangeOfString("sensors.arduino.dust")?.endIndex.advancedBy(2)
        var endIndex = str.rangeOfString("sensors.arduino.dust")?.endIndex.advancedBy(8)
        var abbstractedStr = str.substringWithRange(Range<String.Index>(start: startIndex!, end: endIndex!)).stringByTrimmingCharactersInSet(NSCharacterSet.lowercaseLetterCharacterSet())
        dust = Double(abbstractedStr)
        
        startIndex = str.rangeOfString("sensors.arduino.humidity")?.endIndex.advancedBy(2)
        endIndex = str.rangeOfString("sensors.arduino.humidity")?.endIndex.advancedBy(8)
        abbstractedStr = str.substringWithRange(Range<String.Index>(start: startIndex!, end: endIndex!)).stringByTrimmingCharactersInSet(NSCharacterSet.lowercaseLetterCharacterSet())
        humidity = Double(abbstractedStr)
        
        startIndex = str.rangeOfString("sensors.arduino.luminosity")?.endIndex.advancedBy(2)
        endIndex = str.rangeOfString("sensors.arduino.luminosity")?.endIndex.advancedBy(4)
        abbstractedStr = str.substringWithRange(Range<String.Index>(start: startIndex!, end: endIndex!)).stringByTrimmingCharactersInSet(NSCharacterSet.lowercaseLetterCharacterSet())
        luminosity = Double(abbstractedStr)
        
        startIndex = str.rangeOfString("sensors.arduino.noise")?.endIndex.advancedBy(2)
        endIndex = str.rangeOfString("sensors.arduino.noise")?.endIndex.advancedBy(4)
        abbstractedStr = str.substringWithRange(Range<String.Index>(start: startIndex!, end: endIndex!)).stringByTrimmingCharactersInSet(NSCharacterSet.lowercaseLetterCharacterSet())
        noise = Double(abbstractedStr)

        startIndex = str.rangeOfString("sensors.arduino.oxygen")?.endIndex.advancedBy(2)
        endIndex = str.rangeOfString("sensors.arduino.oxygen")?.endIndex.advancedBy(8)
        abbstractedStr = str.substringWithRange(Range<String.Index>(start: startIndex!, end: endIndex!)).stringByTrimmingCharactersInSet(NSCharacterSet.lowercaseLetterCharacterSet())
        oxygen = Double(abbstractedStr)
        
        startIndex = str.rangeOfString("sensors.arduino.temperature")?.endIndex.advancedBy(2)
        endIndex = str.rangeOfString("sensors.arduino.temperature")?.endIndex.advancedBy(8)
        abbstractedStr = str.substringWithRange(Range<String.Index>(start: startIndex!, end: endIndex!)).stringByTrimmingCharactersInSet(NSCharacterSet.lowercaseLetterCharacterSet())
        temperature = Double(abbstractedStr)
    }
    
    func toString() -> String {
        if let dust = self.dust, humidity = self.humidity, luminosity = self.luminosity, noise = self.noise, oxygen = self.oxygen, temperature = self.temperature {
            var str = "Dust: " + String(dust) + "\n"
            str += "Humidity: " + String(humidity) + "\n"
            str += "Luminosity: " + String(luminosity) + "\n"
            str += "Noise: " + String(noise) + "\n"
            str += "Oxygen: " + String(oxygen) + "\n"
            str += "Temperature:" + String(temperature)
            return str
        }
        else {
            return ""
        }
    }
    
    func setupMarker(mapView: GMSMapView) {
        let position = CLLocationCoordinate2DMake(49.288852, -123.120573)
        let marker = GMSMarker(position: position)
        marker.title = self.toString()
        let imageView = UIImageView(frame: CGRect(x: 0.0, y: 0.0, width: 40.0, height: 40.0))
        imageView.contentMode = UIViewContentMode.ScaleAspectFit
        imageView.image = UIImage(named: "Box")
        marker.iconView = imageView
        marker.map = mapView
    }
    
}


