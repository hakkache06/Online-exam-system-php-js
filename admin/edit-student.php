<?php
require_once('../assets/constants/config.php');
require_once('constants/check-login.php');

if (isset($_GET['node'])) {

$student_id = $_GET['node'];

$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
    echo "error: " . mysqli_connect_error();
}

    
$stmt = $conn->prepare("SELECT a.*, b.*, c.* FROM tbl_students a LEFT JOIN tbl_departments b ON a.department = b.id LEFT JOIN tbl_classes c ON a.class = c.id WHERE a.id = '$student_id'");
$result = mysqli_query($conn,$stmt);
$rec = mysqli_num_rows($result);

if ($rec < 1) {
    header("location:./");
}

while($row = mysqli_fetch_array($result))
{
    $fname = $row[1];
    $lname = $row[2];
    $email = $row[6];
    $gender = $row[3];
    $dep = $row[10];
    $class = $row[13];

}
}else{
    header("location:./");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OES - Edit <?php print ''.$fname.''.' '.$lname.''; ?></title>
    <link rel="icon" href="../assets/images/favicon.ico">
    <link href="../assets/google-fonts/nunito.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/css/themes/lite-purple.min.css">
    <link rel="stylesheet" href="../assets/styles/vendor/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/styles/vendor/datatables.min.css">

     <script type="text/javascript">
   function update(str)
   {

    var txt;
         var xmlhttp;

      if (window.XMLHttpRequest)
      {
        xmlhttp=new XMLHttpRequest();
      }
      else
      {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }

      xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
          document.getElementById("class-data").innerHTML = xmlhttp.responseText;
        }
      }

      xmlhttp.open("GET","constants/fetch-class.php?opt="+str, true);
      xmlhttp.send();

  }
</script>

</head>

<style>


</style>

