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

    var sensorData: SensorData?
    var events: [Open511Event]?
    var cams: [Open511Cam]?
    var sensorMarker: GMSMarker?
    
    var isTicketSend = false
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
        setupNavigationBar()
        setupMap()
        
        let timer = NSTimer.scheduledTimerWithTimeInterval(5, target: self, selector: #selector(fetchdatafromSensor), userInfo: nil, repeats: true)

        NetworkClient.getSharedInstance().getOpen511Events(success: {[weak self] (events, cams) -> Void in
            if let strongSelf = self {
                strongSelf.events = events
                strongSelf.cams = cams
                for event in events {
                    event.setupMarker(strongSelf.mainView)
                }
                for cam in cams {
                    cam.setupMarker(strongSelf.mainView)
                }
                NSLog(String(events.count))
            }
        }) {}
        
        mainView.delegate = self
        
    }
    
    func fetchdatafromSensor() {
        NetworkClient.getSharedInstance().getSenserData(success: {[weak self] sensorData -> Void in
            if let strongSelf = self {
                strongSelf.sensorData = sensorData
                sensorData.setupMarker(strongSelf.mainView)
                if !strongSelf.isTicketSend && sensorData.noise > 300.0 {
                    strongSelf.isTicketSend = true
                    let ticket = TroubleTicket()
                    ticket.description = "Loud sound detected in the ballroom!"
                    ticket.severity = "Low"
                    NetworkClient.getSharedInstance().postTroubleTickets(ticket)
                }
                
                
                NSLog("Sensor data back: Noise -> " + String(sensorData.noise))
            }
        }) {}
    }
    
    
    override func viewDidAppear(animated: Bool) {
        super.viewDidAppear(animated)
        
    }
    
    override func viewDidDisappear(animated: Bool) {
        super.viewDidDisappear(animated)
        
    }
    
    private func setupNavigationBar() {
        
        title = "Home"
        
        let leftBarButtonItem = UIBarButtonItem(image: UIImage(named: "Search"), style: .Plain, target: self, action: #selector(HomeViewController.searchAction(_:)))
        navigationItem.leftBarButtonItem = leftBarButtonItem
        
        let rightBarButtonItem = UIBarButtonItem(image: UIImage(named: "Menu"), style: .Plain, target: self, action: #selector(HomeViewController.settingsAction(_:)))
        navigationItem.rightBarButtonItem = rightBarButtonItem
    }
    
    private func setupMap() {
        let camera = GMSCameraPosition.cameraWithLatitude(49.288852, longitude: -123.120573, zoom: 8)
        mainView.animateToCameraPosition(camera)
        mainView.myLocationEnabled = true
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
            dateFormatter.dateFormat = "yyyy-MM-dd-HH:mm"

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

extension HomeViewController: GMSMapViewDelegate {
    func mapView(mapView: GMSMapView, didTapInfoWindowOfMarker marker: GMSMarker) {
        if marker.userData is SensorData {
           let storyboard = UIStoryboard(name: "Main", bundle: nil)
           let vc = storyboard.instantiateViewControllerWithIdentifier("MongOH") as! MongOHViewController
            vc.sensorData = sensorData
           navigationController?.pushViewController( vc, animated: true)
        }
        
        if marker.userData is Open511Cam {
            let vc = (self.storyboard?.instantiateViewControllerWithIdentifier("popover")) as! CameraImageViewController
            vc.camData = marker.userData as! Open511Cam
            self.navigationController?.pushViewController(vc, animated: true)
        }
    }
}

//extension HomeViewController: UIPopoverControllerDelegate, UIPopoverPresentationControllerDelegate {
//    
//}
