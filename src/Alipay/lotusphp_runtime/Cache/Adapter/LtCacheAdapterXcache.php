<?php
namespace GatherPay\Alipay\lotusphp_runtime\Cache\Adapter;

class LtCacheAdapterXcache implements LtCacheAdapter
{
	public function connect($hostConf)
	{
		return true;
	}

	public function add($key, $value, $ttl = 0, $tableName, $connectionResource)
	{
		return xcache_set($this->getRealKey($tableName, $key), $value, $ttl);
	}

	protected function getRealKey($tableName, $key)
	{
		return $tableName . "-" . $key;
	}

	public function del($key, $tableName, $connectionResource)
	{
		return xcache_unset($this->getRealKey($tableName, $key));
	}

	public function get($key, $tableName, $connectionResource)
	{
		$key = $this->getRealKey($tableName, $key);
		if (xcache_isset($key))
		{
			return xcache_get($key);
		}
		return false;
	}

	public function update($key, $value, $ttl = 0, $tableName, $connectionResource)
	{
		$key = $this->getRealKey($tableName, $key);
		if (xcache_isset($key))
		{
			return xcache_set($key, $value, $ttl);
		}
		return false;
	}
}
