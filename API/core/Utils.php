<?php

/**
 * Utils class
 *
 * @author plamen
 */
class Utils {

	/**
	 * Sends an email message
	 * @param string $from
	 * @param string $to
	 * @param string $subject
	 * @param string $message
	 */
	public static function sendEmail($from, $to, $subject, $message){
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		$headers .= "From: $from \r\n";
		$headers .= "Reply-To: $from \r\n";
		$headers .= "Return-Path: $from\r\n";
		$headers .= "X-Mailer: PHP \r\n";

		return mail($to, $subject, $message, $headers);
	}
	

	/**
	 * Formats the date into javascript friendly format (from "2016-01-01 15:00:00" into "2016-01-01T15:00:00")
	 * @param string $input
	 * @return string
	 */
	public static function formatDate($input){
		return preg_replace("/\s/", "T", $input);
	}


}
