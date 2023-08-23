<?php
include 'connection.php';
$coupon_code = $_POST['coupon_code'];
$query = mysqli_query($conn,"select * from coupon_code where coupon_code='$coupon_code' and status=1");
$row = mysqli_fetch_array($query);

if (mysqli_num_rows($query)>0)
{
  echo json_encode(array(
    "statusCode"=>200,
    "value"=>$row ['value']
 ));

"root";
else{
   echo json_encode (array("statusCode"=>201));
    }
}
?>
......................Final

<?php
include 'connection.php';
include 'coupon.php';

if (isset($_POST['coupon_code'])) {
$coupon_code = $_POST['coupon_code'];
$query = mysqli_query($conn,"select * from coupon_code where coupon_code='$coupon_code' and status=1");
$row = mysqli_fetch_array($query);

if (mysqli_num_rows($query)>0)
{
  echo json_encode(array(
    "statusCode"=>200,
    "value"=>$row ['value']
 ));
}

else{
   echo json_encode (array("statusCode"=>201));
    }
  }
?>
