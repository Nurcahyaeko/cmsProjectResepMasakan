<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tabel_masakan extends MY_Controller{
  //  function getdata($from,$where=null,$limit=9,$offset=0){
  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Dbs'));
  }


function getdata(){
  header('Content-Type: application/json');


  ///JIKA PAKE query

  if(isset($_GET['jenis_makanan'])){
    $jenis_makanan = $_GET['jenis_makanan'];
    $loadDb = $this->db->query("SELECT * FROM tabel_masakan where jenis_makanan = '$jenis_makanan' ORDER BY nama_masakan ASC");
  } else{
        $loadDb = $this->db->query("SELECT * FROM tabel_masakan ORDER BY nama_masakan ASC");
  }

  //if(isset($_GET['params'])){//params yang akan dicek
    //StartPagination
    // if(isset($_GET['page'])){//cek parameter page
    //   $page=$_GET['page'];
    // }else{
    //   $page=1;//default jika parameter page tidak diload
    // }
    // $limitDb=9;
    // $offsetDb=0;
    // if($page!=1 and $page!=0){
    //   $offsetDb=$limitDb*($page-1);
    // }
    //End Pagination
    //default fungsi dari : getdata($table,$where=null,$limit=9,$offset=0){
///////////////////
///// load pake koding php:
    //$table='tabel_masakan';
    //$loadDb=$this->Dbs->getdata($table,null,100);//database yang akan di load
///////////////////
    $check=$loadDb->num_rows();
    if($check>0){
      $get=$loadDb->result(); //Uncomment ini untuk contoh
      $data=array(
        'status'=>'success',
        'message'=>'found',
        'total_result'=>$check,
        // 'results'=>"ISI DARI RESULT DATABASE",
        'results'=>$get //Uncomment ini untuk contoh
      );
    }else{
      $data=array(
        'status'=>'success',
        'total_result'=>$check,
        'message'=>'not found'
      );
    }
  // }else{
  //   $data=array(
  //     'status'=>'failed',
  //     'message'=>'parameter is invalid'
  //   );
  // }
  $json=json_encode($data,JSON_PRETTY_PRINT);
  echo $json;
}

}
