<?php
namespace GatherPay\Alipay\lotusphp_runtime\DB;
class LtDbAdapterFactory
{
	public function getConnectionAdapter($connectionAdapterType)
	{
		$LtDbConnectionAdapter = "LtDbConnectionAdapter" . ucfirst($connectionAdapterType);
		return new $LtDbConnectionAdapter;
	}

	public function getSqlAdapter($sqlAdapterType)
	{
		$LtDbSqlAdapter = "LtDbSqlAdapter" . ucfirst($sqlAdapterType);
		return new $LtDbSqlAdapter;
	}
}