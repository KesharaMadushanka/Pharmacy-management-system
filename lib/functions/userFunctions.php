<?php

include_once("db_conn.php");


//user registering function
function userRegistration($name, $email, $pwd, $phone, $nic)
{

    //create db connection
    $db_conn = Connection();


    $insertSql = "INSERT INTO registration_table(user_name,user_email,user_tp,user_nic,user_role,user_status) 
                  VALUES('$name','$email','$phone','$nic','user',1);";


    $sqlResult = mysqli_query($db_conn, $insertSql);

    //check database errors
    if (mysqli_connect_errno($sqlResult)) {
        echo (mysqli_connect_error($sqlResult));
    }

    if ($sqlResult > 0) {

        $newPwd = md5($pwd);


        $insertLogin = "INSERT INTO login_table(user_email,user_pwd,login_role,login_status) 
                        VALUES('$email','$newPwd','user',1);";

        $loginResult = mysqli_query($db_conn, $insertLogin);

        //database error checking
        if (mysqli_connect_errno($loginResult)) {
            echo (mysqli_connect_error($loginResult));
        }

        return ("Your Registration is Success!");
    } else {
        return ("Please try again!");
    }
}



//authentication 
function Authentication($userName, $userPassword)
{

    //create db connection
    $db_conn = Connection();

    //user check in sql
    $sqlUserFetch = "SELECT * FROM login_table WHERE user_email = '$userName';";
    $sqlResult = mysqli_query($db_conn, $sqlUserFetch);

    //database error checking
    if (mysqli_connect_errno($sqlResult)) {
        echo (mysqli_connect_error($sqlResult));
    }

    //convert user pwd to hash value
    $newPwd = md5($userPassword);

    //check number of rows
    $nor = mysqli_num_rows($sqlResult);

    //validating the numbe of rows
    if ($nor > 0) {

        //getting user name to the usetr id
        $query = "SELECT * FROM registration_table WHERE user_email = '$userName';";
        $results = mysqli_query($db_conn, $query);
        //feth data
        $row = mysqli_fetch_assoc($results);

        //fetch the record
        $rec = mysqli_fetch_assoc($sqlResult);

        //validating th password
        if ($rec['user_pwd'] == $newPwd) {

            //validating user status
            if ($rec['login_status'] == 1) {

                //check user role
                if ($rec['login_role'] == "admin") {

                    //creating the cookie
                    setcookie("login", $rec['login_id'], time() + 60 * 60);

                    //creating a session
                    $_SESSION['loginName'] = $rec['user_email'];
                    $_SESSION['loginId'] = $rec['login_id'];
                    $_SESSION['userName'] = $row['user_name'];

                    //redirect user to the dashboard
                    header('location:lib/views/admin.php');

                } elseif ($rec['login_role'] == "user") {

                    //creating the cookie
                    setcookie("login", $rec['login_id'], time() + 60 * 60);

                    //creating a session
                    $_SESSION['loginName'] = $rec['user_email'];
                    $_SESSION['loginId'] = $rec['login_id'];
                    $_SESSION['userName'] = $row['user_name'];

                    //redirect user to the dashboard
                    header('location:lib/views/user.php');

                } elseif ($rec['login_role'] == "employee") {

                    //creating the cookie
                    setcookie("login", $rec['login_id'], time() + 60 * 60);

                    //creating a session
                    $_SESSION['loginName'] = $rec['user_email'];
                    $_SESSION['loginId'] = $rec['login_id'];
                    $_SESSION['userName'] = $row['user_name'];

                    //redirect user to the dashboard
                    header('location:lib/views/employee.php');
                }

            } else {
                return ("Your account has been deactivated!");
            }
        } else {
            return ("Your password is incorrect! Please try again.");
        }
    } else {
        return ("No records are found !");
    }
}


//employer resgistration function
function empRegister($empId, $empName, $empEmail, $empNic, $empTel, $empDob)
{

    //creating db connection
    $db_conn = Connection();

    $insert = "INSERT INTO emp_tbl (emp_id,emp_name,emp_email,emp_nic,emp_tel,emp_dob) VALUES ('$empId','$empName','$empEmail','$empNic','$empTel','$empDob');";
    $results = mysqli_query($db_conn, $insert);

    //db error checking
    if (mysqli_connect_errno($results)) {
        echo (mysqli_connect_error($results));
    }

    if ($results > 0) {
        return '1';
    } else {
        return '0';
    }
}

//delete emp function
function deleteUsers($id)
{

    //creating db connection
    $db_conn = Connection();

    $query = "DELETE FROM emp_tbl WHERE emp_id = '$id';";
    $queryResults = mysqli_query($db_conn, $query);



    //check the db connectrion erros
    if ($db_conn->connect_errno) {
        echo ($db_conn->connect_error);
    }
    if ($queryResults > 0) {
        return 1;
    } else {
        return 0;
    }
}

