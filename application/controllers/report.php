<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends SB_Controller {

    function __construct()
    {
        parent::__construct();		
		if(!$this->session->userdata('logged_in')) redirect('user/login',301);			
    }

	public function index()
	{
		$ind=$_GET['m'];
		$this->data['content'] =  $this->load->view('laporan/'.$ind, NULL,true);	  
		$this->load->view('layouts/main',$this->data);
	}

	
	public function printpendapatan()
	{
		$tgl1 = $this->data['tgl1'] = $_REQUEST['tgl1'];
		$tgl2 = $this->data['tgl2'] = $_REQUEST['tgl2'];
		$sex = '';
		if(isset($_REQUEST['data'])){
			$dx = $this->data['dx'] = $_REQUEST['data'];
		}
		if(isset($_REQUEST['det'])){
			$det = $this->data['det'] = $_REQUEST['det'];
		}
		$bln = $this->data['bln'] = $_REQUEST['bln'];
		$thn = $this->data['thn'] = $_REQUEST['thn'];
		$rjns = $this->data['rjns'] = $_REQUEST['rjns'];

		$wh = ' WHERE 0=0 '; 
		if($rjns == 1) {
			$wh .= " AND date(a.tgl) between '$tgl1' and '$tgl2'";
			$this->data['title'] = 	"PERIODE ".SiteHelpers::datereport($tgl1)." s/d ".SiteHelpers::datereport($tgl2);	
		}
		if($rjns == 2) {
			$wh .= " AND MONTH(a.tgl) = '$bln' and YEAR(a.tgl) = '$thn'";
			$this->data['title'] = 	"BULAN ".SiteHelpers::blnreport($bln)." TAHUN ".$thn;
		}
		if($rjns == 3) {
			$wh .= " AND  YEAR(a.tgl) = '$thn'";
			$this->data['title'] = 	"TAHUN ".$thn;
		}

			$result = $this->db->query('SELECT * FROM t_kunjungan a 
				inner join b_ms_pasien b on a.pasien_id=b.id
				inner join t_bayar c on c.kunjungan_id=a.id
			 '.$wh." ORDER BY tglact,no_antrian asc ")->result_array();

			$this->data['result'] = $result;
			$this->load->view('laporanprint/printpendapatan',$this->data);
        }

     public function printstok()
	{
		$html = '';
		$tgl1 = $this->data['tgl1'] = $_REQUEST['tgl1'];
		$wh = " AND date(a.tgl) <='$tgl1'";
		$this->data['title'] = 	"SAMPAI DENGAN ".SiteHelpers::datereport($tgl1);	
		

		$qw2 = $this->db->query('SELECT count(id) as ttl FROM b_ms_barang  ')->row();

		$ttl = 0;$row = 0;
        if($qw2){
        	$ttl = $qw2->ttl;
        }
        $row = ceil($ttl/40);
        for ($i=0; $i < $row ; $i++) { 
        	# code...
        	$this->data['start'] = $start = $i*40;
        	$end = ($i*40)+40;
        	$this->data['pages'] = $i+1;
        	$this->data['_this'] = $this;
        	$this->data['ttlx'] = $row;
        	//var_dump($this->data['ttl']);die();
        	//echo $start.' - '.$end.'<br />';
			$result = $this->db->query("SELECT *,(SELECT IFNULL((SUM(qty_in)-SUM(qty_out)),0) AS stok FROM t_stok WHERE fk_barang=a.id AND DATE(tgl_act)<= '".$tgl1."') as stok FROM b_ms_barang a LIMIT $start,40")->result_array();

			$this->data['result'] = $result;
			$html .= $this->load->view('laporanprint/printstok',$this->data,true);
        }
        echo $html;

	}

	public function printpembelian()
	{
		$tgl1 = $this->data['tgl1'] = $_REQUEST['tgl1'];
		$tgl2 = $this->data['tgl2'] = $_REQUEST['tgl2'];
		$wh = 'WHERE 0=0';
		if(isset($_REQUEST['sup']) && $_REQUEST['sup'] != ''){
			$sup = $this->data['sup'] = $_REQUEST['sup'];
			$wh .= " AND t_a_beli.supid=$sup";
		}
		if(isset($_REQUEST['jns']) && $_REQUEST['jns'] != 0){
			$jns = $this->data['jns'] = $_REQUEST['jns'];
			$wh .= " AND t_a_beli.jenis_bayar=$jns";
		}
		$bln = $this->data['bln'] = $_REQUEST['bln'];
		$thn = $this->data['thn'] = $_REQUEST['thn'];
		$rjns = $this->data['rjns'] = $_REQUEST['rjns'];

		//$wh = '  '; 
		if($rjns == 1) {
			$wh .= " AND date(t_a_beli.tgl) between '$tgl1' and '$tgl2'";
			$this->data['title'] = 	"PERIODE ".SiteHelpers::datereport($tgl1)." s/d ".SiteHelpers::datereport($tgl2);	
		}
		if($rjns == 2) {
			$wh .= " AND MONTH(t_a_beli.tgl) = '$bln' and YEAR(t_a_beli.tgl) = '$thn'";
			$this->data['title'] = 	"BULAN ".SiteHelpers::blnreport($bln)." TAHUN ".$thn;
		}
		if($rjns == 3) {
			$wh .= " AND  YEAR(t_a_beli.tgl) = '$thn'";
			$this->data['title'] = 	"TAHUN ".$thn;
		}

			$result = $this->db->query("SELECT t_a_beli.*,b_ms_suplier.supnama,
		IF(jenis_bayar=1,'TUNAI',IF(jenis_bayar=2,'KREDIT','KONSINYASI')) AS jenis_bayar,
		t_retur_beli.no_retur,t_retur_beli.tgl_retur,t_retur_beli.sub_total_retur,t_retur_beli.ppn_retur
		,t_retur_beli.total_retur
 FROM t_a_beli 
 INNER JOIN b_ms_suplier ON t_a_beli.supid=b_ms_suplier.id
 LEFT JOIN t_retur_beli ON t_retur_beli.id_pembelian=t_a_beli.id

				 $wh")->result_array();

			$this->data['result'] = $result;
			$this->load->view('laporanprint/printpembelian',$this->data);
        }

        public function printpenjualan()
	{
		$tgl1 = $this->data['tgl1'] = $_REQUEST['tgl1'];
		$tgl2 = $this->data['tgl2'] = $_REQUEST['tgl2'];
		$wh = 'WHERE 0=0';
		if(isset($_REQUEST['sup']) && $_REQUEST['sup'] != ''){
			$sup = $this->data['sup'] = $_REQUEST['sup'];
			$wh .= " AND t_a_jual.pelanggan=$sup";
		}
		if(isset($_REQUEST['jns']) && $_REQUEST['jns'] != 0){
			$jns = $this->data['jns'] = $_REQUEST['jns'];
			$wh .= " AND t_a_jual.jenis_bayar=$jns";
		}
		$bln = $this->data['bln'] = $_REQUEST['bln'];
		$thn = $this->data['thn'] = $_REQUEST['thn'];
		$rjns = $this->data['rjns'] = $_REQUEST['rjns'];

		//$wh = '  '; 
		if($rjns == 1) {
			$wh .= " AND date(t_a_jual.tgl) between '$tgl1' and '$tgl2'";
			$this->data['title'] = 	"PERIODE ".SiteHelpers::datereport($tgl1)." s/d ".SiteHelpers::datereport($tgl2);	
		}
		if($rjns == 2) {
			$wh .= " AND MONTH(t_a_jual.tgl) = '$bln' and YEAR(t_a_jual.tgl) = '$thn'";
			$this->data['title'] = 	"BULAN ".SiteHelpers::blnreport($bln)." TAHUN ".$thn;
		}
		if($rjns == 3) {
			$wh .= " AND  YEAR(t_a_jual.tgl) = '$thn'";
			$this->data['title'] = 	"TAHUN ".$thn;
		}

			$result = $this->db->query("SELECT t_a_jual.*,b_ms_pelanggan.nama,
		IF(jenis_bayar=1,'TUNAI',IF(jenis_bayar=2,'KREDIT','KONSINYASI')) AS jenis_bayar,
		t_retur_jual.no_retur,t_retur_jual.tgl_retur,t_retur_jual.sub_total_retur,t_retur_jual.ppn_retur
		,t_retur_jual.total_retur
 FROM t_a_jual 
 left JOIN b_ms_pelanggan ON t_a_jual.pelanggan=b_ms_pelanggan.id
 LEFT JOIN t_retur_jual ON t_retur_jual.id_penjualan=t_a_jual.id

				 $wh")->result_array();

			$this->data['result'] = $result;
			$this->load->view('laporanprint/printpenjualan',$this->data);
        }

        

       
		
		
		function printkartustok(){
        	$wh = ' WHERE 0=0 '; 
		$tgl1 = $this->data['tgl1'] = $_REQUEST['tgl1'];
		$tgl2 = $this->data['tgl2'] = $_REQUEST['tgl2'];
		$whd = 0;
		$this->data['title'] = '';$obat=0;
		if(isset($_REQUEST['obat']) && $_REQUEST['obat'] != ''){
			$obat = $this->data['dx'] = $_REQUEST['obat'];
			$wh .= " AND  a.fk_barang = $obat";
			$ob = $this->db->query("SELECT * FROM b_ms_barang WHERE id=$obat")->row();
			$this->data['title'] .= ' '.strtoupper($ob->nama).'<br />';
			$whd = 1;
		}
		//if(isset($_REQUEST['det'])){
			$det = $this->data['det'] = $whd;
		//}
		$bln = $this->data['bln'] = $_REQUEST['bln'];
		$thn = $this->data['thn'] = $_REQUEST['thn'];
		$rjns = $this->data['rjns'] = $_REQUEST['rjns'];

		if($rjns == 1) {
			$wh .= " AND date(a.tgl_act) between '$tgl1' and '$tgl2'";
			$this->data['title'] .= 	"PERIODE ".SiteHelpers::datereport($tgl1)." s/d ".SiteHelpers::datereport($tgl2);	
		}
		if($rjns == 2) {
			$wh .= " AND MONTH(a.tgl_act) = '$bln' and YEAR(a.tgl_act) = '$thn'";
			$this->data['title'] .= 	"BULAN ".SiteHelpers::blnreport($bln)." TAHUN ".$thn;
		}
		if($rjns == 3) {
			$wh .= " AND  YEAR(a.tgl_act) = '$thn'";
			$this->data['title'] .= 	"TAHUN ".$thn;
		}

		if($whd == 1){
			$awal = $this->db->query('SELECT (sum(qty_in)-sum(qty_out)) as stok from t_stok where date(tgl_act) < "'.$tgl1.'" AND fk_barang="'.$obat.'"')->row();
			$result = $this->db->query("SELECT b.nama,DATE_FORMAT(a.tgl_act,'%d %M %Y %H:%i:%s') as tgl,a.jenis,a.user_act,a.no_bukti,a.qty_in,a.qty_out FROM t_stok a 
INNER JOIN b_ms_barang b ON a.fk_barang=b.id $wh ORDER BY tgl_act ASC")->result_array();
		}else{
			$result = $this->db->query("SELECT b.nama,a.tgl_act,a.jenis,a.user_act,a.no_bukti,a.qty_in,a.qty_out FROM t_stok a 
INNER JOIN b_ms_barang b ON a.fk_barang=b.id $wh ORDER BY tgl_act ASC")->result_array();
		}

			$this->data['result'] = $result;$this->data['awal'] = $awal;
			$this->load->view('laporanprint/printkartustok',$this->data);
        }


	

	
	
}
