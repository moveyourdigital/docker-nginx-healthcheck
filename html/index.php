<html>
  <head>
    <title>Welcome</title>
  </head>
  <body>
    <p>
      Date: <?php echo (new DateTime())->format(DateTime::ISO8601); ?>
      <br />
      Hostname: <?php echo gethostname(); ?>
    </p>
    <p>
      URI: <?php echo $_SERVER['REQUEST_URI'] ?>
    </p>
  </body>
</html>