<?php
use Postmark\PostmarkClient;


class TransactionEmailController extends \BaseController {

	/**
	 * Send contact us email
	 *
	 * @return boolean response
	 */
	public function sendContactUsEmail() {

		$postMarkKey = getenv("POSTMARK_API_KEY");

		if (empty($postMarkKey)) {
			return false;
		}
	
		$client = new PostmarkClient($postMarkKey);

		$input = Input::all();
		
		if (!empty($input['emailSigned']) && !empty($input['taxQuery'])) {
			
			try {
						
				$dateText = date('F j, Y, g:i a', strtotime('+5 hours 30 minutes')) . " IST";
						
				$sendResult = $client->sendEmail(
					"<from-email>",
					"<to-email>",
					"Contact Us email sent on " . $dateText,
					"From: ". $input['emailSigned'] .", Message: " . $input['taxQuery']);
					
					
				//Send an email thanking the visitor
				$sendResult = $client->sendEmail(
					"<from-email>",
					$input['emailSigned'],
                    "Thanks for sending us your query!",
                    "Thank you!"
					);
			}
			catch (Exception $e) {
				echo 'Caught exception: ',  $e->getMessage(), "\n";
				
				return false;
			}
		
		}
		else {
			return false;
		}
		return 'SEND';
	}
	
	
	/**
	 * Send Footer contact us email
	 *
	 * @return boolean response
	 */
	public function sendFooterContactUsEmail() {
	
		$postMarkKey = getenv("POSTMARK_API_KEY");

		if (empty($postMarkKey)) {
			return false;
		}
	
		$client = new PostmarkClient($postMarkKey);

		$input = Input::all();
		
		if (!empty($input['email']) && !empty($input['name']) && !empty($input['message'])) {
		
			try {
						
				$dateText = date('F j, Y, g:i a', strtotime('+5 hours 30 minutes')) . " IST";
						
				$sendResult = $client->sendEmail(
					"<from-email>",
					"<to-email>",
					"Contact Us email sent on " . $dateText,
					"Name: ". $input['name'] .", From: ". $input['email'] .", Message: " . $input['message']);
					
						
				//Send an email thanking the visitor
				$sendResult = $client->sendEmail(
					"<from-email>",
					$input['email'],
                    "Thanks for contacting Income Tax Query!",
                    "Thank You!"
					);
			}
			catch (Exception $e) {
				echo 'Caught exception: ',  $e->getMessage(), "\n";
				
				return false;
			}
		
		}
		else {
			return false;
		}
		return 'SEND';
	}
	
}
