<?php
require '../core/About/src/Validation/Validate.php';
include '../vendor/autoload.php';
require '../config/keys.php';
use About\Validation;

$message = null;
$valid = new About\Validation\Validate();

$args = [
  'name'=>FILTER_SANITIZE_STRING,
  'email'=>FILTER_SANITIZE_EMAIL,
  'subject'=>FILTER_SANITIZE_STRING,
  'message'=>FILTER_SANITIZE_STRING
];
$input = filter_input_array(INPUT_POST, $args);

if(!empty($input)){
  $valid->validation = [
    'email'=>[[
      'rule'=>'email',
      'message'=>'Please enter a valid email'
    ],[
      'rule'=>'notEmpty',
      'message'=>'Please enter an email'
    ]],
    'name'=>[[
      'rule'=>'notEmpty',
      'message'=>'Please enter your first name'
    ]],
    'message'=>[[
      'rule'=>'notEmpty',
      'message'=>'Please add a message'
    ]],
  ];

  $valid->check($input);

  if(empty($valid->errors)){
    header('LOCATION: thanks.php');
  }else{
    $message = "<div class=\"alert alert-danger\">Your form has errors!</div>";
  }
}

  // if(empty($valid->errors)){

  // # Instantiate the client.
  // $mgClient = Mailgun::create(MG_KEY,MG_API); //MailGun key 
  // $domain = MG_DOMAIN; //API Hostname
  // $from = "Mailgun Sandbox <postmaster@{$domain}>";

  // # Make the call to the client.
  // $result = $mgClient->messages()->send(
  //   $domain,
  //   array (  
  //       'from'    => "{$input['name']} <{$input['email']}>",      
  //       'to'      => 'Kieran Milligan <kieran.milligan@gmail.com>',
  //       'subject' => 'Mailgun Submission',
  //       'text'    => $input['message']
  //   )
  // );

  // /* Use To Show Input When Needed
  // var_dump($result);
  // */

  // $message = "<div class=\"message-success\">Your form has been submitted!</div>";
  // }else{
  //   $message = "<div class=\"message-error\">Your form has errors!</div>";
  // }
