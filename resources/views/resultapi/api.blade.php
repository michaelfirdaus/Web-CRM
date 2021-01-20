@php
    $id = $_GET['id'];
    $nilai = $_GET['nilai'];
    $resultid = null;

    echo ("$id - $nilai "); 

    $dbhost = "127.0.0.1";
    $dbuser = "root";
    $dbpass = "";
    $db = "testadmininternalcn";

    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

    $sql1 = "SELECT id FROM transactions WHERE participant_id = $id AND result_flag = 0";
    $transaction = mysqli_query($conn, $sql1);

    while($row = mysqli_fetch_assoc($transaction)){
        $transactionid = $row['id'];
        $sql2 = "INSERT INTO results (transaction_id, score) VALUES ($transactionid, $nilai)";
        if(mysqli_query($conn, $sql2)){
            $resultid = mysqli_insert_id($conn);
            $sql3 = "UPDATE transactions SET result_id=$resultid, result_flag=1 WHERE id=$transactionid";
            if(mysqli_query($conn, $sql3)){
                echo "Data updated successfully";
            }else{
                echo "Error updating record: " . mysqli_error($conn);
            }
        }else{
            echo "Error updating record: " . mysqli_error($conn);
        }
    }

    $conn->close();
@endphp