<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Footer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body >
    <div id="page-container">
        <div id="content-wrap ">
          <footer >
            <div class="footer bootstrap text-dark text-center py-3">
              <!--<a class="text-dark px-2" href="index.php">Home</a>
              <a class="text-dark px-2" href="#">About</a>
              <a class="text-dark px-2" href="#">Privacy & Policy</a>-->
              <!-- <p id="p-foot"> | Copyright &copy;  <a class="links" href="index.php">MyWebsite.com</a> |</p> -->
              <p id="p-foot"></p>
              
              <p>Developped by<a href=""> <b> Elb Co. Inc.</b> </a></p>
            </div>

          </footer>
           <button type="submit" name="modify" id="modify" class="btn btn-outline-info form-control rounded-pill" disabled>
                        <i class="fa fa-edit" style="margin-right: 3px"></i> 
                       
                  <div class="block block-menu block--none">

                  <div class="block__content">
                    <ul class="menu nav"><li class="first last leaf menu-link-contact"><a href="m_contact.php"></a></li>
                       </ul>  
</div>

                    </button> 
        </div>
    </div>

    <script>
      let year = new Date().getFullYear();
      document.getElementById('p-foot').innerHTML=`Copyright &copy ${year} <a href="https://www.soussmassa.ma/" target="_blank" >www.soussmassa.ma</a>`;
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

</body>
</html>
