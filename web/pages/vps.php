
<form action="pages/backend/request.php" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" method="POST">
 <input type="hidden" name="request" value="vps">
 <input type="hidden" name="user" value="001">
 
<?php
$string = base64_encode(random_bytes(10));
echo '<input type="hidden" name="string" value="'.$string.'">';
?>   
<h2 class="w3-center">Request VPS</h2>
 
<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="tag" type="text" placeholder="Instance name">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
        <input class="w3-input w3-border" placeholder="" type="file" name="key">Your PUB key</input>
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
    <div class="w3-rest">
  <select class="w3-select w3-border" name="size">
    <option value="" disabled selected>Choose size</option>
    <option value="t2.micro">Micro - 1 CPU / 1 GB RAM</option>
    <option value="2" disabled>xxx</option>
    <option value="3" disabled>xxx</option>
  </select>
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-phone"></i></div>
    <div class="w3-rest">
  <select class="w3-select w3-border" name="image">
    <option value="" disabled selected>Choose distribution</option>
    <option value="ami-077a5b1762a2dde35">Ubuntu 18</option>
    <option value="2" disabled>xxx</option>
    <option value="3" disabled>xxx</option>
  </select>
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-pencil"></i></div>
    <div class="w3-rest">
    <select class="w3-select w3-border" name="region">
    <option value="" disabled selected>Choose region</option>
    <option value="eu-west-2">EU west</option>
    <option value="2">EU east</option>
    <option value="3">Ireland</option>
  </select>
    </div>
</div>

<button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Send</button>

</form>