//login management function
function editLogin($userId, $userEmail, $loginStatus, $loginRole)
{
    //creating db connection
    $db_conn = Connection();

    if ($loginRole == 1) {
        $loginRole = 'admin';
    } else if ($loginRole == 2) {
        $loginRole = 'employee';
    } else if ($loginRole == 3) {
        $loginRole = 'user';
    }

    $query = "UPDATE login_table SET login_id = $userId, user_email = '$userEmail', login_role = '$loginRole', login_status = $loginStatus WHERE login_id = $userId;";
    $results = mysqli_query($db_conn, $query);

    //check the db connectrion erros
    if ($db_conn->connect_errno) {
        echo ($db_conn->connect_error);
    }
    if ($results > 0) {
        return 1;
    } else {
        return 0;
    }
}

//edit emp function
function editEmp($empId, $empName, $empEmail, $empNic, $empTel, $empDob)
{
    //creating db connection
    $db_conn = Connection();

    $query = "UPDATE emp_tbl SET emp_id='$empId',emp_name='$empName',emp_email='$empEmail',emp_nic='$empNic',emp_tel='$empTel',emp_dob='$empDob' WHERE emp_id='$empId';";

    $queryResults = mysqli_query($db_conn, $query);

    //check the db connectrion erros
    if ($db_conn->connect_errno) {
        echo ($db_conn->connect_error);
    }
    if ($queryResults > 0) {
        return 1;
    } else {
        return 0;
    }
}

//add medicine function
function addMedicine($barcode, $medName, $genName, $strength, $boxTablets, $buy, $sell, $medType, $manufacturer, $details)
{

    //creating db connection
    $db_conn = Connection();

    $query = "INSERT INTO medicine_tbl(barcode,med_name,gen_name,strength,tablets_1box,buying_price,selling_price,med_type,manufaturer,more_details)
    VALUES ('$barcode','$medName','$genName',$strength,$boxTablets,$buy,$sell,'$medType','$manufacturer','$details');";

    $queryResults = mysqli_query($db_conn, $query);

    //insert to inventory table
    $queryInvent = "INSERT INTO medicine_inventory(barcode) VALUES ('$barcode');";

    $Results = mysqli_query($db_conn, $queryInvent);


    //db error checking
    if (mysqli_connect_errno($queryResults)) {
        echo (mysqli_connect_error($queryResults));
    }

    if ($queryResults > 0) {
        return '1';
    } else {
        return '0';
    }
}


//admin page dashboard income card backend
function income()
{
    //creating db connection
    $db_conn = Connection();

    $queryInvoive = "SELECT total FROM invoice_tbl;";
    $results = mysqli_query($db_conn, $queryInvoive);
    $income = 0;

    while ($row = mysqli_fetch_array($results)) {
        $income = $row['0'] + $income;
    }

    echo $income;
}


//admin page dashboard profit card backend
function profit()
{
    //creating db connection
    $db_conn = Connection();

    $queryInvoive = "SELECT total FROM invoice_tbl;";
    $results = mysqli_query($db_conn, $queryInvoive);
    $buyingTot = 0;
    $sellingTot = 0;

    while ($row = mysqli_fetch_array($results)) {
        $sellingTot = $row['0'] + $sellingTot;
    }
    $queryBuying = "SELECT price FROM medicine_stock;";
    $resultsBuy = mysqli_query($db_conn, $queryBuying);

    while ($row = mysqli_fetch_array($resultsBuy)) {
        $buyingTot = $row['0'] + $buyingTot;;
    }


    $profit = $sellingTot - $buyingTot;

    echo $profit;
}


//admin page dashboard expiration card backend
function expCard()
{
    //creating db connection
    $db_conn = Connection();

    $getExpQuery = "SELECT count(stock_id) FROM medicine_stock WHERE DATEDIFF(exp,curdate()) <= 14;";
    $results = mysqli_query($db_conn, $getExpQuery);

    $fetch = mysqli_fetch_array($results);

    $countExp = $fetch['0'];


    return $countExp;
}

//admin page dashboard lowstock card backend
function lowStockCard()
{
    //creating db connection
    $db_conn = Connection();

    $getBoxQuery = "SELECT count(barcode) FROM medicine_inventory WHERE total_boxes <= 5";
    $results = mysqli_query($db_conn, $getBoxQuery);

    $fetch = mysqli_fetch_array($results);

    $countBox = $fetch['0'];


    return $countBox;
}



//admin page dashboard employees card backend
function empCard()
{
    //creating db connection
    $db_conn = Connection();

    $getEmpQuery = "SELECT count(emp_id) FROM emp_tbl;";
    $results = mysqli_query($db_conn, $getEmpQuery);

    $fetch = mysqli_fetch_array($results);

    $countEmp = $fetch['0'];


    return $countEmp;
}

