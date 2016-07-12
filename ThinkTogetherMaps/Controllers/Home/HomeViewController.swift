//
//  HomeViewController.swift
//  ThinkTogetherMaps
//
//  Created by Evian on 2016-07-11.
//  Copyright © 2016 totems. All rights reserved.
//

import UIKit

class HomeViewController: UIViewController, UIDocumentInteractionControllerDelegate {

    @IBOutlet weak var mainView: GMSMapView!

    var documentInteractionController: UIDocumentInteractionController!

    override func viewDidLoad() {
        super.viewDidLoad()
        
        setupNavigationBar()
        setupMap()
        
        //Just for test:
        NetworkClient.getSharedInstance().getSenserData(success: {sensorData -> Void in
            //sensorData is the data we need from server.
            NSLog(String(sensorData.luminosity))
        }) {
            
        }
        
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
        mainView.animateToCameraPosition(camera)
        mainView.myLocationEnabled = true
        
        let marker = GMSMarker()
        marker.position = CLLocationCoordinate2DMake(-33.86, 151.20)
        marker.title = "Sydney"
        marker.snippet = "Australia"
        marker.map = mainView
    }
    
    func searchAction(sender: UIButton) {
        if let vc = UIStoryboard(name: "SearchLocation", bundle: nil).instantiateInitialViewController() as? SearchLocationViewController {
            vc.delegate = self
            presentViewController(UINavigationController(rootViewController: vc), animated: true, completion: nil)
        }
    }
    
    func settingsAction(sender: UIButton) {
        if let vc = UIStoryboard(name: "Settings", bundle: nil).instantiateInitialViewController() {
            navigationController?.pushViewController(vc, animated: true)
        }
    }
    
    @IBAction func openIn(sender: UIButton) {

        let image = mainView.screenshot
        
        if let documentsURL = NSFileManager.defaultManager().URLsForDirectory(.DocumentDirectory, inDomains: .UserDomainMask).first {
            
            let dateFormatter = NSDateFormatter()
            dateFormatter.dateStyle = .LongStyle
            let dateString = dateFormatter.stringFromDate(NSDate())
            
            let fileURL = documentsURL.URLByAppendingPathComponent("screenshot-\(dateString).png")
            if let pngImageData = UIImagePNGRepresentation(image) {
                pngImageData.writeToURL(fileURL, atomically: false)
            }
            
            documentInteractionController = UIDocumentInteractionController(URL: fileURL)
            documentInteractionController.delegate = self
            documentInteractionController.presentOptionsMenuFromRect(sender.frame, inView:view, animated:true)
        }
    }
}

extension HomeViewController: SearchLocationViewControllerDelegate {
    
    func searchLocation(location: String) {
        NetworkClient.getSharedInstance().searchLocation(location, success: { region in
            if let region = region {
                
                let center = region.center
                let camera = GMSCameraPosition.cameraWithTarget(center, zoom: 12.0)
                self.mainView.animateToCameraPosition(camera)
                
                let marker = GMSMarker(position: center)
                marker.map = self.mainView
            }
        }) { error in
            print(error)
        }
    }
}
