<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Midtrans\Config;
use Midtrans\Snap;

class Pembayaran extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper('url');
        
        // Debugging path
        if (!file_exists(FCPATH . 'vendor/autoload.php')) {
            show_error('Autoload file not found at ' . FCPATH . 'vendor/autoload.php');
        }

        // Load Composer autoload
        require_once FCPATH . 'vendor/autoload.php';
    }

    public function index()
    {
        // Set your Merchant Server Key
        Config::$serverKey = 'SB-Mid-server-dVl9d44cDu4UY9KrFEZQK3Jy';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = false;
        // Set sanitization on (default)
        Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            )
        );

        $data = [
            'snapToken' => Snap::getSnapToken($params)
        ];

        return $this->load->view('snap', $data);
    }
}
