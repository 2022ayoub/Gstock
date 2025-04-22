<?php 
include("../config/connect.php");
include("../model/client/getClient.php");
include("./head.php");

if(!empty($_GET["id"])){
  $client=getClient($conn,$_GET["id"]);
}
?>
<div class="home-content">
  <div class="overview-boxes">
    <div class="box">
      <form action="<?= !empty($_GET["id"]) ? "../model/client/updateClient.php" : "../model/client/addClient.php" ?>" method="post">

        <input type="hidden" name="id" id="id" value="<?= $client["id"] ?>">

        <label for="first_name">First Name :</label>
        <input type="text" name="firstName" id="first_name" placeholder="Write the client first name" 
            value="<?= !empty($_GET["id"])? $client["firstName"] : "" ?>">
        

      

        <label for="last_name">Last Name :</label>
        <input type="text" name="lastName" id="last_name" placeholder="Write the client last name"
          value="<?= !empty($_GET["id"])? $client["lastName"] : "" ?>" >

        <label for="phone">Phone Number :</label>
        <input type="text" name="phone" id="phone" placeholder="Write the phone number "
          value="<?= !empty($_GET["id"])? $client["phone"] : "" ?>" >

        <label for="adresse">Addresse :</label>
        <input type="text" name="adresse" id="adresse" placeholder="write the client addresse "
          value="<?= !empty($_GET["id"])? $client["adresse"] : "" ?>">

        <div class="btns">
          <button type="submit" id="save-article">Save</button>
          <button type="reset" style="background-color:red">Clear</button>
        </div>
      </form>
    </div>
    
    <div class="box client">
      <table class="mtable">
        <tr>
          <th>First Name </th>
          <th>Last Name </th>
          <th>Phone Number </th>
          <th>Addresse </th>
          <th>Action</th>
        </tr>

        <?php 
          $clients=getClients($conn);
          if(!empty($clients) && is_array($clients)):foreach($clients as $key=>$val):
        ?>
        
        <tr>
          <td><?php echo $val["firstName"] ?></td>
          <td><?php echo $val["lastName"] ?></td>
          <td><?php echo $val["phone"] ?></td>
          <td><?php echo $val["adresse"] ?></td>
          <td><a href="?id=<?=$val["id"]?>"><i class='bx bx-edit-alt' style="font-size:30px" ></i></a></td>
          <!-- <box-icon type='solid' name='edit-alt'></box-icon> -->
        </tr>

        <?php
          endforeach;
          endif;
        ?>
      </table>

    </div>
  </div>


  <?php if(!empty($_SESSION["message"]["text"])): ?>
    <div id="form-msg" class="alert <?php echo $_SESSION["message"]["type"] ?>">
      <?php echo $_SESSION["message"]["text"] ?>
    </div>

    <script>
      let formMSG = document.getElementById("form-msg");
      formMSG.style.display = "block";
      setTimeout(() => {
        formMSG.style.display = "none";
      }, 5000);
    </script>

    <?php unset($_SESSION["message"]); ?>
  <?php endif; ?>



</div>
</section>




<?php include("./foot.php") ?>