//admin page dashboard Users card backend
function customerCard()
{
    //creating db connection
    $db_conn = Connection();

    $getCusQuery = "SELECT count(user_id) FROM registration_table WHERE user_role='user' AND user_status=1;";
    $results = mysqli_query($db_conn, $getCusQuery);

    $fetch = mysqli_fetch_array($results);

    $countCus = $fetch['0'];


    return $countCus;
}

//editMed function
function editMed($barcode, $medName, $genName, $strength, $boxTablets, $buy, $sell, $medType, $manufacturer, $details){
    //creating db connection
    $db_conn = Connection();

    $query = "UPDATE medicine_tbl SET barcode='$barcode', med_name='$medName', gen_name='$genName', strength=$strength, tablets_1box=$boxTablets,
    buying_price=$buy, selling_price=$sell, med_type='$medType', manufaturer='$manufacturer', more_details='$details' WHERE barcode = '$barcode';";
    $run = mysqli_query($db_conn, $query);

    //check the db connectrion erros
    if ($db_conn->connect_errno) {
        echo ($db_conn->connect_error);
    }
    if ($run > 0) {
        return 1;
    } else {
        return 0;
    }
}


//delete med function
function deleteMed($barcode)
{

    //creating db connection
    $db_conn = Connection();

    $query = "DELETE FROM medicine_tbl WHERE barcode = '$barcode';";
    $queryResults = mysqli_query($db_conn, $query);

    //check the db connectrion erros
    if ($db_conn->connect_errno) {
        echo ($db_conn->connect_error);
    }
    if ($queryResults > 0) {
        return 1;
    } else {
        return 0;
    }
}

//delete stock function
function deleteStock($stockId)
{

    //creating db connection
    $db_conn = Connection();

    //getting barcode from stockId
    $barQuery = "SELECT barcode FROM medicine_stock WHERE stock_id = $stockId;";
    $runbarQuery = mysqli_query($db_conn, $barQuery);
    $recBar = mysqli_fetch_assoc($runbarQuery);
    $barcode = $recBar['barcode'];

    //getting tablets in boxes
    $fetch = "SELECT tablets_1box FROM medicine_tbl WHERE barcode = '$barcode'";
    $runFetch = mysqli_query($db_conn, $fetch);
    $rec1 = mysqli_fetch_assoc($runFetch);

    //getting tablets in stockid
    $tabletQuery = "SELECT tablets,boxes FROM medicine_stock WHERE stock_id = $stockId;";
    $runQuery = mysqli_query($db_conn, $tabletQuery);
    $rec = mysqli_fetch_assoc($runQuery);

    $tablets = $rec["tablets"];
    $boxes = $rec['boxes'];

    //delting in stock tablet
    $query = "DELETE FROM medicine_stock WHERE stock_id = $stockId;";
    $run = mysqli_query($db_conn, $query);

    $tablets = $rec1['tablets_1box'] * $boxes;


    //get previos tablets and boxes amounts
    $getBox = "SELECT total_boxes,total_tablets FROM medicine_inventory WHERE barcode = '$barcode'";
    $previous = mysqli_query($db_conn, $getBox);
    $row = mysqli_fetch_assoc($previous);

    $totalTablets = $row['total_tablets'] - $tablets;
    $totalBoxes = $row['total_boxes'] - $boxes;


    //update inventory table
    $update = "UPDATE medicine_inventory SET total_boxes = $totalBoxes, total_tablets = $totalTablets WHERE barcode = $barcode;";
    $runUpdate = mysqli_query($db_conn, $update);

    //check the db connectrion erros
    if ($db_conn->connect_errno) {
        echo ($db_conn->connect_error);
    }
    if ($runUpdate > 0) {
        return 1;
    } else {
        return 0;
    }
}


//update stock function
function updateStock($barcode, $boxes, $exp, $price)
{

    //creating db connection
    $db_conn = Connection();

    //getting tablets in boxes
    $fetch = "SELECT tablets_1box FROM medicine_tbl WHERE barcode = '$barcode'";
    $runFetch = mysqli_query($db_conn, $fetch);

    $rec = mysqli_fetch_assoc($runFetch);

    $tablets = $rec['tablets_1box'] * $boxes;

    //insert stock table
    $insert = "INSERT INTO medicine_stock(barcode,boxes,tablets,exp,price) VALUES ('$barcode',$boxes,$tablets,'$exp',$price);";
    $queryResults = mysqli_query($db_conn, $insert);

    //get previos tablets and boxes amounts
    $getBox = "SELECT total_boxes,total_tablets FROM medicine_inventory WHERE barcode = '$barcode'";
    $previous = mysqli_query($db_conn, $getBox);
    $row = mysqli_fetch_assoc($previous);

    $totalTablets = $row['total_tablets'] + $tablets;
    $totalBoxes = $row['total_boxes'] + $boxes;


    //update inventory table
    $update = "UPDATE medicine_inventory SET total_boxes = $totalBoxes, total_tablets = $totalTablets WHERE barcode = $barcode;";
    $runUpdate = mysqli_query($db_conn, $update);

    //check the db connectrion erros
    if ($db_conn->connect_errno) {
        echo ($db_conn->connect_error);
    }
    if ($queryResults > 0) {
        return 1;
    } else {
        return 0;
    }
}

