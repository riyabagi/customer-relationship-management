<?php
session_start();
$uid = $_SESSION['uid'];
include 'link.php';
include('connect.php');
// echo $uid;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM</title>
</head>

<body>
    <!-----------------------------------------javascript code---------------------------------->

    <script>
        $(document).ready(function () {
            $('#home').click(function () {
                $('#myhome').show();
                $('#yourvendr').hide();
                $('#youritems').hide();
                // $('#yourinvoices').hide();
            });

            $('#vendor').click(function () {
                $('#myhome').hide();
                $('#yourvendr').show();
                $('#youritems').hide();
                // $('#yourinvoices').hide();
            });

            // $('#invoices').click(function () {
            //     $('#myhome').hide();
            //     $('#yourvendr').hide();
            //     $('#youritems').hide();
            //     $('#yourinvoices').show();
            // });

            $('#item').click(function () {
                $('#myhome').hide();
                $('#yourvendr').hide();
                $('#youritems').show();
                // $('#yourinvoices').hide();
            });

        });
    </script>

    <div class="body1">
        <section id="menu">
            <div class="logo">
                <h2 style="padding:15px;">Dashboard</h2>
            </div>


            <div class="items">
                <li id="home"><i class="fa-solid fa-house-user"></i> <a href="#" style="margin-left: 5px;">Home</a>
                </li>
                <li id="vendor"><i class="fa-solid fa-trowel-bricks"></i> <a href="#"
                        style="margin-left: 5px;">Vendor</a> </li>
                <li id="costomer"><i class="fa-solid fa-users"></i> <a href="coustomer.php">Costomers</a> </li>
                <li id="purchase"><i class="fa-solid fa-bag-shopping"></i> <a href="purchase.php">purchase</a> </li>
                <li id="item"><i class="fa-solid fa-bars"></i> <a href="#" style="margin-left: 5px;">Stocks</a> </li>
                <li id="invoices"><i class="fa-solid fa-file-invoice"></i> <a href="invoices.php"
                        style="margin-left: 5px;">Invoice</a> </li>
                <li id="quotaiton"><i class="fa-brands fa-quora"></i> <a href="quotation.php"
                        style="margin-left: 5px;">Quotation</a> </li>
                <!-- <li id="logout"><i class="fa-brands fa-quora"></i> <a href="#" style="margin-left: 5px;">Logout</a>
                </li> -->
            </div>

        </section>

        <div class="container mt-4">

            <!-- ----------------------------------home-------------------------------------- -->
            <div class="col-md-12" id="myhome">

                <h3 class="i-name">Dashboard
                </h3>
                <div class="value">
                    <div class="valbox project">
                        <label class="icons">
                            <i class="fa-solid fa-list-check"></i>
                        </label>
                        <div>
                            <h3>823</h3>
                            <span> Total Project</span>
                        </div>
                    </div>
                    <div class="valbox investment">
                        <label class="icons">
                            <i class="fa-solid fa-money-bill"></i>
                        </label>
                        <div>
                            <h3>23000</h3>
                            <span> Total Investment</span>
                        </div>
                    </div>
                    <div class="valbox income">
                        <label class="icons">
                            <i class="fa-solid fa-sack-dollar"></i>
                        </label>
                        <div>
                            <h3>40000</h3>
                            <span>Total Profit</span>
                        </div>
                    </div>
                    <div class="valbox expense">
                        <label class="icons">
                            <i class="fa-brands fa-slack"></i> </label>
                        <div>
                            <h3>63000</h3>
                            <span> Total Expense</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ---------------------------vendor--------------------------- -->
            <div class="col-md-12" id="yourvendr" style="display:none;">

                <div class="row">
                    <div class="col-md-5">
                        <h3 style="margin-left: 10px; margin-top: 20px;">Your Vendors</h3>
                    </div>
                    <div class="col-md-4">
                        <div class="search d-flex">
                            <input id="searchInput" type="text" placeholder="Search product">
                            <button onclick="searchVendors()" class="btn-primary">Search</button>
                        </div>
                        <script>
                            // ... Your existing JavaScript code ...

                            function searchVendors() {
                                var input, filter, rows, cells, textContent, i, j, found;
                                input = document.getElementById("searchInput");
                                filter = input.value.toUpperCase();
                                rows = document.getElementsByClassName("shadows");

                                for (i = 0; i < rows.length; i++) {
                                    cells = rows[i].getElementsByClassName("info-box")[0].getElementsByTagName("p");
                                    // company = document.getElementById("companyName");

                                    found = false;

                                    for (j = 0; j < cells.length; j++) {
                                        textContent = cells[j].innerText || cells[j].textContent;

                                        if (textContent.toUpperCase().indexOf(filter) > -1) {
                                            found = true;
                                            break;
                                        }
                                    }
                                    var companyName = rows[i].getElementsByClassName("info-box")[1].getElementsByTagName("p")[0].innerText || rows[i].getElementsByClassName("info-box")[1].getElementsByTagName("p")[0].textContent;
                                    if (companyName.toUpperCase().indexOf(filter) > -1) {
                                        found = true;
                                    }

                                    rows[i].style.display = found ? "" : "none";
                                }

                            }
                        </script>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-2 text-right">
                        <button type="submit" class="buttons" onclick="addVendor()">Add Vendor</button>
                    </div>
                </div>


                <?php
                $sqlpid = "SELECT * FROM vender WHERE uid = '$uid' ORDER BY name";
                $result1 = $con->query($sqlpid);

                if ($result1) {
                    while ($row1 = $result1->fetch_assoc()) {
                        $name = $row1['name'];
                        $number = $row1['number'];
                        $companyName = $row1['companyName'];
                        $type = $row1['type'];
                        $email = $row1['email'];
                        $state = $row1['state'];
                        ?>
                        <div class="row shadows" style="margin:10px; margin-bottom:20px;">
                            <div class="col-md-4 info-box">
                                <p><strong>Name:</strong>
                                    <?php echo $name; ?>
                                </p>
                                <p><span><i class="fa-solid fa-phone mar" style="margin-right: 10px;"></i></span>
                                    <?php echo $number; ?>
                                </p>
                                <p><span><i class="fa-solid fa-envelope-circle-check mar"
                                            style="margin-right: 10px;"></i></span>
                                    <?php echo $email; ?>
                                </p>
                            </div>

                            <div class="col-md-4 info-box">
                                <p id="companyName"><strong>Company:</strong>
                                    <?php echo $companyName; ?>
                                </p>
                                <p><strong>State:</strong>
                                    <?php echo $state; ?>
                                </p>
                                <p><strong>Type:</strong>
                                    <?php echo $type; ?>
                                </p>
                            </div>

                            <div class="col-md-4 info-box">
                                <p><strong>Payment:</strong> Overdue</p>
                                <p><strong>Stocks:</strong> 50</p>
                            </div>
                        </div>

                        <?php
                    }
                } else {
                    echo "Error executing query: " . $con->error;
                }
                ?>

                <script>
                    function addVendor() {
                        window.location.href = "addvender.php";
                    }
                </script>

            </div>

            <!-- -------------------------- items------------------------- -->

            <div class="col-md-12" id="youritems" style="display:none;">
                <h1>Stocks</h1>
                <div class="col-md-3">
                    <button onclick="additems()" class="buttons">Add Items</button>
                    <br>
                    <div class="col-md-4">
                        <div class="searc d-flex">
                            <input id="searchInput1" type="text" placeholder="Search product"
                                style="margin-bottom:10px">
                            <button onclick="searchitem()">Search</button>
                        </div>

                        <div class="row ">
                            <div id="searchResults1"></div>
                        </div>
                        <script>
                            function searchitem(searchTerm) {
                                // Send an AJAX request to the server to perform the search
                                $.ajax({
                                    url: './ajax/searchitem.php',
                                    method: 'POST',
                                    data: {
                                        searchTerm1: searchTerm
                                    },
                                    success: function (response) {
                                        // Update the searchResults div with the response from the server
                                        $('#searchResults1').html(response);

                                        // Remove existing click event handlers
                                        $('.search-result').off('click');

                                        // Add a click event listener to each search result
                                        $('.search-result').click(function () {
                                            // Set the selected item name to the input field
                                            var item = $(this).find('.item').text();
                                            $('#searchInput1').val(item);

                                            // Clear the search results
                                            $('#searchResults1').html('');
                                        });
                                    },
                                    error: function (error) {
                                        console.error('Error during search:', error);
                                    }
                                });
                            }

                            // Function to load default items when the page loads
                            function loadDefaultItems() {
                                searchitem(''); // Pass an empty search term for default items
                            }

                            // Call the function on page load
                            $(document).ready(function () {
                                loadDefaultItems();
                            });

                            // Function to handle search button click
                            $('button').click(function () {
                                var searchTerm = $('#searchInput1').val();
                                searchitem(searchTerm);
                            });

                            function additems() {
                                window.location.href = "additems.php";
                            }

                        </script>

                    </div>

                </div>
            </div>


        </div>
    </div>
</body>
<?php
include 'footer.php';
?>

</html>