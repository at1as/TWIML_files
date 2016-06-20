<!-- 
  Forward SMS to number passed PhoneNumber param
  If To and From numbers are identical, parse message body
  for the number to send to (enabling replies from destination address)
-->
<?php
  header('Content-Type: text/html');
?>
<Response>
  <? if $_REQUEST['From'] != $_REQUEST['To'] ?>
    <Message to="<?=$_REQUEST['PhoneNumber']?>">
      <?=htmlspecialchars(substr($_REQUEST['From'] . ": " . $_REQUEST['Body'], 0, 1600))?>
    </Message>
  <? else ?>
    <!-- SMS Message body should be formatted as "+15555555555 hello world!" -->
    <? $msg_contents = split(" ", _REQUEST['Body'], 2) ?>
    <? $to_num = $msg_contents[0] ?>
    <? $body = end($msg_contents) ?>
    <Message to="<?=$to_num?>">
      <?=htmlspecialchars(substr($body, 0, 1600)) ?>
    </Message>
  <? endif ?>
</Response>
