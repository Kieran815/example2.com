<!-- Set session in php -->
<?php
function active($name){
  $current = $_SERVER['REQUEST_URI'];
  if($current === $name){
    return 'active';
  }

  return null;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Add sanitized content -->
    <?php if(!empty($meta)): ?>

    <?php if(!empty($meta['title'])): ?>
      <title><?php echo $meta['title']; ?></title>
    <?php endif; ?>

    <?php if(!empty($meta['description'])): ?>
      <meta name="description" content="<?php echo $meta['description']; ?>">
    <?php endif; ?>

    <?php if(!empty($meta['keywords'])): ?>
      <meta name="keywords" content="<?php echo $meta['keywords']; ?>">
    <?php endif; ?>

    <?php endif; ?>
<!-- End sanitized content -->

    <meta charset="UTF-8">
    <title>Kieran Milligan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/dist/main.css">
  </head>
  <body>

    <div id="Wrapper">
      <nav class="top-nav">
        <a href="index.html" class="pull-left" href="/">Site Logo</a>
        <ul role="navigation">
          <li><a href="index.html">Home</a></li>
          <li><a href="resume.html">Resume</a></li>
          <li><a href="contact.php">Contact</a></li>
          <!-- Site Registration -->
          <li class="nav-item">
            <a class="nav-link" href="/logout.php">Logout</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/register.php">Register</a>
          </li>
        </ul>
      </nav>

      <div class="row">
        <div id="Content">
          <?php echo $content; ?>
        </div>
        <div id="Sidebar">
          <div id="AboutMe">
            <div class="header">Hello, I am Kieran Milligan</div>
            <img src="https://www.gravatar.com/avatar/4678a33bf44c38e54a58745033b4d5c6?d=mm" alt="My Avatar" class="img-circle">
          </div>
        </div>
      </div>

      <div id="Footer" class="clearfix">
        <small>&copy; 2017 - Kieran M. Miligan</small>
        <ul role="navigation">
          <li><a href="terms.html">Terms</a></li>
          <li><a href="privacy.html">Privacy</a></li>
        </ul>
      </div>
    </div>

  </body>

</html>