<body>
    <div class="app-admin-wrap">
        <div class="main-header">
            <div class="logo">
                <img src="../assets/images/logo.png" alt="">
            </div>

            <div class="menu-toggle">
                <div></div>
                <div></div>
                <div></div>
            </div>

            <div class="d-flex align-items-center">
                <div class="search-bar">
                    <input type="text" placeholder="Search students..">
                    <i class="search-icon text-muted i-Magnifi-Glass1"></i>
                </div>
            </div>

            <div style="margin: auto"></div>

            <div class="header-part-right">

                <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>


                <div class="dropdown">
                    <div class="user colalign-self-end">
                        <?php
                        if ($myvataor == null) {

                        print ' <img class="img-crop" src="../assets/images/blank_avatar.png" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';

                        }else{

                        print ' <img class="img-crop" src="../assets/uploads/avatar/'.$myvataor.'" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';

                        }

                        ?>
                       

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="dropdown-header">
                                <i class="i-Lock-User mr-1"></i> <?php echo $myemail; ?>
                            </div>
                            <a class="dropdown-item" href="account">Account settings</a>
                            <a class="dropdown-item" href="../logout">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="side-content-wrap">
            <div class="sidebar-left open" data-perfect-scrollbar data-suppress-scroll-x="true">
                <ul class="navigation-left">
                    <li class="nav-item" >
                        <a class="nav-item-hold" href="./">
                            <i class="nav-icon i-Bar-Chart"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="departments">
                            <i class="nav-icon i-File"></i>
                            <span class="nav-text">Departments</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="classes">
                            <i class="nav-icon i-Folder-Open"></i>
                            <span class="nav-text">Classes</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="subjects">
                            <i class="nav-icon i-Library"></i>
                            <span class="nav-text">Subjects</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item  active">
                        <a class="nav-item-hold" href="students">
                            <i class="nav-icon i-Administrator"></i>
                            <span class="nav-text">Students</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="exams">
                            <i class="nav-icon i-File-Horizontal-Text"></i>
                            <span class="nav-text">Examinations</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="notice">
                            <i class="nav-icon i-Bell"></i>
                            <span class="nav-text">Notice</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="enroll_numbers">
                            <i class="nav-icon i-File-Clipboard-File--Text"></i>
                            <span class="nav-text">Enroll Numbers</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="school">
                            <i class="nav-icon i-Big-Data"></i>
                            <span class="nav-text">School Info</span>
                        </a>
                        <div class="triangle"></div>
                    </li>

                </ul>
            </div>


            <div class="sidebar-overlay"></div>
        </div>


        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Edit <?php print ''.$fname.''.' '.$lname.''; ?></h1>

            </div>
            <div class="separator-breadcrumb border-top"></div>
             <div class="row mb-4">
                <div class="col-md-12 mb-4">
                
            
                            <br>
                            <div class="mr-3 ml-3">
                             <?php require_once('../assets/constants/check-reply.php') ;?>
                         </div>
                            <div class="tab-content" id="myPillTabContent">
                                <div class="tab-pane fade active show" id="addPIll" role="tabpanel" aria-labelledby="home-icon-pill">
                           <div class="card mb-5">
                            <div class="card-body">
            
                            <form action="app/update-student.php" method="POST" autocomplete="OFF">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">First Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?php echo "$fname"; ?>" required name="fname" class="form-control" id="inputEmail3" placeholder="Enter first name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Last Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?php echo "$lname"; ?>" required name="lname" class="form-control" id="inputEmail3" placeholder="Enter last name">
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email Address</label>
                                    <div class="col-sm-10">
                                        <input type="email" value="<?php echo "$email"; ?>" required name="email" class="form-control" id="inputEmail3" placeholder="Enter email address">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Gender</label>
                                    <div class="col-sm-10">
                                    <label class="radio radio-outline-primary">
                                    <input <?php if ($gender == "Male") { print ' checked '; } ?> type="radio" name="gender" value="Male" required>
                                    <span>Male</span>
                                    <span class="checkmark"></span>
                                    </label>
                                    <label class="radio radio-outline-primary">
                                    <input <?php if ($gender == "Female") { print ' checked '; } ?> type="radio" name="gender" value="Female" required>
                                    <span>Female</span>
                                    <span class="checkmark"></span>
                                    </label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Department</label>
                                    <div class="col-sm-10">
                                        <select onchange="update(this.value)" required name="department" class="form-control" >
                                            <option value=""selected disabled>Select department</option>
                                            <?php
                                            try {
                                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
                                            $stmt = $conn->prepare("SELECT * FROM tbl_departments ORDER BY name");
                                            $stmt->execute();
                                            $result = $stmt->fetchAll();

                                            foreach($result as $row)
                                            {
                                                print '<option'; if ($dep == $row[0]) { print ' selected ';} print ' value="'.$row[0].'">'.$row[1].'</option>';
        
                                            }
                      
                                            }catch(PDOException $e)
                                            {
                                            echo "Connection failed: " . $e->getMessage();
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Class</label>
                                    <div class="col-sm-10">
                                        <select required id="class-data" name="class" class="form-control" >
                                            <?php
                                            try {
                                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
                                            $stmt = $conn->prepare("SELECT * FROM tbl_classes WHERE department = :dep ORDER BY name");
                                            $stmt->bindParam(':dep', $dep);
                                            $stmt->execute();
                                            $result = $stmt->fetchAll();

                                            foreach($result as $row)
                                            {
                                                print '<option'; if ($class == $row[0]) { print ' selected ';} print ' value="'.$row[0].'">'.$row[1].'</option>';
        
                                            }
                      
                                            }catch(PDOException $e)
                                            {
                                            echo "Connection failed: " . $e->getMessage();
                                            }
                                            ?>

                                        </select>
                                        <input type="hidden" name="studentid" value="<?php echo $student_id; ?>">
                                    </div>
                                </div>
     
  
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
                            </form></div>
                 
                    </div>
                                </div>

           
                            </div>

                </div>


            </div>

            <div class="flex-grow-1"></div>
            <div class="app-footer">
                <div class="row">
                    <div class="col-md-9">
                        <p><strong>Online Examination System</strong></p>
                    </div>
                </div>
                <div class="footer-bottom border-top pt-3 d-flex flex-column flex-sm-row align-items-center">
                    <div class="d-flex align-items-center">
                        <img class="logo" src="../assets/images/logo.png" alt="">
                        <div>
                            <p class="m-0">&copy; <?php echo date('Y'); ?> Developed By <a href="https://www.instagram.com/beatsbybwire/" class="text-muted" >Bwire  Mashauri</a></p>
                            <p class="m-0">All rights reserved</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="search-ui">
        <div class="search-header">
            <img src="assets/images/logo.png" alt="" class="logo">
            <button class="search-close btn btn-icon bg-transparent float-right mt-2">
                <i class="i-Close-Window text-22 text-muted"></i>
            </button>
        </div>
        <form action="search" method="GET" autocomplete="OFF">
        <input type="text" name="keyword" required  placeholder="first name OR last name" class="search-input" autofocus>
        </form>

    </div>

    <script src="../assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/vendor/perfect-scrollbar.min.js"></script>

    <script src="../assets/js/vendor/datatables.min.js"></script>
    <script src="../assets/js/es5/script.min.js"></script>
    <script src="../assets/js/datatables.script.js"></script>

</body>


</html>