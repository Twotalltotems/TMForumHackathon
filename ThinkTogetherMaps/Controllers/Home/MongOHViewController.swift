//
//  MongOHViewController.swift
//  ThinkTogetherMaps
//
//  Created by Anson Yao on 2016-07-12.
//  Copyright © 2016 totems. All rights reserved.
//

import UIKit

class MongOHViewController: UITableViewController {

    var sensorData: SensorData?
    
    override func viewDidLoad() {
        super.viewDidLoad()
    }
    
    override func tableView(tableView: UITableView, numberOfRowsInSection section: Int) -> Int {
        return 6
    }
    
    override func tableView(tableView: UITableView, cellForRowAtIndexPath indexPath: NSIndexPath) -> UITableViewCell {
        var cell = tableView.dequeueReusableCellWithIdentifier("identifier")
        if cell == nil {
            cell = UITableViewCell(style: UITableViewCellStyle.Value1, reuseIdentifier: "identifier")
        }
        switch indexPath.row {
        case 0:
            cell!.textLabel!.text = "Dust: "
            cell!.detailTextLabel!.text = String(sensorData!.dust!)
            break
        case 1:
            cell!.textLabel!.text = "Humidity: "
            cell!.detailTextLabel!.text = String(sensorData!.humidity!)
            break
        case 2:
            cell!.textLabel!.text = "Luminosity: "
            cell!.detailTextLabel!.text = String(sensorData!.luminosity!)
            break
        case 3:
            cell!.textLabel!.text = "Noise: "
            cell!.detailTextLabel!.text = String(sensorData!.noise!)
            break
        case 4:
            cell!.textLabel!.text = "Oxygen: "
            cell!.detailTextLabel!.text = String(sensorData!.oxygen!)
            break
        case 5:
            cell!.textLabel!.text = "Temperature: "
            cell!.detailTextLabel!.text = String(sensorData!.temperature!)
            break
        default:
            break;
        }
        return cell!
    }
}
