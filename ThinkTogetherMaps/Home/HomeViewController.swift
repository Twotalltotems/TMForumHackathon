//
//  HomeViewController.swift
//  ThinkTogetherMaps
//
//  Created by Evian on 2016-07-11.
//  Copyright © 2016 totems. All rights reserved.
//

import UIKit

class HomeViewController: UIViewController {

    override func viewDidLoad() {
        super.viewDidLoad()
        setupNavigationBar()
        setupMap()
    }
    
    private func setupNavigationBar() {
        
        title = "Main Screen"
        
        let leftBarButtonItem = UIBarButtonItem(barButtonSystemItem: .Search, target: self, action: #selector(HomeViewController.searchAction(_:)))
        navigationItem.leftBarButtonItem = leftBarButtonItem
        
        let rightBarButtonItem = UIBarButtonItem(barButtonSystemItem: .Organize, target: self, action: #selector(HomeViewController.settingsAction(_:)))
        navigationItem.rightBarButtonItem = rightBarButtonItem
    }
    
    private func setupMap() {
        let camera = GMSCameraPosition.cameraWithLatitude(-33.86,
                                                          longitude: 151.20, zoom: 6)
        let mapView = GMSMapView.mapWithFrame(CGRectZero, camera: camera)
        mapView.myLocationEnabled = true
        self.view = mapView
        
        let marker = GMSMarker()
        marker.position = CLLocationCoordinate2DMake(-33.86, 151.20)
        marker.title = "Sydney"
        marker.snippet = "Australia"
        marker.map = mapView
    }
    
    func searchAction(sender: UIButton) {
    }
    
    func settingsAction(sender: UIButton) {
    }
}

