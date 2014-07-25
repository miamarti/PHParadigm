<?php
function __autoload($class_name) {
	if(file_exists($class_name . '.php')){
		require_once($class_name . '.php');
	} else{
		if(file_exists('business/' . $class_name . '.php')){
			require_once('business/' . $class_name . '.php');
		} else{
			if(file_exists('dao/' . $class_name . '.php')){
				require_once('dao/' . $class_name . '.php');
			} else{
				if(file_exists('filter/' . $class_name . '.php')){
					require_once('filter/' . $class_name . '.php');
				} else{
					if(file_exists('modal/' . $class_name . '.php')){
						require_once('modal/' . $class_name . '.php');
					} else{
						if(file_exists('controller/' . $class_name . '.php')){
							require_once('controller/' . $class_name . '.php');
						} else{
							if(file_exists('../'.$class_name . '.php')){
								require_once($class_name . '.php');
							} else{
								if(file_exists('../business/' . $class_name . '.php')){
									require_once('../business/' . $class_name . '.php');
								} else{
									if(file_exists('../dao/' . $class_name . '.php')){
										require_once('../dao/' . $class_name . '.php');
									} else{
										if(file_exists('../filter/' . $class_name . '.php')){
											require_once('../filter/' . $class_name . '.php');
										} else{
											if(file_exists('../modal/' . $class_name . '.php')){
												require_once('../modal/' . $class_name . '.php');
											} else{
												if(file_exists('../controller/' . $class_name . '.php')){
													require_once('../controller/' . $class_name . '.php');
												} else{
													error_reporting(0);
													$return = new httpResponse();
													$return->get_NotImplemented();
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
}