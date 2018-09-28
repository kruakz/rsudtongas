<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo  CNF_APPNAME ;?></title>
<link rel="shortcut icon" href="<?php echo base_url();?>favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="<?php echo base_url();?>/adminlte/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url();?>/adminlte/bootstrap/css/font-awesome.min.css">
    <!-- Ionicons -->
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url();?>/adminlte/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>/adminlte/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins-->
    <link rel="stylesheet" href="<?php echo base_url();?>/adminlte/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>/adminlte/plugins/iCheck/all.css">
    <link rel="stylesheet" href="<?php echo base_url();?>/adminlte/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>/adminlte/plugins/datepicker/datepicker3.css">


    <link rel="stylesheet" href="<?php echo base_url();?>/adminlte/plugins/autocompletetable/tautocomplete.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->  

<script src="<?php echo base_url();?>/adminlte/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo base_url();?>sximo/js/plugins/jquery.cookie.js"></script>
<script src="<?php echo base_url();?>/adminlte/plugins/jQueryUI/jquery-ui.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url();?>/adminlte/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url();?>/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url();?>/adminlte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>/adminlte/plugins/fastclick/fastclick.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url();?>/adminlte/plugins/select2/select2.full.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="<?php echo base_url();?>/adminlte/plugins/iCheck/icheck.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>/adminlte/dist/js/app.min.js"></script>

    <script src="<?php echo base_url();?>sximo/js/plugins/jquery.jCombo.min.js"></script>
    <script src="<?php echo base_url();?>/adminlte/plugins/autocompletetable/tautocomplete.js"></script>
    <script src="<?php echo base_url();?>/adminlte/plugins/input-mask/jquery.number.js"></script>

    <!-- datepicker -->
    <script src="<?php echo base_url();?>/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>sximo/js/plugins/parsley.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>sximo/js/plugins/bootstrap/maskmoney.js"></script>

<style type="text/css">
.number{
  text-align: right;
}
</style>
</head>

<body>

<body class="hold-transition skin-blue sidebar-mini">
<div id="wrapper">
    <?php $this->load->view('layouts/headmenu');?>
    <?php $this->load->view('layouts/sidemenu');?>
    
     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        

        <!-- Main content -->
       
            <?php echo $content ;?>  
            
      </div>

 
 </div>

<div class="modal fade" id="sximo-modal"  role="dialog">
<div class="modal-dialog" id="modal-dial">
  <div class="modal-content">
  <div class="modal-header bg-default">
    
    <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Modal title</h4>
  </div>
  <div class="modal-body" id="sximo-modal-content">

  </div>

  </div>
</div>
</div>

<script type="text/javascript">

$(document).on({
    ajaxStart: function() { ajaxindicatorstart('loading data.. please wait..');    },
     ajaxStop: function() {ajaxindicatorstop(); }    
});

function ajaxindicatorstart(text)
{
  if(jQuery('body').find('#resultLoading').attr('id') != 'resultLoading'){
  jQuery('body').append('<div id="resultLoading" style="display:none"><div><img src="<?php echo base_url().'uploads/ajax-loader.gif'?>"><div>'+text+'</div></div><div class="bg"></div></div>');
  }

  jQuery('#resultLoading').css({
    'width':'100%',
    'height':'100%',
    'position':'fixed',
    'z-index':'10000000',
    'top':'0',
    'left':'0',
    'right':'0',
    'bottom':'0',
    'margin':'auto'
  });

  jQuery('#resultLoading .bg').css({
    'background':'#000000',
    'opacity':'0.7',
    'width':'100%',
    'height':'100%',
    'position':'absolute',
    'top':'0'
  });

  jQuery('#resultLoading>div:first').css({
    'width': '250px',
    'height':'75px',
    'text-align': 'center',
    'position': 'fixed',
    'top':'0',
    'left':'0',
    'right':'0',
    'bottom':'0',
    'margin':'auto',
    'font-size':'16px',
    'z-index':'10',
    'color':'#ffffff'

  });

    jQuery('#resultLoading .bg').height('100%');
       jQuery('#resultLoading').fadeIn(300);
    jQuery('body').css('cursor', 'wait');
}

