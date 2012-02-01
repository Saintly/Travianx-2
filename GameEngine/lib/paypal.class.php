<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class paypal_class
{

    public $last_error = NULL;
    public $ipn_log = NULL;
    public $ipn_log_file = NULL;
    public $ipn_response = NULL;
    public $ipn_data = array( );
    public $fields = array( );

    public function paypal_class( )
    {
        $this->paypal_url = "https://www.paypal.com/cgi-bin/webscr";
        $this->last_error = "";
        $this->ipn_log_file = LIB_PATH."ipn_log.txt";
        $this->ipn_log = TRUE;
        $this->ipn_response = "";
        $this->add_field( "rm", "2" );
        $this->add_field( "cmd", "_xclick" );
    }

    public function add_field( $field, $value )
    {
        $this->fields["{$field}"] = $value;
    }

    public function submit_paypal_post( )
    {
        echo "<form method=\"post\" name=\"payment\" action=\"".$this->paypal_url."\">\n";
        foreach ( $this->fields as $name => $value )
        {
            echo "<input type=\"hidden\" name=\"{$name}\" value=\"{$value}\">";
        }
        echo "</form>\n";
    }

    public function validate_ipn( )
    {
        $url_parsed = parse_url( $this->paypal_url );
        $post_string = "";
        foreach ( $_POST as $field => $value )
        {
            $this->ipn_data["{$field}"] = $value;
            $post_string .= $field."=".urlencode( $value )."&";
        }
        $post_string .= "cmd=_notify-validate";
        $fp = fsockopen( $url_parsed[host], "80", $err_num, $err_str, 30 );
        if ( !$fp )
        {
            $this->last_error = "fsockopen error no. {$errnum}: {$errstr}";
            $this->log_ipn_results( FALSE );
            return FALSE;
        }
        fputs( $fp, "POST {$url_parsed['path']} HTTP/1.1\r\n" );
        fputs( $fp, "Host: {$url_parsed['host']}\r\n" );
        fputs( $fp, "Content-type: application/x-www-form-urlencoded\r\n" );
        fputs( $fp, "Content-length: ".strlen( $post_string )."\r\n" );
        fputs( $fp, "Connection: close\r\n\r\n" );
        fputs( $fp, $post_string."\r\n\r\n" );
        while ( !feof( $fp ) )
        {
            $this->ipn_response .= fgets( $fp, 1024 );
        }
        fclose( $fp );
        if ( eregi( "VERIFIED", $this->ipn_response ) )
        {
            $this->log_ipn_results( TRUE );
            return TRUE;
        }
        $this->last_error = "IPN Validation Failed.";
        $this->log_ipn_results( FALSE );
        return FALSE;
    }

    public function log_ipn_results( $success )
    {
        if ( !$this->ipn_log )
        {
            return;
        }
        $text = "[".date( "m/d/Y g:i A" )."] - ";
        if ( $success )
        {
            $text .= "SUCCESS!\n";
        }
        else
        {
            $text .= "FAIL: ".$this->last_error."\n";
        }
        $text .= "IPN POST Vars from Paypal:\n";
        foreach ( $this->ipn_data as $key => $value )
        {
            $text .= "{$key}={$value}, ";
        }
        $text .= "\nIPN Response from Paypal Server:\n ".$this->ipn_response;
        $fp = fopen( $this->ipn_log_file, "a" );
        fwrite( $fp, $text."\n\n" );
        fclose( $fp );
    }

    public function dump_fields( )
    {
        echo "<h3>paypal_class->dump_fields() Output:</h3>";
        echo "<table width=\"95%\" border=\"1\" cellpadding=\"2\" cellspacing=\"0\">\r\n            <tr>\r\n               <td bgcolor=\"black\"><b><font color=\"white\">Field Name</font></b></td>\r\n               <td bgcolor=\"black\"><b><font color=\"white\">Value</font></b></td>\r\n            </tr>";
        ksort( $this->fields );
        foreach ( $this->fields as $key => $value )
        {
            echo "<tr><td>{$key}</td><td>".urldecode( $value )."&nbsp;</td></tr>";
        }
        echo "</table><br>";
    }

}

?>
