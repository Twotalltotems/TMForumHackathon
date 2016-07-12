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
        
        tableView.tableFooterView = UIView()
        
        let timer = NSTimer.scheduledTimerWithTimeInterval(5, target: self, selector: #selector(fetchdatafromSensor), userInfo: nil, repeats: true)
    }
    
    
    func fetchdatafromSensor() {
        NetworkClient.getSharedInstance().getSenserData(success: {[weak self] sensorData -> Void in
            if let strongSelf = self {
                strongSelf.sensorData = sensorData
                strongSelf.tableView.reloadData()
            }
        }) {}
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
            if let dust = sensorData?.dust {
                cell!.detailTextLabel!.text = String(dust)
            }
            break
        case 1:
            cell!.textLabel!.text = "Humidity: "
            if let humidity = sensorData?.humidity {
                cell!.detailTextLabel!.text = String(humidity)
            }
            break
        case 2:
            cell!.textLabel!.text = "Luminosity: "
            if let luminosity = sensorData?.luminosity {
                cell!.detailTextLabel!.text = String(luminosity)
            }
            break
        case 3:
            cell!.textLabel!.text = "Noise: "
            if let noise = sensorData?.noise {
                cell!.detailTextLabel!.text = String(noise)
            }
            break
        case 4:
            cell!.textLabel!.text = "Oxygen: "
            if let oxygen = sensorData?.oxygen {
                cell!.detailTextLabel!.text = String(oxygen)
            }
            break
        case 5:
            cell!.textLabel!.text = "Temperature: "
            if let temperature = sensorData?.temperature {
                cell!.detailTextLabel!.text = String(temperature)
            }
            break
        default:
            break;
        }
        return cell!
    }
}
