//
//  SettingsTableViewController.swift
//  ThinkTogetherMaps
//
//  Created by Evian on 2016-07-11.
//  Copyright © 2016 totems. All rights reserved.
//

import UIKit

class SettingsViewController: UIViewController {
    @IBOutlet weak var tableView: UITableView!
    @IBOutlet weak var logoutButton: UIButton!
    
    let cellIdentifier = "cellIdentifier"
    override func viewDidLoad() {
        super.viewDidLoad()
        
        title = "Settings"
        
        tableView.delegate = self
        tableView.dataSource = self
        tableView.registerNib(UINib(nibName: "SettingsTableViewCell",  bundle: nil), forCellReuseIdentifier: cellIdentifier)
        tableView.tableFooterView = UIView()
        
        logoutButton.layer.cornerRadius = CGFloat(5.0)
        logoutButton.layer.borderWidth = CGFloat(1.0)
        logoutButton.layer.borderColor = UIColor.TMOrangeColor.CGColor
    }
}


extension SettingsViewController: UITableViewDataSource {
    
    func tableView(tableView: UITableView, numberOfRowsInSection section: Int) -> Int {
        return 5
    }
    
    func tableView(tableView: UITableView, cellForRowAtIndexPath indexPath: NSIndexPath) -> UITableViewCell {
        let cell = tableView.dequeueReusableCellWithIdentifier(cellIdentifier) as! SettingsTableViewCell
        switch indexPath.row {
        case 0:
            cell.mLabel.text = "Account"
            cell.mImageView.image = UIImage(named: "Account")
            break
        case 1:
            cell.mLabel.text = "History"
            cell.mImageView.image = UIImage(named: "History")
            break
        case 2:
            cell.mLabel.text = "Trouble Ticket"
            cell.mImageView.image = UIImage(named: "Ticket")
            break
        case 3:
            cell.mLabel.text = "Preferences"
            cell.mImageView.image = UIImage(named: "Preferences")
            break
        case 4:
            cell.mLabel.text = "Term of Use"
            cell.mImageView.image = UIImage(named: "Term of Use")
            break
        default:
            break
        }
        let image = UIImage(named: "Forward")
        let imageView = UIImageView(frame: CGRect(x: 0.0, y: 0.0, width: CGFloat(15), height: CGFloat(20)))
        imageView.image = image
        cell.accessoryView = imageView
        return cell
    }
    
    func tableView(tableView: UITableView, heightForRowAtIndexPath indexPath: NSIndexPath) -> CGFloat {
        return 70.0
    }
}

extension SettingsViewController: UITableViewDelegate {
    
    func tableView(tableView: UITableView, didSelectRowAtIndexPath indexPath: NSIndexPath) {
        switch indexPath.row {
        case 0:
            if let storyboard = storyboard {
                let vc = storyboard.instantiateViewControllerWithIdentifier("AccountId")
                navigationController?.pushViewController(vc, animated: true)
            }
        case 1:
            if let storyboard = storyboard {
                let vc = storyboard.instantiateViewControllerWithIdentifier("HistoryId")
                navigationController?.pushViewController(vc, animated: true)
            }
        case 2:
            if let storyboard = storyboard {
                if let vc = storyboard.instantiateViewControllerWithIdentifier("TroubleTicketId") as? TroubleTicketViewController {
                    vc.config()
                    navigationController?.pushViewController(vc, animated: true)
                }
            }
        default:
            break
        }
    }
}
