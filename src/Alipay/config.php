<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2021002141653493",

		//商户私钥
		'merchant_private_key' => "MIIEowIBAAKCAQEAirLLmTZtXxuIXAf4018B6z02ebK9XQgzuCtdCr+qMDvofO2hiYA5kpt2hxX0MxA09L3GOPRdnnb69nhjTqj+wtTt8TRLiTouWB1IOdzSbzhyRJXuFfVB6vb88yjnRT3iFOfkoSRC4n/5v91R5/1coTUtCa7I3xHFIELdKZjLnEYpwnjvTGS6lBoOJt9/EIc/5uYo28XHvdd0SpzJXFmqIb2J3rMeLn6GLHsJJ34beYOZeyIH69DfnGH7GWFwvRly+RcFPpF9zcCrQGpddjeDeS0LxT5lhEVxsCy2F92sRvi/EYCrF8m2uUORJrIeR2JexafQ/DCFJMuPZXI0A8RzPwIDAQABAoIBAGGxwrsunSdKq2e3rcqktyNNQJvEDKIE7vkggi7aBjRnXkDw2MGTcfoUSw6nphR5q/Nf4MmpRnAh+m+1KK31V01A0kD9xt7n/lDOf1tScV8p8ULiIIuS71Vjl5RnEU+yYRa8qEvg0MPdxLsiV1kDG0XpwMl7Nb36NFGfB00PdQujRNeB0rVyO6XkbnnxQNgskqVp3zhO/Im3Es1gyjH5pekCcC1iZXO2lt3vpWwN84q/+d+JRbpb4dKlWCFeEM994tGthPwO8t7u5J4M7oAvM3DRs3KldO+zfM8iKM9L957fvyQhCIha2sro1jKZ1cdSh++8dNVbhO4C6yV0NITUTJECgYEA92hLaF9iuHqvYKQ9OfybXfSkfQ+5iIUqmsS4i9fAHm0WbMiOkGiI3RM6C13DhOtOIplBzGYAUB9x+Wj0wET0Dmkyapx8Graa0MB3j+FNzcPPMKEdEK9p0Kklx2MmyZCMCXnqrpmnioMwK+NVnp3yzoVSsbksvKo+cKWhjs5w+OUCgYEAj4P3aTonetmyQmvGqtgnOl3oEkqcQK56lKpOitqXknTooocdyI6UhOHk299LQVB87wmy3J2pzmU3uu7vOQSGlbXbXHq7UekZCM0Ru9zR6Of4YSrYt+0t0DIUE3c7CMMu6HrkO3Y6jmeLm9ulTOPljsCipc0ZtYxgPO1FZK8drVMCgYAPgB9JWMCMolMekOutGGB7kHpFw5hyLzWuIKkXSdsljNwc0Kvt7D626x912tgHGd75V/TBY5qdanrvj13WNfu8c2bPOyKjYdFtRsG25/zB6YSvnUh+5R6SDibpyRKDCmVbqqHDcqkGipWYClQw7eBqg/vcWqes4lWrJRVsJw746QKBgEYpBsALrRdS6+Gq3MHS0EKpe/XNQdwhME4TgDhDqwvvWXdzRK0yfwsDgCW5YQn6NkmJ3UYbUdNUCk2513txafYwpJ/uZDskEJgL4NqNlpUdKoEeODqameYJRWVKybJ78Se4RHGJWBEcL9UvKP2RAD2skRcrUKE/kiDXAjC5p3F/AoGBAN2AS0feCZBnkywiFqxq/7pneuB6005i+IhKU9MuKOoWLIRKSKmOnNgVWgJ6xaweIRiQ/8I1MohEZYqUU9Mu/T6xqMU450i5hMZS1NRx4wxistCRc9WEgUYM6wvgX98EyOL0fpL0+fcW9WhYhxwiIF9+EnBhIZZvERg1Bdyyzv7U",
		
		//异步通知地址
		'notify_url' => "http://zf1.kaifa1.cc/alipay.trade.page.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://zf1.kaifa1.cc/alipay.trade.page.pay-PHP-UTF-8/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAirLLmTZtXxuIXAf4018B6z02ebK9XQgzuCtdCr+qMDvofO2hiYA5kpt2hxX0MxA09L3GOPRdnnb69nhjTqj+wtTt8TRLiTouWB1IOdzSbzhyRJXuFfVB6vb88yjnRT3iFOfkoSRC4n/5v91R5/1coTUtCa7I3xHFIELdKZjLnEYpwnjvTGS6lBoOJt9/EIc/5uYo28XHvdd0SpzJXFmqIb2J3rMeLn6GLHsJJ34beYOZeyIH69DfnGH7GWFwvRly+RcFPpF9zcCrQGpddjeDeS0LxT5lhEVxsCy2F92sRvi/EYCrF8m2uUORJrIeR2JexafQ/DCFJMuPZXI0A8RzPwIDAQAB",

        //日志路径
        'log_path' => "",
);