function ajaxindicatorstop()
{
    jQuery('#resultLoading .bg').height('100%');
       jQuery('#resultLoading').fadeOut(300);
    jQuery('body').css('cursor', 'default');
}

var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };

  function ConfirmDelete( url,id )
  {
    if(confirm('Apakah anda yakin menghapus data ini ? '))
    {
      $.ajax({
      url: url,
      data:{id:id},
      type: "POST",
      success: function(data) {
        alert("Data berhasil dihapus !!");
        table.ajax.reload( null, false );
        //window.location.reload();
      }
      });
    }
    return false;
  }

  function SximoConfirmDelete( url )
{
  if(confirm('Are u sure deleting this record ? '))
  {
    window.location.href = url; 
  }
  return false;
}
   
  function SximoModal( url , title , wid)
  {
     if(wid != 0 && wid != ''){
      $("#modal-dial").css("width",wid+"px");
     }
    $('#sximo-modal-content').html(' ....Loading content , please wait ...');
    $('.modal-title').html(title);
    $('#sximo-modal-content').load(url,function(){
    });
    $('#sximo-modal').modal('show');  
  }

  jQuery(document).ready(function ($) {
    $(".select2").select2();

    $('input[type="checkbox"], input[type="radio"]').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });

    $('.date').datepicker({format:'yyyy-mm-dd',}).on('changeDate',function(e){
    $(this).datepicker('hide');
  })

    $('form').submit(function() {
      // your code here
      $('.number').each(function(i, obj) {
       // $(this).val($(this).autoNumeric('get'));
      });
      $('.number-d').each(function(i, obj) {
        //$(this).val($(this).autoNumeric('get'));
      });
    });
    //notif();
    /*$('.number').autoNumeric('init',{
      aPad:false,
      aSign: '',
      mDec:3
    });
    $('.number-d').autoNumeric('init',{
      pSign: 's',
      aSign: ' %'

    });
    */
  });   


/*
function PopupCenter(url, title, w, h) {
    // Fixes dual-screen position                         Most browsers      Firefox
    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
    var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

    var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    var left = ((width / 2) - (w / 2)) + dualScreenLeft;
    var top = ((height / 2) - (h / 2)) + dualScreenTop;
    var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

    // Puts focus on the newWindow
    if (window.focus) {
        newWindow.focus();
    }
}
*/

function PopupCenter(url, title, w, h) {
  var left = (screen.width/2)-(w/2);
  var top = (screen.height/2)-(h/2);
  return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
} 


 
function ConfirmGetit( url,id ,stt)
  {
    if(confirm('Apakah anda yakin melakukan ini ? '))
    {
      $.ajax({
      url: url,
      data:{id:id,stt:stt},
      type: "POST",
      success: function(data) {
        alert("Data berhasil update !!");
        table.ajax.reload( null, false );
        //window.location.reload();
      }
      });
    }
    return false;
  }

function printContent(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();
     location.reload();
    // document.body.innerHTML = originalContents;
   //window.close();
}

function addtgl(a, b,c) {
  if(c==''){
  var someDate = new Date("<?=date('Y-m-d');?>");
someDate.setDate(someDate.getDate()+parseInt(a)); //number  of days to add, e.x. 15 days
var dateFormated = someDate.toISOString().substr(0,10);
}else{
  var dateFormated = c;
}
$('#'+b).datepicker('update', dateFormated);
}

$(document).ready(function(){
        $('a[title="Configuration"]').each(function() {
            $(this).hide();
        });
    });

Number.prototype.formatMoney = function(c, d, t){
var n = this, 
    c = isNaN(c = Math.abs(c)) ? 2 : c, 
    d = d == undefined ? "." : d, 
    t = t == undefined ? "," : t, 
    s = n < 0 ? "-" : "", 
    i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))), 
    j = (j = i.length) > 3 ? j % 3 : 0;
   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
 };

</script>
</body>
</html>
