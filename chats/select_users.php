<?php  
include_once '../reg_log/functions.php';
 $connect = mysqli_connect("localhost:3306", "nairi_nairi", "Nairi.host2004", "nairi_link_shortener"); 
 $output = '';  
 $username = $_SESSION['username'];
 $sql = "SELECT * FROM mes_users WHERE username != '$username' ORDER BY user_id DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive container">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">Id</th>  
                     <th width="40%">Username</th>  
                     <th width="40%">Status</th>   
                     <th width="10%">Action</th>   
                </tr>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
      while($row = mysqli_fetch_assoc($result))  
      {
        $id = null;
        $id += $row["user_id"];
           $output .= '  
                <tr>
                     <td>'.$id.'</td>  
                     <td class="first_name" data-id1="'.$id.'">'.$row["username"].'</td>
                     <td class="first name " data-id="'.$id.'"><ul ><li style="color: white" class="on_of_stat btn '.($row['online_offline'] == 1 ? 'btn-success' : 'btn-danger').' on_of_stat">'.($row['online_offline'] == 1 ? 'online' : 'offline').'</li></ul></td>';

            // if ($rows['online_offline'] == 'online') {
            //   $output .= '<td class="last_name" data-id2="'.$id.'"><li style="color: white" class="btn on_of_stat btn-success">'.$row['online_offline'].'</li></td>';
            // }else if ($rows['online_offline'] != 'offline'){
            //   $output .= '<td class="last_name" data-id2="'.$id.'"><li style="color: white" class="btn on_of_stat btn-danger">'.$row['online_offline'].'</li></td>';
            // }
            $output .= '<td><a style="color: white" href="?message='.$row["username"].'"><button type="button" name="message" data-id3="'.$id.'" class="message_btn btn btn- btn-success">chat</button></a></td>    
                </tr>  
           ';  
      }  
     
 }  
 else  
 {  
    //   $output .= '
				// <tr>  
				// 	<td></td>  
				// 	<td id="first_name" contenteditable></td>  
				// 	<td id="last_name" contenteditable></td>  
				// 	<td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
			 //   </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>
 <script>
   // if($('.on_of_stat').text() == 'online'){
   //    $('.on_of_stat').css('background-color', 'red')
   // }else{
   //    $('.on_of_stat').css('background-color', 'green')
   // }
 </script>