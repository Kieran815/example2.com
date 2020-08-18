<?php
require '../core/About/src/Validation/Validate.php';
include '../vendor/autoload.php';
require '../config/keys.php';
use About\Validation;

$valid = new About\Validation\Validate();

$filters = [
  'title'=>FILTER_SANITIZE_STRING, //strips HMTL
  'meta_description'=>FILTER_SANITIZE_STRING, //strips HMTL
  'meta_keywords'=>FILTER_SANITIZE_STRING, //strips HMTL
  'body'=>FILTER_UNSAFE_RAW  //NULL FILTER
];
$input = filter_input_array(INPUT_POST, $filters);

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
    $message = "<div class=\"message-success\">Your post has been submitted!</div>";
  }else{
    $message = "<div class=\"message-error\">Your form has errors!</div>";
  }
}
?>