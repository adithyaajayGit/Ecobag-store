<?php
$bid = $_GET['bid'];
?>

<!DOCTYPE html>
<html>
<body>
<script>
    var bid = "<?php echo $bid; ?>";

    function deleteProduct() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var response = xhr.responseText;
                    if (response === "success") {
                        alert("Product Not Removed");
                        window.location.href = "cart.php";
                    } else {
                        alert("Product Removed");

                        window.location.href = "cart.php";
                    }
                } else {
                    alert("Error occurred while processing the request.");
                }
            }
        };

        xhr.open("GET", "delete_product.php?bid=" + bid, true);
        xhr.send();
    }

    if (confirm('Are you sure you want to remove?')) {
        deleteProduct();
    }
    else{
        window.location.href = "cart.php";
    }
</script>

</body>
</html>
