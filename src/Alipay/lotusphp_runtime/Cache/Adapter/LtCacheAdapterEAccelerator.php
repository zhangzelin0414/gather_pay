<?php
namespace GatherPay\Alipay\lotusphp_runtime\Cache\Adapter;

class LtCacheAdapterEAccelerator implements LtCacheAdapter
{
	public function connect($hostConf)
	{
		return true;
	}

	public function get($key, $tableName, $connectionResource)
	{
		$value = eaccelerator_get($this->getRealKey($tableName, $key));
		if (!empty($value))
		{
			return unserialize($value);
		}
		else
		{
			return false;
		}
	}

	protected function getRealKey($tableName, $key)
	{
		return $tableName . "-" . $key;
	}

	public function update($key, $value, $ttl = 0, $tableName, $connectionResource)
	{
		if ($this->del($key, $tableName, $connectionResource))
		{
			return $this->add($key, $value, $ttl, $tableName, $connectionResource);
		}
		else
		{
			return false;
		}
	}

	public function del($key, $tableName, $connectionResource)
	{
		return eaccelerator_rm($this->getRealKey($tableName, $key));
	}

	public function add($key, $value, $ttl=0, $tableName, $connectionResource)
	{
		$value = serialize($value); //eAccelerator doesn't serialize object
		return eaccelerator_put($this->getRealKey($tableName, $key), $value, $ttl);
	}
}