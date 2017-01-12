<?php
/**
 * Created by PhpStorm.
 * User: d.vorstenbosch
 * Date: 31-10-2016
 * Time: 11:39
 */
 $connect = mysqli_connect("localhost", "root", "", "Werk");
 $output = '';
error_reporting(0);
 $sql = "SELECT * FROM magazine WHERE produ_name OR produ_desc LIKE '%".$_POST["search"]."%'";
 $result = mysqli_query($connect, $sql);
 if($result->num_rows > 0)
 {
     $output .= '<h4 align="center">Gevonden Resultaten</h4>';
     $output .= '<div>  
                          <table class="table table-striped"> 
                            <thead class="menu">
                               <tr>  
                                    <th>ID</th>  
                                    <th>Product naam</th>  
                                    <th>Voorraad</th>  
                                    <th>Inkoop prijs</th>  
                                    <th>Bron</th>  
                               </tr>
                            </thead>';
     while($row = mysqli_fetch_array($result))
     {
         $output .= '  
                <tr>  
                     <th>'.$row["produ_id"].'</th>  
                     <th>'.$row["produ_name"].' - '.$row["produ_desc"].'</th>  
                     <th>'.$row["produ_voor"].'</th>  
                     <th>&euro; '.$row["produ_inko"].'</th>  
                     <th><a href="'.$row["produ_bron"].'" target=_blank>Klik hier</a></th>  
                </tr>  
           ';
     }
     echo $output;
 }
 else
 {
     echo 'Data Not Found';
 }
 ?>