//send invoice form data to invoice temp table
function itemList($barcode, $qty)
{

    //creating db connection
    $db_conn = Connection();

    //checking stock avaliblity
    $stock = "SELECT total_tablets FROM medicine_inventory;";
    $results = mysqli_query($db_conn, $stock);

    $row = mysqli_fetch_assoc($results);
    if ($row['total_tablets'] < $qty) {
        return 2;
    }

    //insert item table
    $insert = "INSERT INTO item_temp (barcode,qty) VALUES ('$barcode',$qty);";
    $queryResults = mysqli_query($db_conn, $insert);

    //check the db connectrion erros
    if ($db_conn->connect_errno) {
        echo ($db_conn->connect_error);
    }

    if ($queryResults > 0) {
        return 1;
    } else {
        return 0;
    }
}

//customer details function
function customerDetails($name, $tp, $ad1, $ad2, $city)
{
    //creating db connection
    $db_conn = Connection();

    //insert customer table
    $insert = "INSERT INTO customer (customer_name,tp,address1,address2,city) VALUES ('$name','$tp','$ad1','$ad2','$city');";
    $queryResults = mysqli_query($db_conn, $insert);

    if ($queryResults > 0) {
        return 1;
    } else {
        return 0;
    }
}

//get bill total
function getTotal($barcode, $qty)
{
    //creating db connection
    $db_conn = Connection();

    $sql = "SELECT selling_price FROM medicine_tbl WHERE barcode='$barcode';";
    $queryResult = mysqli_query($db_conn, $sql);

    $row = mysqli_fetch_assoc($queryResult);
    $total = $row['selling_price'] * $qty;

    return $total;
}

//empty item_temp table
function emptyItemTemp()
{
    //creating db connection
    $db_conn = Connection();

    $query = "TRUNCATE TABLE item_temp;";
    $queryResult = mysqli_query($db_conn, $query);

    if ($queryResult > 0) {
        return 1;
    } else {
        return 0;
    }
}

//set total to the invoice table
function setTotal($total)
{
    //creating db connection
    $db_conn = Connection();

    $query = "INSERT INTO invoice_tbl(total) VALUES ($total);";
    $queryResult = mysqli_query($db_conn, $query);
}

//getting invoice id
function invoiceId()
{
    //creating db connection
    $db_conn = Connection();

    $query = "SELECT invoice_no FROM invoice_tbl ORDER BY invoice_no DESC LIMIT 1;";
    $run = mysqli_query($db_conn, $query);

    $row = mysqli_fetch_array($run);
    $id = $row['invoice_no'] + 1;
    return $id;
}

//update stock after invoice function
function stockUpdate($barcode, $tablets)
{
    //creating db connection
    $db_conn = Connection();



    //calculating boxes
    $getBox = "SELECT medicine_inventory.total_boxes,medicine_inventory.total_tablets,medicine_tbl.tablets_1box FROM medicine_inventory,medicine_tbl 
    WHERE medicine_tbl.barcode = medicine_inventory.barcode AND medicine_inventory.barcode = '$barcode';";
    $sql = mysqli_query($db_conn, $getBox);
    $row = mysqli_fetch_assoc($sql);

    //set tablets
    $newTablets = $row['total_tablets'] - $tablets;
    $updateTablets = "UPDATE medicine_inventory SET total_tablets = $newTablets WHERE barcode = '$barcode';";
    $runTablets = mysqli_query($db_conn, $updateTablets);


    //set boxes
    $calcBox = ($row['total_tablets']) / ($row['tablets_1box']);
    $i = (int)$calcBox;

    if ($i != $row['total_boxes']) {
        $update = "UPDATE medicine_inventory SET total_boxes = $i WHERE barcode = '$barcode';";
        $runUpdate = mysqli_query($db_conn, $update);
    }
}

//calculate total expenses
function expense()
{
    //creating db connection
    $db_conn = Connection();

    $buyingTot = 0;

    $queryBuying = "SELECT price FROM medicine_stock;";
    $resultsBuy = mysqli_query($db_conn, $queryBuying);

    while ($row = mysqli_fetch_array($resultsBuy)) {
        $buyingTot = $row['0'] + $buyingTot;;
    }

    echo $buyingTot;
}