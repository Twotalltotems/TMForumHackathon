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
    private static let networkClient = NetworkClient()
    
    static func getSharedInstance() -> NetworkClient {
        return networkClient
    }
    
    private init() {}
    
    func getSenserData(successHandler:  (SensorData) -> Void, failureHandler: (Void -> Void)) {
        Alamofire.request(.GET, "http://ttt-hackathon.mybluemix.net/sensor", parameters: nil)
            .validate()
            .responseJSON { response in
                switch response.result {
                case .Success:
                    if let json = response.result.value as? [[String: AnyObject]] {
                        let results = json.map { Mapper<SensorData>().map($0)!}
                        print(results.count)
                    }
                    
                    print("validation success")
                case .Failure(let error):
                    print(error)
                }
        }
    }
}


