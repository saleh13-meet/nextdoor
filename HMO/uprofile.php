<?php

session_start();

include 'functions.php';

connect();

if (!logged_in()) {
    header("location:logout.php");
}else{
    $id = $_GET['id'];
    $arr = all_info($id);
    header1("profile");

?>
    <div class="container-fluid">
        <div class="row center">
            <div class="col-sm-12">
                <div class="over"></div>
                    <img class="cover" src="images/profile/<?php echo $arr['img']; ?>">
            </div>
        </div>
    </div>
    <h2 class="prof">
        <span class="name"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $arr['firstname']." ".$arr['lastname']; ?></span>
    </h2>
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="background-color: #F9F5EF; padding: 5%; margin-top: 20px;">
                Vestibulum id gravida nunc. Ut venenatis, sapien a maximus vestibulum, tortor justo ultricies ligula, id egestas ipsum metus a nunc. Suspendisse ultricies porttitor ex. Mauris sed ante viverra, feugiat massa non, hendrerit est. Phasellus at iaculis metus. Nunc posuere justo eget lorem mollis, non facilisis risus luctus. Proin dapibus ullamcorper suscipit. Vivamus vel vulputate sem, non accumsan sem. Fusce volutpat metus dignissim finibus pulvinar. Donec gravida maximus elit, id fermentum est varius ullamcorper. Vestibulum dolor libero, tristique vitae risus non, scelerisque sollicitudin nisl. Nulla egestas nibh et nunc euismod eleifend. Cras ex metus, luctus sed cursus at, commodo id elit. Nullam a nibh congue, dictum urna sit amet, tempus lacus. Duis volutpat orci vel euismod volutpat. Vestibulum ac mattis elit.
            </div>
        </div>
    </div>
    <h2 class="prof">
        <span class="name"><span class="glyphicon glyphicon-education" aria-hidden="true"></span> Education Level</span>
    </h2>
    <div class="container" style="background-color: #F9F5EF; padding: 5%; margin-top: 20px;">
        <div class="row">
            <div class="col-md-12">
                <?php echo $arr['ed_level']; ?>
            </div>
        </div>
    </div>
    <h2 class="prof">
        <span class="name"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Short bio</span>
    </h2>
    <div class="container" style="background-color: #F9F5EF; padding: 5%; margin-top: 20px; margin-bottom: 5%;">
        <div class="row">
            <div class="col-md-12">
                <?php echo $arr['bio']; ?>
            </div>
        </div>
    </div>


<script type="text/javascript" src="java/jquery-1.11.2.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    
});
</script>
</body>
</html>

<?php

}

?>