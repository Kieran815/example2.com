<?php

//Create a RegEx pattern to determine the validity of the use submitted email
// - allow up to two strings with dot concatenation any letter, any case any number with _- before the @
// - require @
// - allow up to two strings with dot concatenation any letter, any case any number with - after the at
// - require at least 2 letters and only letters for the domain
$validEmail = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";

//Extract $_POST to a data array
$data = $_POST;

//Create an empty array to hold any error we detect
$errors = [];

foreach($data as $key => $value){
  echo "{$key} = {$value}<br><br>";

  switch($key){
    case 'email':
      if(preg_match($validEmail, $value) !== 1){
        $errors[$key] = "Please Enter a Valid Email Address.";
      }
    break;
    default:
      if(empty($value)){
        $errors[$key] = "Invalid {$key}";
      }
    break;
  }
}

var_dump($errors);

?>

<!DOCTYPE html>

<html>

  <head>

    <meta lang='en'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kieran Milligan Contact Form Page">
    <meta name="keywords" content="hello, introduction, intro, full-stack, web developer, full-stack web developer">
    <link rel="stylesheet" type="text/css" href="./dist/css/main.min.css">

    <title>Kieran Milligan | Contact Me</title>
  
  </head>


  <body>
    <header>
      <span class="logo">My Website</span>
      <a id="toggleMenu">Menu</a>
      <nav>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="resume.html">Resume</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </nav>
    </header>
      
    <div>    
      <div>
        <h1>Contact Me!</h1>
        <p>I would love to discuss how we can work together.</p>
      </div>

      <div class="card">
        <form
        action="contact.php"
        method="POST"
        >
          <input type="hidden" name="subject" value="New submission!">

          <div>
            <label for="name">Name:</label>
            <br>
            <input id="name" type="text" name="name">
          </div>

          <div>
            <label for="email">Email:</label>
            <br>
            <input id="email" type="text" name="email">  
          </div>

          <div>
            <label for="message">Message:</label>
            <br>
            <textarea id="message" name="message" width=50 height=4 placeholder="How can I help you?"></textarea>
          </div>

          <div>
            Your file:
            <input type="file" name="upload" accept="image/png, image/jpeg, image/jpg" >
          </div>

          <div>
            <input type="submit" value="Send">
          </div>
          <input type="hidden" name="_next" value="//Kieran815.github.io/thanks.html">
        </form>
      </div>
    </div>

    <script>
      var toggleMenu = document.getElementById('toggleMenu');
      var nav = document.querySelector('nav');
      toggleMenu.addEventListener(
        'click',
        function(){
          if(nav.style.display=='block'){
            nav.style.display='none';
          }else{
            nav.style.display='block';
          }
        }
      );
    </script>
  </body>

</html>