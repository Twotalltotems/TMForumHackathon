//
//  AuthClient.swift
//  ThinkTogetherMaps
//
//  Created by Evian on 2016-07-12.
//  Copyright © 2016 totems. All rights reserved.
//

import Foundation
import Alamofire

class AuthClient {
    
    static let sharedManager = AuthClient()
    
    private var user: User?
    var CurrentUser: User? {
        get {
            return user
        }
    }
    
    func isCurrentUserLoggedIn() -> Bool {
        return user != nil
    }
    
    class var previousUserName: String? {
        get {
            let defaults = NSUserDefaults.standardUserDefaults()
            return defaults.stringForKey("previousUsername")
        }
        set {
            let defaults = NSUserDefaults.standardUserDefaults()
            if let v = newValue {
                defaults.setObject(v, forKey: "previousUsername")
                
            } else {
                defaults.setObject(nil, forKey: "previousUsername")
            }
            defaults.synchronize()
        }
    }
    
    func login(username: String, password: String, completion: (NSError? -> ())?) {
        
        NetworkClient.getSharedInstance().login(username: username, password: password) { user in
            guard let user = user else {
                completion!(NSError(domain: "local", code: 500, userInfo: nil))
                return
            }
            self.user = user
            completion!(nil)
        }
    }
    
    func reconstructUserFromKeychain() -> Bool {
        
        if let user = self.user {
            return true
        }
        
        if let username = AuthClient.previousUserName {
            let user = User(email: username)
            if (true) {
                self.user = user
                return true
            }
        }
        return false
    }
}
