<?php
namespace GatherPay\Alipay\lotusphp_runtime\Session;

Interface LtSessionStore
{
    public function open($save_path, $name);
    public function close();
    public function read($id);
    public function write($id, $data);
    public function destroy($id);
    public function gc($maxlifetime=0);
}
