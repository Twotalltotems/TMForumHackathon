//
//  SearchLocationViewController.swift
//  ThinkTogetherMaps
//
//  Created by Evian on 2016-07-11.
//  Copyright © 2016 totems. All rights reserved.
//

import UIKit
import GoogleMaps

class SearchLocationViewController: UIViewController {

    @IBOutlet weak var searchTextField: UITextField!
    @IBOutlet weak var searchResultTableView: UITableView!
    
    var autocompleteSearchResults = [GMSAutocompletePrediction]()
    
    override func viewDidLoad() {
        super.viewDidLoad()
        setupNavigationBar()
        setupView()
    }
    
    private func setupNavigationBar() {
        
        title = "Search"
        
        let leftBarButtonItem = UIBarButtonItem(barButtonSystemItem: .Cancel, target: self, action: #selector(SearchLocationViewController.closeAction(_:)))
        navigationItem.leftBarButtonItem = leftBarButtonItem
    }
    
    private func setupView() {
        searchTextField.addTarget(self, action: #selector(SearchLocationViewController.textFieldDidChangeValue(_:)), forControlEvents: .EditingChanged)
        searchTextField.becomeFirstResponder()
        
        searchResultTableView.hidden = true
        searchResultTableView.dataSource = self
        searchResultTableView.delegate = self
    }
    
    private func clearSearchResultTableView() {
        searchResultTableView.hidden = true
        autocompleteSearchResults = [GMSAutocompletePrediction]()
    }
    
    func closeAction(sender: UIButton) {
        dismissViewControllerAnimated(true, completion: nil)
    }
}

// MARK: - UITextFieldDelegate

extension SearchLocationViewController: UITextFieldDelegate {
    
    func textFieldDidChangeValue(textField: UITextField) {
        if let text = textField.text {
            NetworkClient.getSharedInstance().getAutocompleteResults(text) { (predications) in
                
                if let predications = predications where predications.count > 0 {
                    self.searchResultTableView.hidden = false
                    self.autocompleteSearchResults = predications
                } else {
                    self.clearSearchResultTableView()
                }
                self.searchResultTableView.reloadData()
            }
        } else {
            self.clearSearchResultTableView()
            self.searchResultTableView.reloadData()
        }
    }
}

// MARK: - UITableViewDataSource

extension SearchLocationViewController: UITableViewDataSource {
    
    func tableView(tableView: UITableView, numberOfRowsInSection section: Int) -> Int {
        return autocompleteSearchResults.count
    }
    
    func tableView(tableView: UITableView, cellForRowAtIndexPath indexPath: NSIndexPath) -> UITableViewCell {
        let cell = tableView.dequeueReusableCellWithIdentifier("AutocompleteResultCell", forIndexPath: indexPath)
        cell.textLabel?.attributedText = autocompleteSearchResults[indexPath.row].attributedPrimaryText
        cell.detailTextLabel?.attributedText = autocompleteSearchResults[indexPath.row].attributedSecondaryText
        return cell
    }
}

extension SearchLocationViewController: UITableViewDelegate {
    
}
