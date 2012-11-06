<?php 
try
{
  $payload = json_decode($_REQUEST['payload']);
}
catch(Exception $e)
{
  exit(0);
}

//log the request
file_put_contents('/tmp/github.txt', print_r($payload, TRUE));
//file_put_contents('/tmp/logs-github.txt', print_r($payload, TRUE), FILE_APPEND);

if ($payload->ref === 'refs/heads/master')
{
  file_put_contents('/tmp/logs-github.txt', 'Pulling: ', FILE_APPEND);
  // path to your site deployment script
  file_put_contents('/tmp/logs-github.txt', shell_exec('git pull'), FILE_APPEND);
}
?>

