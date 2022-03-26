<div class="col-12">
    <div class="card card-body">
        <h3 class="text-white">File</h3>
        <form action="" method="post">
            <button name="decrypt" type="submit" class="btn btn-dark float-right"> Decrypt</button>
        </form>


        <?php
        $id = $_GET['open'];
        $sql = "SELECT * FROM documents WHERE doc_id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {

                $doc_id = $row["doc_id"];
                $doc_title = $row["doc_title"];
                $doc_file = $row["doc_file"];
                $status = $row["status"];
                $con_level = $row["con_level"];
                $date_created = $row["date_created"];
            }
        }

        if(isset($_POST['decrypt'])){

            function encrypt_decrypt($string, $action = 'encrypt')
            {
                $encrypt_method = "AES-256-CBC";
                $secret_key = 'AA74CDCC2BBRT935136HH7B63C27'; // user define private key
                $secret_iv = '5fgf5HJ5g27'; // user define secret key
                $key = hash('sha256', $secret_key);
                $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
                if ($action == 'encrypt') {
                    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
                    $output = base64_encode($output);
                } else if ($action == 'decrypt') {
                    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
                }
                return $output;
            }


            //Key
            $pwd = encrypt_decrypt($doc_file,'decrypt');
            $doc_file = $pwd;

//                echo "Your Encrypted password is = ". $pwd = encrypt_decrypt('spaceo', 'encrypt');
//                  echo "Your Decrypted password is = ". encrypt_decrypt($pwd, 'decrypt');
//            $doc_title = decrypt($doc_title);
        }

        ?>
        <div class="card card-body text-dark bg-light">
            <h3 class="text-dark">  <?php echo $doc_title ?></h3>
            <p>  <?php echo $con_level ?></p>
            <small>  <?php echo $date_created ?></small>
            <hr>
            <div class="form-group text-dark">
                <?php echo $doc_file ?>
            </div>
            <hr>
        </div>




    </div>

</div>