<?php
require '../core/functions.php';
$meta=[];
$meta['title']='My Website';
$meta['description']='Stuff about me';

$content = <<<EOT
  <main>
    <div class="jumbotron">
      <h1>Hello, I am Kieran.</h1>
      <p class="lead">I build things and I do stuff.</p>
    </div>
    <div>
      <img class="avatar" src="https://www.gravatar.com/avatar/4678a33bf44c38e54a58745033b4d5c6?d=mm&s=64" alt="Kieran Milligan Pic">
      <p>After 20 years in Sales, it was time for something different. I began coding at the beginning of 2019 and have fallen in love. After 18 months of self-study, I have taken the jump and enrolled in MicroTrain's Agile Web Development Bootcamp. I am committed to becoming a Professional Web Developer. I started out making some pretty cool front-end apps with React, then started learning Gatsby. I mostly deploy with Firebase and have recently started learning how to deploy to Amazon Web Services. I love to rock a good JAM stack.</p>
    </div>
  </main>
EOT;

require '../core/layout.php';





