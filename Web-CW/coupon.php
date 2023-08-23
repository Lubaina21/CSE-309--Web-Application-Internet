<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Initializing CSS -->
    <link rel="stylesheet" href="style-responsive.css">

    <title>Coupon Code</title>

    <!-- Font Awesome 5 CDN (5.15.4) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Initializing Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- Initializing Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>
        .container {
            padding: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h3>Coupon Code</h3>
    <form>
        <div class="form-group">
            <label for="total_price"><stong>Total Price:</strong></label>
            <input type="text" class="form-control" id="total_price" name="total_price" value="1000.00">
        </div><br>
        <div class="form-group">
            <label for="coupon_code"><strong>Apply Promocode: <strong></label>
            <input type="text" class="form-control" id="coupon_code" placeholder="Apply Promocode" name="coupon_code">
            <b><span id="message" style="color:rgb(48, 173, 204);"></span></b>
        </div><br>
        <button type="button" id="apply" class="btn btn-primary">Apply</button><br>
        <button type="button" id="edit" class="btn btn-default" style="display: none;">Edit</button>
    </form>
</div>

<script>
    $("#apply").click(function () {
        if ($('#coupon_code').val() !== '') {
            $.ajax({
                type: "POST",
                url: "process.php",
                data: {
                coupon_code: $('#coupon_code').val()
                },
                success: function (dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode === 200) {
                        var after_apply = parseFloat($('#total_price').val()) - parseFloat(dataResult.value);
                        $('#total_price').val(after_apply.toFixed(2));
                        $('#apply').hide();
                        $('#edit').show();
                        $('#message').html("Promocode applied successfully !");
                    } else if (dataResult.statusCode === 201) {
                        $('#message').html("Invalid promocode!");
                    }
                }
            });
        } else {
            $('#message').html("Promocode can not be blank. Enter a Valid Promocode!");
        }
    });

    $("#edit").click(function () {
        $('#coupon_code').val("");
        $('#apply').show();
        $('#edit').hide();
        $('#message').html("");
        location.reload();
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>

