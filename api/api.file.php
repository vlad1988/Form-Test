<?php

echo $_FILES['file']['name'];
$filename = $_FILES['file']['name'];
$destination = '../download/cache/' . $filename;
move_uploaded_file( $_FILES['file']['tmp_name'] , $destination );
