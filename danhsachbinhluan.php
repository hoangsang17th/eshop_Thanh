<?php
include('header1.php');
?>
<div class="row">
        <div class="col-12">
            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Họ và Tên</th>
                    <th scope="col">Noi Dung</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $Statement_Comment = "SELECT * FROM comment";
                $Query_Comment =mysqli_query($conn, $Statement_Comment);
                $Stt= 1;
                while ($Display_Comment = mysqli_fetch_assoc($Query_Comment)){
                    $Statement_Users = "SELECT * FROM users WHERE ID_User =".$Display_Comment['ID_User'] ;
                    $Query_Users =mysqli_query($conn, $Statement_Users);
                    $Display_Users = mysqli_fetch_assoc($Query_Users);
                    echo "<tr>";
                    echo '<td>'.$Stt.'</td>';
                    echo "<td>".$Display_Users['Name_User']."</td>";
                    echo "<td>".$Display_Comment['Comment']."</td>";
                    echo "</tr>";
                    $Stt++;
                }
            ?>
            </tbody>
            </table>
        </div>
    </div> 
<?php
include('footer1.php');
?>