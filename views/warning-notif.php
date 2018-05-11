<?php
include'../config/controller.php';
include'../sweetalert/sweetalert.php';
include'../root/notification.php';
$query= new Database();

$id=$_SESSION['kriteria'];
    foreach ($query->notification($id) as $row ) {
      $data    =$row['date'];
      $pecah   =explode('-', $data);
      $tahun   =$pecah[0];
      $bulan   =$pecah[1];
      $tanggal =substr($pecah[2],0,-8);
?>
<li>
  <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
    <li>
      <a  data-id="<?php echo $row['id_history'];?>" href="javascript:void(0)" class='peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100 notification'>
        <div class="peer mR-15">
          <i class="c-brown-500 ti-email"></i>
        </div>
        <div class="peer peer-greed">
          <span>
              <span class="fw-500"><?php echo $row['nama'];?></span>
          </span>
          <p class="m-0">
            <small class="fsz-xs"><?php echo $tanggal.'/'.$bulan.'/'.$tahun;?></small>
          </p>
        </div>
      </a>
    </li>
  </ul>
</li>
<?php } ?>
<script type="text/javascript">
$('.notification').on('click', function (evt) {
    evt.preventDefault();
    var getLink = $(this).attr('data-id');
    var link = evt.target,
    span = $('<span>... processing ...</span>');
    //$('#mainContent').replaceWith(span);
    $('#mainContent').load("views/view-notification.php?notif&id="+getLink);
    console.log(getLink);
      $('.load-notification').load("root/getnotif.php");
        $('.warning-notif').load("views/warning-notif.php");
});
</script>
