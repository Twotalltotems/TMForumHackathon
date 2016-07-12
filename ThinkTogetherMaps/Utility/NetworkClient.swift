//
//  NetworkClient.swift
//  ThinkTogetherMaps
//
//  Created by Anson Yao on 2016-07-11.
//  Copyright © 2016 totems. All rights reserved.
//

import Foundation
import ObjectMapper
import Alamofire

class NetworkClient {
    
    let baseUrl = "http://172.20.29.86:8080"
    
    private static let networkClient = NetworkClient()
    
    static func getSharedInstance() -> NetworkClient {
        return networkClient
    }
    
    private init() {}
    
    func getSenserData(success successHandler:  (SensorData) -> Void, failure failureHandler: (Void -> Void)) {
        Alamofire.request(.GET, "http://ttt-hackathon.mybluemix.net/sensor", parameters: nil)
            .validate()
            .responseJSON { response in
                switch response.result {
                case .Success:
                    if let json = response.result.value as? [[String: AnyObject]] {
                        let results = json.map { Mapper<SensorData>().map($0)!}
                        print(results.count)
                        successHandler(results[results.endIndex-1])
                    }
                    
                    print("validation success")
                case .Failure(let error):
                    print(error)
                }
        }
    }
    
    func getAutocompleteResults(queryString: String, success: ([GMSAutocompletePrediction]?) -> Void) {
        
        let placeClient = GMSPlacesClient.sharedClient()
        
        placeClient.autocompleteQuery(queryString, bounds: nil, filter: nil) { (predictions, error) in
            if let _ = error {
                success(nil)
            } else {
                success(predictions)
            }
        }
    }
    
    func searchLocation(location: String, success: CLCircularRegion? -> Void, failure: NSError? -> Void) {
        let geocoder = CLGeocoder()
        geocoder.geocodeAddressString(location) { (placemarks, error) in
            if let placemarks = placemarks {
                if let region = placemarks[0].region as! CLCircularRegion? {
                    success(region)
                }
            } else {
                failure(error)
            }
        }
    }
    
    func login(username username: String, password: String, success: User? -> Void) {
        
        Alamofire.request(.POST, "\(baseUrl)/login", encoding: .URL, headers: nil).responseJSON { (response) -> Void in
            
            if let _ = response.result.error {
                success(nil)
            }
            
            if let json = response.result.value {
                let user = Mapper<User>().map(json)
                user?.email = username
                success(user)
            }
        }
    }
    
    func getOpen511Events(success successHandler:  ([Open511Event], [Open511Cam]) -> Void, failure failureHandler: (Void -> Void)) {
        Alamofire.Manager.sharedInstance.session.configuration
            .HTTPAdditionalHeaders?.updateValue("application/json",
                                                forKey: "Accept")
//       Alamofire.request(.GET, "http://api.open511.gov.bc.ca/events?bbox=-123.45,48.99,-122.45,49.49", parameters: nil)
       Alamofire.request(.GET, "http://172.20.29.86:8080/getpois", parameters: nil)
            .validate()
            .responseJSON { response in
                switch response.result {
                case .Success:
                    if let json = response.result.value as? [String: [AnyObject]] {
                        let eventsData = json["events"]!
                        let events =  eventsData.map({Mapper<Open511Event>().map($0)!})
                        let camsData = json["cams"]!
                        let cams = camsData.map({Mapper<Open511Cam>().map($0)!})
                        successHandler(events, cams)
                    }
                    
                    print("validation success")
                case .Failure(let error):
                    print(error)
                }
        }
    }
    
    func getTroubleTickets(success: [TroubleTicket]? -> Void) {
        
        Alamofire.request(.GET, "\(baseUrl)/trouble", encoding: .URL, headers: nil).responseJSON { (response) -> Void in
            
            if let _ = response.result.error {
                success(nil)
            }
            
            if let json = response.result.value as? [AnyObject] {
                let results = json.map { Mapper<TroubleTicket>().map($0)! }
                success(results)
            }
        }
    }
}


