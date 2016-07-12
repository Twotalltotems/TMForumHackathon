//
//  AppDelegate.swift
//  ThinkTogetherMaps
//
//  Created by Evian on 2016-07-11.
//  Copyright © 2016 totems. All rights reserved.
//

import UIKit

@UIApplicationMain
class AppDelegate: UIResponder, UIApplicationDelegate {

    var window: UIWindow?


    func application(application: UIApplication, didFinishLaunchingWithOptions launchOptions: [NSObject: AnyObject]?) -> Bool {
        
        setupUIAppearance()
        
        window = UIWindow.init(frame: UIScreen.mainScreen().bounds)
        showMainUI()
        window?.makeKeyAndVisible()
        
        // Setup Google map
        GMSServices.provideAPIKey("AIzaSyC_YhrejjR-B8_qnWU6pEZ2n6hjREE-Oj0")

        // Customize bars
        UINavigationBar.appearance().barTintColor = UIColor.TMOrangeColor
        UINavigationBar.appearance().tintColor = UIColor.whiteColor()
        UINavigationBar.appearance().titleTextAttributes = [NSForegroundColorAttributeName: UIColor.whiteColor()]
        application.setStatusBarStyle(UIStatusBarStyle.LightContent, animated: false)
        
        return true
    }

    func applicationWillResignActive(application: UIApplication) {
        // Sent when the application is about to move from active to inactive state. This can occur for certain types of temporary interruptions (such as an incoming phone call or SMS message) or when the user quits the application and it begins the transition to the background state.
        // Use this method to pause ongoing tasks, disable timers, and throttle down OpenGL ES frame rates. Games should use this method to pause the game.
    }

    func applicationDidEnterBackground(application: UIApplication) {
        // Use this method to release shared resources, save user data, invalidate timers, and store enough application state information to restore your application to its current state in case it is terminated later.
        // If your application supports background execution, this method is called instead of applicationWillTerminate: when the user quits.
    }

    func applicationWillEnterForeground(application: UIApplication) {
        // Called as part of the transition from the background to the inactive state; here you can undo many of the changes made on entering the background.
    }

    func applicationDidBecomeActive(application: UIApplication) {
        // Restart any tasks that were paused (or not yet started) while the application was inactive. If the application was previously in the background, optionally refresh the user interface.
    }

    func applicationWillTerminate(application: UIApplication) {
        // Called when the application is about to terminate. Save data if appropriate. See also applicationDidEnterBackground:.
    }
    
    private func setupUIAppearance() {
        
    }
    
    func showMainUI() {
        window?.rootViewController = mainController
    }
    
    var mainController: UIViewController? = {
        let nav = UINavigationController(rootViewController: UIStoryboard(name: "Main", bundle: nil).instantiateInitialViewController()!)
        nav.navigationBar.barStyle = UIBarStyle.BlackOpaque
        return nav
    }()
}

