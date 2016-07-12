//
//  SearchLocationViewController.swift
//  ThinkTogetherMaps
//
//  Created by Evian on 2016-07-11.
//  Copyright © 2016 totems. All rights reserved.
//

import UIKit

class SearchLocationViewController: UIViewController {

    override func viewDidLoad() {
        super.viewDidLoad()
        setupNavigationBar()
    }
    
    private func setupNavigationBar() {
        
        title = "Search"
        
        let leftBarButtonItem = UIBarButtonItem(barButtonSystemItem: .Cancel, target: self, action: #selector(SearchLocationViewController.closeAction(_:)))
        navigationItem.leftBarButtonItem = leftBarButtonItem
    }
    
    func closeAction(sender: UIButton) {
        dismissViewControllerAnimated(true, completion: nil)
    }
}
