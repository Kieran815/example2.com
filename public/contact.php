<?php

require '../core/processContactForm.php';

//Build the page metadata
$meta = [];
$meta['description'] = "The best thing about hello world is the greeting";
$meta['keywords'] = "hello world, hello, world";

$content = <<<EOT
  <form action="contact.php" method="POST">
    {$message}
    <input type="hidden" name="subject" value="New submission!">
    
    <div class="form-control">
    <label for="name">Name</label>
      <input id="name" type="text" name="name" value="{$valid->userInput('name')}">
      <div class="text-error">{$valid->error('name')}</div>
    </div>
    <div class="form-control">
    <label for="email">Email</label>
      <input id="email" type="text" name="email" value="{$valid->userInput('email')}">
      <div class="text-error">{$valid->error('email')}</div>
    </div>
    <div class="form-control">
    <label for="message">Message</label>
      <textarea id="message" name="message">{$valid->userInput('message')}</textarea>
      <div class="text-error">{$valid->error('message')}</div>
    </div>
    <div class="form-control">
    <input type="submit" value="Send">
    </div>
  </form>
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
EOT;

include '../core/layout.php';

// **** Implementation 1
// Create a RegEx pattern to determine the validity of the use submitted email
// - allow up to two strings with dot concatenation any letter, any case any number with _- before the @
// - require @
// - allow up to two strings with dot concatenation any letter, any case any number with - after the at
// - require at least 2 letters and only letters for the domain
// $validEmail = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";

//Extract $_POST to a data array
// $data = $_POST;

//Create an empty array to hold any error we detect
// $errors = [];

// foreach($data as $key => $value){
//   echo "{$key} = {$value}<br><br>";

//   switch($key){
//     case 'email':
//       if(preg_match($validEmail, $value) !== 1){
//         $errors[$key] = "Please Enter a Valid Email Address.";
//       }
//     break;
//     default:
//       if(empty($value)){
//         $errors[$key] = "Invalid {$key}";
//       }
//     break;
//   }
// }

// var_dump($errors);

//

// Implementation 2
// **** Moved to core/About/src/Validation/Validate.php
// class Validate{

//   public $validation = [];

//   public $errors = [];

//   private $data = [];

//   public function notEmpty($value){

//       if(!empty($value)){
//           return true;
//       }

//       return false;

//   }

//   public function email($value){

//       if(filter_var($value, FILTER_VALIDATE_EMAIL)){
//           return true;
//       }

//       return false;

//   }

//   public function check($data){

//       $this->data = $data;

//       foreach(array_keys($this->validation) as $fieldName){

//           $this->rules($fieldName);
//       }

//   }

//   public function rules($field){
//       foreach($this->validation[$field] as $rule){
//           if($this->{$rule['rule']}($this->data[$field]) === false){
//               $this->errors[$field] = $rule;
//           }
//       }
//   }

//   public function error($field){
//       if(!empty($this->errors[$field])){
//           return $this->errors[$field]['message'];
//       }

//       return false;
//   }

//   public function userInput($key){
//       return (!empty($this->data[$key])?$this->data[$key]:null);
//   }
// }


// **** PRE- processContactForm.php

// // inclued non-vendor files
// require '../core/About/src/Validation/Validate.php';

// // declare included files in Namespace
// use About\Validation;

// // call namespace and invoke method
// $valid = new About\Validation\Validate();

// $args = [
//   'name'=>FILTER_SANITIZE_STRING,
//   'subject'=>FILTER_SANITIZE_STRING,
//   'message'=>FILTER_SANITIZE_STRING,
//   'email'=>FILTER_SANITIZE_EMAIL,
// ];

// $input = filter_input_array(INPUT_POST, $args);

// if(!empty($input)){

//     $valid->validation = [
//         'email'=>[[
//                 'rule'=>'email',
//                 'message'=>'Please enter a valid email'
//             ],[
//                 'rule'=>'notEmpty',
//                 'message'=>'Please enter an email'
//         ]],
//         'name'=>[[
//             'rule'=>'notEmpty',
//             'message'=>'Please enter your first name'
//         ]],
//         'message'=>[[
//             'rule'=>'notEmpty',
//             'message'=>'Please add a message'
//         ]],
//     ];

//     $valid->check($input);

//     if(empty($valid->errors)){
//         $message = "<div class=\"message-success\">Your form has been submitted!</div>";
//         //header('Location: thanks.php');
//     }else{
//         $message = "<div class=\"message-error\">Your form has errors!</div>";
//     }
// }
// ?>

<!-- // <!DOCTYPE html>

// <html>

//   <head>

//     <meta lang='en'>
//     <meta charset="UTF-8">
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//     <meta name="description" content="Kieran Milligan Contact Form Page">
//     <meta name="keywords" content="hello, introduction, intro, full-stack, web developer, full-stack web developer">

//     <link rel="stylesheet" type="text/css" href="./dist/css/main.min.css">

//     <title>Kieran Milligan | Contact Me</title>
  
//   </head>


//   <body>
//     <header>
//       <span class="logo">My Website</span>
//       <a id="toggleMenu">Menu</a>
//       <nav>
//         <ul>
//           <li><a href="index.html">Home</a></li>
//           <li><a href="resume.html">Resume</a></li>
//           <li><a href="contact.html">Contact</a></li>
//         </ul>
//       </nav>
//     </header>
      
//     <main> 

//       <div>
//         <h1>Contact Me!</h1>
//         <p>I would love to discuss how we can work together.</p>
//       </div>

//       <?php echo (!empty($message)?$message:null); ?>

//       <div class="card">
//         <form
//         action="contact.php"
//         method="POST"
//         >
//           <input type="hidden" name="subject" value="New submission!">

//           <div>
//             <label for="name">Name:</label>
//             <br>
//             <input id="name" type="text" name="name" value="<?php echo $valid->userInput('name'); ?>">
//           </div>

//           <div>
//             <label for="email">Email:</label>
//             <br>
//             <input id="email" type="text" name="email" value="<?php echo $valid->userInput('email'); ?>">  
//           </div>

//           <div>
//             <label for="message">Message:</label>
//             <br>
//             <textarea id="message" name="message"><?php echo $valid->userInput('message'); ?></textarea>
//             <div class="text-error">
//               <?php echo $valid->error('message'); ?>
//             </div>
//           </div>

//           <div>
//             Your file:
//             <input type="file" name="upload" accept="image/png, image/jpeg, image/jpg" >
//           </div>

//           <div>
//             <input type="submit" value="Send">
//           </div>
//           <input type="hidden" name="_next" value="//Kieran815.github.io/thanks.html">
//         </form>
//       </div>

//     </main>

//     <script>
//       var toggleMenu = document.getElementById('toggleMenu');
//       var nav = document.querySelector('nav');
//       toggleMenu.addEventListener(
//         'click',
//         function(){
//           if(nav.style.display=='block'){
//             nav.style.display='none';
//           }else{
//             nav.style.display='block';
//           }
//         }
//       );
//     </script>
//   </body>

// </html> -->