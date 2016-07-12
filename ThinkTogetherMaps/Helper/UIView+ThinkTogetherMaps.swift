//
//  UIView+ThinkTogetherMaps.swift
//  ThinkTogetherMaps
//
//  Created by Evian on 2016-07-11.
//  Copyright © 2016 totems. All rights reserved.
//

extension UIView {
    
    var screenshot: UIImage {
        
        UIGraphicsBeginImageContext(bounds.size)
        
        guard let context = UIGraphicsGetCurrentContext() else {
            return UIImage()
        }
        
        layer.renderInContext(context)
        
        guard let screenShot = UIGraphicsGetImageFromCurrentImageContext() else {
            return UIImage()
        }
        
        UIGraphicsEndImageContext()
        
        return screenShot
    }
}
