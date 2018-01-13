#!/bin/sh
## Name       : make.sh
## Author     : MET CS 633 Group 1 Fall 1 2018
## Version    : v. 1.0.0
## Description: Helps build the project on a Unix system 

APP_ROOT=$(dirname %1)

## Compile Java code
javac \
	$APP_ROOT/com/metCS633Project/*.java 

## Create Manifest file
echo "Main-Class: com.metCS633Project.METCS633ProjectMain\n"  > $APP_ROOT/Manifest.txt

## Create Jar file
jar cvfm \
	$APP_ROOT/../bin/METCS633.jar \
	$APP_ROOT/Manifest.txt \
	$APP_ROOT/com/metCS633Project/*.class \
