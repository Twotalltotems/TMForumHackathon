//
//  CameraImageViewController.swift
//  ThinkTogetherMaps
//
//  Created by Anson Yao on 2016-07-12.
//  Copyright © 2016 totems. All rights reserved.
//

import UIKit


class CameraImageViewController: UIViewController {
    
    var camData: Open511Cam?
    
    @IBOutlet weak var imageView: UIImageView!
    
    override func viewDidLoad() {
        super.viewDidLoad()
        if let imageURL = camData?.imageURL {
            imageView.sd_setImageWithURL(NSURL(string: imageURL), placeholderImage: nil)
        }
    }
    
    
}
