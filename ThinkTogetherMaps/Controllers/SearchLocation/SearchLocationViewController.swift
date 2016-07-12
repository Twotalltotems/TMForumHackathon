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
    
    var delegate: SearchLocationViewControllerDelegate! = nil
    
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
        searchResultTableView.reloadData()
    }
    
    func closeAction(sender: UIButton) {
        dismissViewControllerAnimated(true, completion: nil)
    }
    
    @IBAction func searchAction(sender: UIButton) {
        view.endEditing(true)
        if let text = searchTextField.text {
            delegate.searchLocation(text)
        }
        closeAction(sender)
    }
}

// MARK: - UITextFieldDelegate

extension SearchLocationViewController: UITextFieldDelegate {
    
    func textFieldDidChangeValue(textField: UITextField) {
        if let text = textField.text {
            NetworkClient.getSharedInstance().getAutocompleteResults(text) { (predications) in
                
                guard let predications = predications where predications.count > 0 else {
                    self.clearSearchResultTableView()
                    return
                }
                
                self.searchResultTableView.hidden = false
                self.autocompleteSearchResults = predications
                self.searchResultTableView.reloadData()
            }
        } else {
            clearSearchResultTableView()
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

// MARK: - UITableViewDelegate

extension SearchLocationViewController: UITableViewDelegate {
    
    func tableView(tableView: UITableView, didSelectRowAtIndexPath indexPath: NSIndexPath) {
        let locationText = autocompleteSearchResults[indexPath.row].attributedFullText
        searchTextField.text = locationText.string
        clearSearchResultTableView()
    }
}

// MARK: - Protocol SearchLocationViewControllerDelegate

protocol SearchLocationViewControllerDelegate {
    func searchLocation(location: String)
}
