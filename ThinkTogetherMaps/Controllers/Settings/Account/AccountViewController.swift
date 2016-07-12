//
//  AccountViewController.swift
//  ThinkTogetherMaps
//
//  Created by Evian on 2016-07-12.
//  Copyright © 2016 totems. All rights reserved.
//

import UIKit

class AccountViewController: UIViewController {

    @IBOutlet weak var emailLabel: UILabel!
    @IBOutlet weak var givenNameLabel: UILabel!
    @IBOutlet weak var lastNameLabel: UILabel!
    
    override func viewDidLoad() {
        super.viewDidLoad()
        config()
    }
    
    private func config() {
        if let user = AuthClient.sharedManager.CurrentUser {
            emailLabel.text = "Welcome back, \(user.email)!"
            givenNameLabel.text = user.givenName
            lastNameLabel.text = user.lastname
        }
    }
}
