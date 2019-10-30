<?php
include("../includes/header.php");
    ?>
    <table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col"> Product Id </th>
            <th scope="col"> Product Name </th>
            <th scope="col"> Product Description </th>
            <th scope="col"> Product Price </th>
            <th scope="col"> Product Vendor </th>
            <th scope="col"> Product Image URL </th>

        </tr>
    </thead>

    <tbody>
        <tr>
            <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
        </tr>
        <tr>
            <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
        </tr>
        <tr>
            <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
         </tr>
     </tbody>


</table>

<?php
// Returns all products in the PRODUCTS table
// as a multi-dimensional associative array
function getProducts() {
    include('database.php');

    $query = 'SELECT * FROM PRODUCT';
   $result = mysqli_query($connection, $query);

    if($result) {
       return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return "Error: getProducts()";
    }
}

$products = getProducts();
 include('database.php');

    if(is_array($products)) {
        echo "<tr>";
        foreach($products as $product){
            echo "<td>".$product['product_id']."</td>";
            echo "<td>".$product['product_name']."</td>";
            echo "<td>".$product['product_description']."</td>";
            echo "<td>".$product['product_price']."</td>";
            echo "<td>".$product['product_vendor']."</td>";
            echo "<td>".$product['product_img_url']."</d>";
        }
        echo "</tr>";
    } else {
        echo $products;
    }
?>
<?php


include("../includes/footer.php");
?>