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
    }
    
    private func setupNavigationBar() {
        
        title = "Main Screen"
        
        let leftBarButtonItem = UIBarButtonItem(barButtonSystemItem: .Search, target: self, action: #selector(HomeViewController.searchAction(_:)))
        navigationItem.leftBarButtonItem = leftBarButtonItem
        
        let rightBarButtonItem = UIBarButtonItem(barButtonSystemItem: .Organize, target: self, action: #selector(HomeViewController.settingsAction(_:)))
        navigationItem.rightBarButtonItem = rightBarButtonItem
    }
    
    func searchAction(sender: UIButton) {
    }
    
    func settingsAction(sender: UIButton) {
    }
}

