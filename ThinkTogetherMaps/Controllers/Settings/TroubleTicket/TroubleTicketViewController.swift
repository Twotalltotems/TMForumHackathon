//
//  TroubleTicketViewController.swift
//  ThinkTogetherMaps
//
//  Created by Evian on 2016-07-12.
//  Copyright © 2016 totems. All rights reserved.
//

import UIKit

class TroubleTicketViewController: UIViewController {

    @IBOutlet weak var tableView: UITableView!
    
    private var tickets = [TroubleTicket]()
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
        title = "Trouble Ticket"
        
        tableView.dataSource = self
        tableView.delegate = self
        tableView.tableFooterView = UIView()
    }
    
    func config() {
        NetworkClient.getSharedInstance().getTroubleTickets { tickets in
            guard let tickets = tickets else {
                return
            }
            
            self.tickets = tickets
            self.tableView.reloadData()
        }
    }
}

extension TroubleTicketViewController: UITableViewDataSource {
    
    func tableView(tableView: UITableView, numberOfRowsInSection section: Int) -> Int {
        return tickets.count
    }
    
    func tableView(tableView: UITableView, cellForRowAtIndexPath indexPath: NSIndexPath) -> UITableViewCell {
        let cell = tableView.dequeueReusableCellWithIdentifier("TroubleTicketCell")!
        cell.textLabel?.text = tickets[indexPath.row].description
        cell.detailTextLabel?.text = tickets[indexPath.row].severity
        cell.selectionStyle = .None
        return cell
    }
}

extension TroubleTicketViewController: UITableViewDelegate {
}