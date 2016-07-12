//
//  LoginViewController.swift
//  ThinkTogetherMaps
//
//  Created by Evian on 2016-07-12.
//  Copyright © 2016 totems. All rights reserved.
//

import UIKit

class LoginViewController: UIViewController {

    @IBOutlet weak var emailTextField: UITextField!
    @IBOutlet weak var passwordTextField: UITextField!
    
    override func viewDidLoad() {
        super.viewDidLoad()

        title = "Login"
        
        emailTextField.text = "Awesome hacker"
        passwordTextField.text = "Awesome hacker"
    }
    
    @IBAction func loginAction(sender: UIButton) {
        if let email = emailTextField.text, let password = passwordTextField.text {
            AuthClient.sharedManager.login(email, password: password, completion: { error in
                if error == nil {
                    if let vc = AppDelegate().mainController {
                        self.presentViewController(vc, animated: true, completion: nil)
                    }
                }
            })
        }
    }
}
