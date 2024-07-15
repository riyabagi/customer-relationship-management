<?php
include 'link.php';
include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login and registration page</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<style>
 .container {
width: 30%;
 }
</style>

<body>
    <!-- 
    <div class="mb-3">
        <label for="firstname" class="form-label"> First Name</label>
        <input type="text" id="rfname" class="form-control" style="width:100%;">
    </div> -->

    <div class="container">

        <div class="registration">
            <h1> Registration</h1>
            <div class="form-label">
                <label for="firstname"> Name:</label>
                <input type="text" id="rname" class="form-control1" >
            </div> <!-- Corrected attribute name -->
            <div class="form-label">
                <label>Company Name:</label>
                <input type="text" id="rcname" class="form-control1" >
                <!-- Corrected attribute name -->
            </div>

            <div class="form-label">
                <label>Website Link:</label>
                <input type="url" id="rweb" class="form-control1" >
                <!-- Corrected attribute name and type -->
            </div>

            <div class="form-label">
                <label>Mobile number:</label>
                <input type="number" id="rnumber" class="form-control1" >
            </div>
            <div class="form-label">
                <label>Email:</label>
                <input type="email" id="remail" class="form-control1" >
            </div>

            <div class="form-label">
                <label>Password:</label>
                <input type="password" id="rpass" class="form-control1" >
            </div>



            <div class="form-label">
                <label>Organization:</label>
                <input type="text" id="org" class="form-control1" >
            </div>
            <div class="form-label">
                <label>Address:</label>
                <input type="text" id="address" class="form-control1" >
            </div>

            <div class="form-label">
                <label>Bank name:</label>
                <input type="text" id="rbname" class="form-control1" >
            </div>

            <div class="form-label">
                <label>IFCS Code:</label>
                <input type="text" id="rcode" class="form-control1" >

            </div>
            <div class="form-label">
                <label>Acc no:</label>
                <input type="text" id="accno" class="form-control1" >
            </div>

            <span style="color:red;" id="error"></span> 
            <br>

            <button class="buttons" style="margin-top: 0px;" type="submit" id="smit">submit</button>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("#smit").click(function () {
                let rname = $("#rname").val();
                let rcname = $("#rcname").val();
                let rweb = $("#rweb").val();
                let rnumber = $("#rnumber").val();
                let remail = $("#remail").val();
                let org = $("#org").val();
                let address = $("#address").val();
                let bank = $("#rbname").val();
                let code = $("#rcode").val();
                let accno = $("#accno").val();
                let rpass = $("#rpass").val();

                if (rname == '') {
                    $("#error").html("Please enter the name")
                } else if (rnumber == '') {
                    $("#error").html("Please enter the mobile number")
                }
                else if (rcname == '') {
                    $("#error").html("Please enter the company name")
                } else if (rweb == '') {
                    $("#error").html("Please enter the website links")
                }
                else if (remail == '') {
                    $("#error").html("Please enter the email")
                } else if (rpass == '') {
                    $("#error").html("Please enter the Password")
                } else if (org == '') {
                    $("#error").html("Please enter the your Organization ")
                } else if (address == '') {
                    $("#error").html("Please enter the company address")
                }
                else if (rbname == '') {
                    $("#error").html("Please enter the bank name")
                }
                else if (rcode == '') {
                    $("#error").html("Please enter the IFSC code")
                }
                else if (accno == '') {
                    $("#error").html("Please enter the account number")
                }
                else {
                    $.ajax({
                        url: './ajax/registrationajax.php',
                        method: 'POST',
                        data: {
                            rname: rname,
                            rnumber: rnumber,
                            rcname: rcname,
                            rweb: rweb,
                            remail: remail,
                            org: org,
                            address: address,
                            rpass: rpass,
                            rbname: bank, // Correct the key
                            rcode: code, // Correct the key
                            accno: accno,
                        },
                        success: function (res) {
                            console.log(res);
                            alert(res);
                        },
                        error: function (err) {
                            console.error(err);
                        }
                    });
                }
            }); // Corrected closing parenthesis
        });
    </script>
</body>

<?php
include 'footer.php';
?>

</html>