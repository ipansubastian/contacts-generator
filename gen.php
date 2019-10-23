<?php

	/*==================================================*/      
	/*  Deskripsi : Phone Number Generator              |/
	/|  Coder     : Zaid Harisah                        |/
	/|  Facebook  : fb.com/zaidhdev                     |/
	/|  Site      : https://zaidhdev.github.io          |/
	/|  Disusun   : Senin, 30 Sep 2019 16:56            |/
	/|   ______   _                                     |/
	/|  |__  / | | | *** /                              |/
	/|    / /| |_| | ** /                               |/
	/|   / /_|  _  | * /                                |/
	/|  /____|_| |_|  / github.com/zaidhdev             |/
	/|                                                  */
	/*==================================================*/

echo<<<end
\n\n
\e[32m        \_____\e[1m__/\e[0m
\e[32m    `.,-'\__\e[1m___/`-.,'\e[0m
\e[32m     /`..'\ _ /\e[1m`.,'\	      --Phone Number Generator v 1.1\e[0m
\e[32m    /  /`.,' \e[1m`.,'\  \		Coded by : Zaid Harisah
\e[32m   \e[0;32m/__/__\e[1m/     \__\__\__	Github   : https://github.com/zaid-dev/
\e[32m   \  \  \     \e[1m/  /  /		Site     : https://zaid-dev.github.io
\e[32m    \  \,'`._,'`.\e[1m/  /		Fakebook : https://fb.com/kurotaka.id
\e[32m     \,\e[1m'`./___\,'`./\e[0m
\e[32m    ,'`-./\e[1m_____\,-'`.\e[32m
\e[32m        /\e[1m       \ \e[32m	   \n
____________________________________ \n\n\n
\e[0m
end;
echo<<<end
\t\e[36;1mPilih Mode!\n\e[0m
\t\e[33;1m1.Tanpa kode negara\n
\t\e[33;1m2.Dengan Kode negara\n
\t\e[31m0.Cancel\n\e[0m
end;
echo "\n\tPilih : ";
$ntype=(string)trim(fgets(STDIN));
//echo "";
if (($ntype!="1") AND ($ntype!="2") AND ($ntype!="0")){
	die("\tInput tidak valid!\n\tQuitting...\n\n");
}
elseif ($ntype=="2"){
	$ccfrm=True;
	while ($ccfrm){
		echo "\n\tKode Negara : ";
		$cc=trim(trim(fgets(STDIN)),"+");
		echo "\n";
		if (!is_numeric($cc)){
			echo "\t\e[31m[Peringatan] : Input harus berupa angka!\n\e[0m";
		}
		elseif(strlen($cc)>3){
			echo "\t\e[31m[Peringatan] : Kode harus kurang dari 3 digit!\n\e[0m";
		}
		else{
			$ccfrm=False;
		}
	}
}
elseif ($ntype==="0"){
	die("\tQuitting...\n\n");
}
echo<<<end
\n\n\t\e[36;1mPilih Nama Provider! \e[0m\n
\t\e[31;1m1.Tsel LOOP\n\e[0m
\t\e[33;1m2.Indosat IM3\n\e[0m
\t\e[37;1m3.Lainnya\n\e[0m
\t\e[31;1m0.Cancel\n\e[0m
end;
echo "\n\tPilih : ";
$stdin=(string)trim(fgets(STDIN));
echo "\n";
if ($stdin!="1" AND $stdin!="2" AND $stdin!="3" AND $stdin!="0"){
	die("\tInput tidak valid!\n");
}
elseif($stdin=="1"){
	$rsltpesan="Ok! tunggu... \n\n";
	echo "\t[Notif]\t     : $rsltpesan";
	$pron="tsel";
	$_4digit="0822";

}
elseif($stdin=="2"){
	$rsltpesan="Ok! tunggu... \n\n";
	echo "\t[Notif]\t     : $rsltpesan";
	$pron="im3";
	$_4digit="0857";

}
elseif($stdin=="0"){
	die("\tQuitting...\n\n");
}
else{
	$cekdigit=True;
	while($cekdigit==True){
		echo "\t4 digit angka pertama : ";
		$stdin=trim(fgets(STDIN));
		echo "\n";
			if(!is_numeric($stdin)){
				echo "\t\e[31m[Peringatan] : Input tidak valid!\n\n\e[0m";
			}
			elseif (strlen($stdin)!=4){
				echo "\t\e[31m[Peringatan] : Angka harus 4 digit!\n\n\e[0m";
				//echo $dgpesan;
			}
			else{
				$rsltpesan="Ok! tunggu... \n\n";
				echo "\t[Notif]\t     : $rsltpesan";
				$pron="oth";
				$_4digit=$stdin;
				$cekdigit=False;
			}
	}
}

if ($ntype=="2"){
	$cc=trim(trim($cc),"+");
	$_4digit="+".$cc.ltrim($_4digit,"0");
}

if ($rsltpesan=="Ok! tunggu... \n\n"){
	if (!is_dir("result")){
		mkdir("result");
	}
	$sessre=True;
	for($i=1;$i<=9;$i++){
		if (!isset($changenp)){
			$np=$pron."_".$i.".vcf";
		}
		if ($sessre==True AND is_file("result/$np")){
				echo<<<end
	\e[31m[Peringatan] : Berkas lawas ditemukan, timpa?\n\e[0m
			Y atau Enter (ya)
			A (semua)
			N atau lainnya (lewati)
			R (Ganti nama file)\n
end;
				//KOKOMADE
				echo "\tPilih : ";
				$stdin=trim(fgets(STDIN));
				echo "\n";
				if (strtolower(trim($stdin))=="y" OR trim($stdin)==""){
					$unlink=unlink("result/$np");
					echo "\t[Proses]     : Mengganti file 'result/$np'... ";
					if ($unlink){
						echo "berhasil\n\n";
						$spesan="Sesi dilanjutkan\n";
					}
					else{
						echo "gagal\n\n";
					}
					echo "\t[Notif]	     : $spesan";
				}
				elseif(strtolower($stdin)=="a"){
					$spesan="\tSesi dilanjutkan\n";
					echo "\n\t[Notif]      : Semua file akan ditimpa :)\n\n";
					$sessre=False;
					$rep_all=True;
				}
				elseif(strtolower($stdin)=="r"){
					$rename=True;
					while($rename){
						echo "\tMasukan nama baru : ";
						$stdin=trim(fgets(STDIN));
						if (!is_file("result/{$stdin}_{$i}.vcf")){
							echo "\n\t[Notif]	     : Nama file diganti!\n\n";
							$spesan="Sesi dilanjutkan\n";
							$changenp=True;
							$rep_all=True;
							$rename=False;
							$sessre=False;
							$renall=True;
						}
						else{
							echo "\t\e[31m[Peringatan] : Nama berkas sudah ada, harap pilih nama lain!\n\e[0m";
						}
					}
				}
				else{
					$spesan="\t[Notif]      : Sesi dilewati\n\n";
					echo $spesan;
				}
				
			}
			else{
				$spesan="Sesi dilanjutkan\n";
			}
			#ditandai
			if(isset($rep_all)){
				if (isset($renall)){
					$np=$stdin."_".$i.".vcf";
					//echo $np;
				}
				else{
					$unlink=unlink("result/$np");
						echo "\t[proses]     : Mengganti file result/$np... ";
						if ($unlink){
							echo "berhasil\n\n";
							$spesan="Sesi dilanjutkan\n";					
						}
						else{
							echo "gagal\n\n";
						}
					}
			}
		/*
		else{
			$spesan="Sesi dilanjutkan\n";
		}
		*/
		if ($spesan=="Sesi dilanjutkan\n"){
			echo "\t[proses]     : Memproses file $np.... ";
			$handle=fopen("result/$np","a+");
			#echo "\n$np\n";
			if (!$handle){
				echo "gagal\n\n";
				echo "\tGagal menghandle file 'result/$np'.\n";
			}
			else{
					#$s="{$i}0000000";
					#$e="{$i}9999999";
					$s="{$i}00";
					$e="{$i}99";
				for ($k=$s;$k<=$e;$k++){
					$vcard=<<<end
BEGIN:VCARD
VERSION:3.0
N:;;;
TEL;TYPE=CELL:$_4digit{$k}
END:VCARD

end;
					fwrite($handle,$vcard);
				}
				echo "berhasil\n\n";
			}
			if ($i==9){
				echo "\tSelesai!\n\n";
			}
		}
		//var_dump($np);
	}

}
/*
else{
	echo "\tGagal\n\n";
}
*/
?>
