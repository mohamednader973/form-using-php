
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Form</title>
  </head>
  <body>
    <h1>Registration from for AAST</h1>
    <h3>fields marked with <span style="color:red;">*</span> are mandatory</h3>
    <form action = "<?php $_PHP_SELF ?>" method = "POST">
      <table>
        <tr>
          <td>
            <label for="name">Name:</label>
          </td>
          <td>
            <input type = "text" name = "name"/>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
              $regexE='/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
              if (empty($_POST['name'])) {
              echo "<span style=\"color:red;\">Name is a mandatory field</span>";
              }
              elseif (!preg_match("/^[a-zA-Z]+/",$_POST['name'])) {
                echo "<span style=\"color:red;\">Name should be alphabetically</span>";
              }
            }
             ?>
          </td>
        </tr>
        <tr>
          <td><label for="email">Email:</label></td>
          <td>
            <input type = "text" name = "Email" />
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $regey = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
            if (empty($_POST['Email'])) {
            echo "<span style=\"color:red;\">Email is a mandatory field</span>";
            }
            elseif (!preg_match($regey, $_POST['Email'])) {
              echo "<span style=\"color:red;\">Email isn't correct</span>";
            }
          }
             ?>
          </td>
        </tr>
        <tr>
          <td><label for="group">Group#</label></td>
          <td><input type = "text" name = "group" /></td>
        </tr>
        <tr>
          <td><label for="classdetails">class details:</label></td>
          <td><textarea name="txarea" rows="8" cols="80"></textarea></td>
        </tr>
        <tr>
          <td><label for="gender">Gender:</label></td>
          <td>
            <input type="radio" id="male" name="gender" value="Male">
            <label for="html">Male</label>
            <input type="radio" id="femal" name="gender" value="Female">
            <label for="html" style="padding-right:1rem;">Female</label>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if(!isset( $_POST["gender"])){
              echo"<span style=\"color:red;\">gender field is mandatory</span>";
            }
          }
             ?>
          </td>
        </tr>
        <tr>
          <td><br></td>
          <td><br></td>
        </tr>
        <tr>
          <td><label for="courses">Select Courses</label></td>
          <td>
            <select name="course[]" id='course_list' size="5" multiple='multiple'>
             <option value="PHP">PHP</option>
             <option value="JavaScript">JavaScript</option>
             <option value="Mysql">Mysql</option>
             <option value="HTML">HTML</option>
             <option value="CSS">CSS</option>
             <option value="Apache">Apache</option>
             <option value="Laravel">Laravel</option>
            </select>
          </td>
        </tr>
        <tr>
          <td><br></td>
          <td><br></td>
        </tr>
        <tr>
          <td><label for="age">Agree</label></td>
          <td><input type="checkbox" id="agree" name="agree" value="I agree to terms">
            <label for="html" style="padding-right:1rem;">I agree to terms</label>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if( !isset( $_POST["agree"])) {
              echo "  "."<span style=\"color:red;\">you have to agree with the terms</span>";
           }
         }
             ?>
          </td>

        </tr>
        <tr>
          <td><br></td>
          <td><br></td>
        </tr>
        <tr>
          <td><input type = "submit" /></td>
        </tr>
      </table>
    </form>
  </body>

  <?php
  #2
  //post method
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
      $name = $_POST['name'];
      if (!empty($name) && preg_match("/^[a-zA-Z]+/",$_POST['name'] ) ) {
        echo "name is"." ".$name;
        echo "<br>";
      }
      // elseif (empty($name)) {
      //   echo "name is a mandatory field<br>";
      // }
      // elseif (!preg_match("/^[a-zA-Z]+/",$_POST['name'] )) {
      //   echo "name should be alphabetically<br>";
      // }

      $email=$_POST['Email'];
      $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
      if (preg_match($regex, $email) && !empty($email)) {
        echo "email is"." ".$email;
        echo "<br>";
      }

      // elseif (empty($email)) {
      // echo "Email is a mandatory field<br>";
      // }
      // elseif (!preg_match($regex, $email)) {
      //   echo "Email isn't correct<br>";
      // }
      $groupnumber=$_POST['group'];
      if (!empty($groupnumber)) {
        echo "group number is ".$groupnumber;
        echo "<br>";
      }
      $courseDetails=$_POST['txarea'];
      if (!empty($courseDetails)) {
        echo"course details: ".$courseDetails;
        echo "<br>";
      }
      //here

      if( isset( $_POST["gender"])) {
        echo "Gender:".$_POST["gender"];
        echo "<br>";
     }
     // else{
     //   echo"gender field is mandatory<br>";
     // }

     if( isset( $_POST["course"])) {
       echo "Your courses are ";
       foreach ($_POST["course"] as $kurs)
       {
         echo $kurs." ";
       }
       echo "<br>";
    }

    if( isset( $_POST["agree"])) {
      echo "you agreed the terms";
      echo "<br>";
   }
   // else {
   //   echo "you should agree with our terms";
   //   echo "<br>";
   // }

  }
  ?>
</html>
