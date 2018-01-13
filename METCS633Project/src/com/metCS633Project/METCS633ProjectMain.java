/**
 * @name        (MainClass)
 * @author      (MET CS 633 Group 1 Fall 1 2018)
 * @version     (v. 1.0.0)
 * @description ()
 */
package com.metCS633Project;

import java.util.*;

/**
 * This class is the entry point to the project from the command-line
 */
class METCS633ProjectMain{

	/**
	 * This method prints information on the application
	 */
	public static void printHelp(){
	}

	/**
	 * This method prepares the environment and instantiates the application
	 */
	public static void main(String[] args){
		boolean help = false;

		if(args.length > 0){
			for(int i = 0; i < args.length; i++){
				if(args[i].equals("-h")){
					help = true;
				}
			}
		}

		if(help){
			printHelp();
		}
	}
}
