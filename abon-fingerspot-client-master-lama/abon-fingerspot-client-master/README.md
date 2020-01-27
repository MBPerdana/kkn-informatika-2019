# Fingerspot API Client

Dibuat untuk menyambungkan mesin fingerspot ke host [absensi pintar](absensipintar.com) 


# How it works?

Dengan menggunakan API dari Fingerspot yaitu [**Easy Link SDK**](https://fingerspot.com/product/fingerprint-sdk-easylink) ,  bisa menghubungkan sistem yang dibuat dengan mesin fingerspot tersebut dengan beberapa bahasa pemograman, salah satunya adalah bahasa PHP.

Dengan ini kita bisa mengambil data dari database mesin Fingerspot tersebut dan mengirimnya ke sistem kita.

## How to use

1. Siapkan url dari easy link sdk untuk mengambil data scan di file *config.php*

> $config  = 
> [ 'sdk_url' =>
> 'http://169.254.186.129:8080/', 	
> ...
> ];

2. Siapkan  url host di file *config.php*

> $config  = 
> [ '
	>host_url' => 'localhost:8000/',
	> ......
> ];

3. Masukan ID Sekolah sesuai client sekolah di *config.php*

> $config =
>  [   	'sekolah' => 1,
>     ..... 
>     ];


Done.


### Option :
Beberapa option yang tersedia di file *config.php*

	'debug' => true, //untuk mengeluarkan pesan debug 
	'delete_scans_after_save' => true, //menghapus seluruh data scan setelah dihapus
	

