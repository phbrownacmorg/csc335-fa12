<?php 

// Following http://stackoverflow.com/questions/9132144/how-can-i-automatically-deploy-my-app-after-a-git-push-github-and-node-js

try
{
  $payload = json_decode($_REQUEST['payload']);
}
catch(Exception $e)
{
  exit(0);
}

//log the request
file_put_contents('logs/github.txt', print_r($payload, TRUE), FILE_APPEND);


if ($payload->ref === 'refs/heads/master')
{
  // path to your site deployment script
  exec('/usr/bin/git pull -u https://github.com/phbrownacmorg/csc335-fa12.git');
}
?>