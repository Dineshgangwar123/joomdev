<?php
session_start();
include 'config.php';
if (isset($_SESSION['uid'])) {

}else{
   header('location: index.php');
}
if (isset($_SESSION['uid'])) {
    $userId=$_SESSION['uid'];
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>JoomDev Project</title>
    <meta name="author" content="Codeconvey" />
    
    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/login-page.css">
    
    <link rel="stylesheet" href="css/demo.css" />

</head>
<body>

    <section>
        <div  style="background: black;color: white;padding: 20px;font-size: 20px;" align="right">
            <a href="logout.php">Logout</a>   
        </div>
    </section>

    <section> 
        <div class="rt-container">
            <div class="row">
                <textarea rows="5" class="cm-input" placeholder="Enter your text here..." id="mszarea" ></textarea>
                <div align="right" style="margin-top:30px">
                    <button style="border-radius: 5px;font-size: 16px;color: white;background: #482f97;padding: 10px;border: none;" onclick="published()" >Published</button>
                </div>
                <?php 
                $txt=mysqli_query($con,"select t.*,u.name from textdata as t left join user as u on t.userid=u.id order by id desc");
                $count=0;
                $resText='';
                while ($row=mysqli_fetch_assoc($txt)) {
                    if ($count==0) {
                        $resText .='<b>'.$row['name'].'</b> '.nl2br($row['textmsz']);
                    }else{
                        $resText .='<br>'.'<b>'.$row['name'].'</b> '.nl2br($row['textmsz']);
                    }
                    $count=$count+1;
                }

                ?>     
                <div id="mszdisplay" >
                    <?php echo $resText; ?>
                </div>   
            </div>
        </div>
    </section>

</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script type="text/javascript">
function published() {
    var mszarea=$('#mszarea').val();

    if (mszarea !='') {
    $.ajax({
        url: 'messageaction.php',
        type: 'POST',
        data: {mszarea : mszarea},
        success: function(response) { 
            const obj = JSON.parse(response);
           if (obj.status ==1) {
            $('#mszarea').val('');
            $('#mszdisplay').html(obj.result);
             Toastify({
              text: "You content has been published",
              duration: 3000,
              newWindow: true,
              close: true,
              gravity: "top", 
              position: "right", 
              stopOnFocus: true, 
              style: {
              background: "linear-gradient(to right, #00b09b, #96c93d)",
              },
              onClick: function(){} 
            }).showToast();

           }else{
             Toastify({
              text: "Please write somthing new before published",
              duration: 3000,
              newWindow: true,
              close: true,
              gravity: "top", 
              position: "right", 
              stopOnFocus: true, 
              style: {
              background: "linear-gradient(to right, #00b09b, #96c93d)",
              },
              onClick: function(){} 
            }).showToast();

           }
           
     },
    error: function (request, status, error) {
        console.log(request.responseText);
    }
 });
}else{
    Toastify({
              text: "Please right something in text area",
              duration: 3000,
              newWindow: true,
              close: true,
              gravity: "top", 
              position: "right", 
              stopOnFocus: true, 
              style: {
              background: "linear-gradient(to right, #00b09b, #96c93d)",
              },
              onClick: function(){} 
            }).showToast(); 
  }
}
</script>