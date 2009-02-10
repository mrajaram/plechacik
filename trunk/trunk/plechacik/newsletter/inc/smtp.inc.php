<?php
/** File: smtp.inc.php
  * Author: Red <red@raven.ch>
  * Created: 26.10.2001
  *
  * Description:
  * This files defines a class 'smtp' which provides the methodes needed to
  * connect to an smtp server an send some mails. Some parts may be inspired by
  * the smtp-script of squirrelmail <http://www.squirrelmail.org/>
  */

	class smtp {
		// some privat member variables
		var $_smtpHost;
		var $_smtpPort = 25;
		var $_from;
		var $_to;
		var $_cc;
		var $_bcc;
		var $_subject;
		var $_body;
		var $_header;
		var $_additionalHeaders;
		var $_errors;
		
		// the constructor to be called like this:
		// new smtp($smtpHost, $from,$to, $cc, $bcc, $subject, $body, $additionalHeaders)
		function smtp($smtpHost, $from, $to, $cc, $bcc, $subject, $body, $additionalHeaders=false) {
			$this->setSmtpHost($smtpHost);
			$this->setFrom($from);
			$this->setTo($to);
			$this->setCC($cc);
			$this->setBcc($cc);
			$this->setSubject($subject);
			$this->setBody($body);
			$this->setAdditionalHeaders($additionalHeaders);
		}
		
		// public getter- and setter-methods for the properties
		function setSmtpHost($smtpHost) { $this->_smtpHost = $smtpHost; }
		function getSmtpHost() { return $this->_smtpHost; }
		
		function setFrom($from) { $this->_from = $from; }
		function getFrom() { return $this->_from; }
		
		function setTo($to) { $this->_to = $this->_parseAddress($to); }
		function getTo() { return $this->_to; }
		
		function setCc($cc) { $this->_cc = $this->_parseAddress($cc); }
		function getCc() { return $this->_cc; }
		
		function setBcc($bcc) { $this->_bcc = $this->_parseAddress($bcc); }
		function getBcc() { return $this->_bcc; }

		function setAdditionalHeaders($additionalHeaders) { $this->_additionalHeaders = $additionalHeaders; }
		function setSubject($subject) { $this->_subject = $subject; }
		function setBody($body) { $this->_body = $body; }
		
		// private getter- and setter-methods for the properties
		function _setHeader($header) { $this->_header = $header; }
		
		function _addError($error) { $this->_errors[] = $error; }
		
		// private methods
		function _parseAddress($address) {
			if(!isset($address)) return false;
			if(is_array($address)) {
				foreach($address as $item) {
					$return = array_merge($return,$this->_parseAddress($item));
				}
			} else {
				$address = str_replace(" ","",$address);
				$address = str_replace(";",",",$address);
				$return = explode(",",$address);
			}
			return $return;
		}
		
		function _errorCheck($tmp,$smtpConnection,$DEBUG=false) {
			if($DEBUG) echo $tmp."\n<br>";
		}
		
		// public methods
		function send($DEBUG=false) {
			global $SERVER_NAME;
			
			// we open the connection to the smtp server
			if($DEBUG) echo "--> connecting to smtp-host '{$this->_smtpHost}' on port '{$this->_smtpPort}'\n<br>";
			$smtpConnection = fsockopen($this->_smtpHost, $this->_smtpPort, $errorNumber, $errorString);
			
			// check if there was an error and write the error to
			// _error
			if (!$smtpConnection) {
				if($DEBUG) echo 'Error connecting to SMTP Server.<br>'."$errorNumber : $errorString\n<br>";
				$this->_addError('Error connecting to SMTP Server.<br>'."$errorNumber : $errorString<br>");
				return false;
			}
			
			// who's there
			$tmp = fgets($smtpConnection, 1024);
			$this->_errorCheck($tmp,$smtpConnection,$DEBUG);
			
			// Lets introduce ourselves
			if($DEBUG) echo "--> HELO $SERVER_NAME\r\n<br>";
			fputs($smtpConnection, "HELO $SERVER_NAME\r\n");
			$tmp = fgets($smtpConnection, 1024);
			$this->_errorCheck($tmp,$smtpConnection,$DEBUG);
			
			// Ok, who is sending the message?
			if($DEBUG) echo nl2br(htmlentities("--> MAIL FROM:<{$this->_from}>\r\n"));
			fputs($smtpConnection, "MAIL FROM:<{$this->_from}>\r\n");
			$tmp = fgets($smtpConnection, 1024);
			$this->_errorCheck($tmp,$smtpConnection,$DEBUG);
			
			// send who the recipients are
			if(is_array($this->_to)) foreach($this->_to as $to) {
				if($DEBUG) echo nl2br(htmlentities("--> RCPT TO:<$to>\r\n"));
				if($to) { 
					fputs($smtpConnection, "RCPT TO:<$to>\r\n");
					$tmp = fgets($smtpConnection, 1024);
					$this->_errorCheck($tmp,$smtpConnection,$DEBUG);
				}
			}
			if(is_array($this->_cc))foreach($this->_cc as $to) {
				if($DEBUG) echo nl2br(htmlentities("--> RCPT TO:<$to>\r\n"));
				if($to) {
					fputs($smtpConnection, "RCPT TO:<$to>\r\n");
					$tmp = fgets($smtpConnection, 1024);
					$this->_errorCheck($tmp,$smtpConnection,$DEBUG);
				}
			}
			if(is_array($this->_bcc))foreach($this->_cc as $to) {
				if($DEBUG) echo nl2br(htmlentities("--> RCPT TO:<$to>\r\n"));
				if($to) {
					fputs($smtpConnection, "RCPT TO:<$to>\r\n");
					$tmp = fgets($smtpConnection, 1024);
					$this->_errorCheck($tmp,$smtpConnection,$DEBUG);
				}
			}
			
			// Lets start sending the actual message
			if($DEBUG) echo nl2br(htmlentities("--> DATA\r\n"));
			fputs($smtpConnection, "DATA\r\n");
			$tmp = fgets($smtpConnection, 1024);
			$this->_errorCheck($tmp,$smtpConnection,$DEBUG);
			
			// Send the message
			$this->_writeHeader($smtpConnection,$DEBUG);
			$this->_writeBody($smtpConnection,$DEBUG);
			
			fputs($smtpConnection, ".\r\n"); // end the DATA part
			$tmp = fgets($smtpConnection, 1024);
			$num = $this->_errorCheck($tmp,$smtpConnection,$DEBUG);

			if ($num != 250)
			{
				$tmp = nl2br(htmlspecialchars($tmp));
				echo "ERROR<BR>Message not sent!<BR>Reason given: $tmp<BR></BODY></HTML>";
			}
			
			// close the connnection
			if($DEBUG) echo "--> disconnecting from smtp-host\n<br>";
			fclose($smtpConnection);
		}
		
		function _writeHeader($fp,$DEBUG=false) {
			global $SERVER_NAME;
			
			$message_id = time()."@$SERVER_NAME";
			// This creates an RFC 822 date 
			$date = date("D, j M Y H:i:s O", mktime());
			
			unset($more);
			if(is_array($this->_to)) foreach($this->_to as $item) {
				if($more) $to .= ",";
				$to .= "$item";
				$more = true;
			}
			
			$reply_to = $this->_reply_to?$this->_reply_to:$this->_from;
			$errors_to = $this->_errors_to?$this->_errors_to:$this->_from;
			
			$header .= "Message-ID: $message_id\r\n";
			$header .= "Date: $date\r\n";
			$header .= "Subject: {$this->_subject}\r\n";
			$header .= "From: {$this->_from}\r\n";
			$header .= "To: $to \r\n";    // Who it's TO
			
			// Insert headers from the additionalHeaders 
			if(is_array($this->additionalHeaders)) {
				reset($this->additionalHeaders);
				while(list($h_name, $h_val) = each($this->additionalHeaders)) {
					$header .= sprintf("%s: %s\r\n", $h_name, $h_val);
				}
			}
			
			
			unset($more);
			if(is_array($this->_cc)) foreach($this->_cc as $item) {
				if($more) $cc .= ",";
				$cc .= "$item";
				$more = true;
			}
			if ($cc) {
				$header .= "Cc: $cc\r\n"; // Who the CCs are
			}
			
			if ($reply_to != '')
				$header .= "Reply-To: $reply_to\r\n";
				
			if ($errors_to != '')
				$header .= "Errors-To: $errors_to\r\n";
				
			$header .= "\r\n"; // One blank line to separate header and body
			
			// Write the header
			if($DEBUG) echo nl2br(htmlentities($header));
			fputs ($fp, $header);
		}
		
		function _writeBody($fp,$DEBUG=false) {
			if($DEBUG) echo nl2br(htmlentities($this->_body));
			fputs ($fp, $this->_body);
			$postbody = "\r\n";
			if($DEBUG) echo nl2br(htmlentities($postbody));
			fputs ($fp, $postbody);
		}
		
		function _errorCheck($line,$smtpConnection,$DEBUG=false) {
			if($DEBUG) echo $line."\n<br>";
			
			// Read new lines on a multiline response
			$lines = $line;
			while(ereg("^[0-9]+-", $line)) {
				$line = fgets($smtpConnection, 1024);
				if($DEBUG) echo $line."\n<br>";
				$lines .= $line;
			}
			
			// Status:  0 = fatal
			//          5 = ok
			
			$err_num = substr($line, 0, strpos($line, " "));
			switch ($err_num) {
				case 500:   $message = 'Syntax error; command not recognized';
				            $status = 0;
				            break;
				case 501:   $message = 'Syntax error in parameters or arguments';
				            $status = 0;
				            break;
				case 502:   $message = 'Command not implemented';
				            $status = 0;
				            break;
				case 503:   $message = 'Bad sequence of commands';
				            $status = 0;
				            break;
				case 504:   $message = 'Command parameter not implemented';
				            $status = 0;
				            break;


				case 211:   $message = 'System status, or system help reply';
				            $status = 5;
				            break;
				case 214:   $message = 'Help message';
				            $status = 5;
				            break;


				case 220:   $message = 'Service ready';
				            $status = 5;
				            break;
				case 221:   $message = 'Service closing transmission channel';
				            $status = 5;
				            break;
				case 421:   $message = 'Service not available, closing chanel';
				            $status = 0;
				            break;


				case 250:   $message = 'Requested mail action okay, completed';
				            $status = 5;
				            break;
				case 251:   $message = 'User not local; will forward';
				            $status = 5;
				            break;
				case 450:   $message = 'Requested mail action not taken:  mailbox unavailable';
				            $status = 0;
				            break;
				case 550:   $message = 'Requested action not taken:  mailbox unavailable';
				            $status = 0;
				            break;
				case 451:   $message = 'Requested action aborted:  error in processing';
				            $status = 0;
				            break;
				case 551:   $message = 'User not local; please try forwarding';
				            $status = 0;
				            break;
				case 452:   $message = 'Requested action not taken:  insufficient system storage';
				            $status = 0;
				            break;
				case 552:   $message = 'Requested mail action aborted:  exceeding storage allocation';
				            $status = 0;
				            break;
				case 553:   $message = 'Requested action not taken: mailbox name not allowed';
				            $status = 0;
				            break;
				case 354:   $message = 'Start mail input; end with .';
				            $status = 5;
				            break;
				case 554:   $message = 'Transaction failed';
				            $status = 0;
				            break;
				default:    $message = 'Unknown response: '. nl2br(htmlspecialchars($lines));
				            $status = 0;
				            $error_num = '001';
				            break;
			}

			if ($status == 0) {
				echo '<TT>';
				echo "<br><b><font color=\"$color[1]\">ERROR</font></b><br><br>";
				echo "&nbsp;&nbsp;&nbsp;<B>Error Number: </B>$err_num<BR>";
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B>Reason: </B>$message<BR>";
				$lines = nl2br(htmlspecialchars($lines));
				echo "<B>Server Response: </B>$lines<BR>";
				echo '<BR>MAIL NOT SENT';
				echo '</TT></BODY></HTML>';
			}
			return $err_num;
		}
	}
	
	// wrapper to access the smtp class with more ease
	function sendSmtp($smtpHost,$from,$to, $cc, $bcc, $subject, $body, $additionalHeaders=false) {
		$smtpHandler = new smtp($smtpHost, $from, $to, $cc, $bcc, $subject, $body, $additionalHeaders);
		$smtpHandler->send();
	}
?>
