<?php 
    include("./assets/inc/header.php");
?>
<div style = "background-image: url(./assets/img/engine.jpg); height: 650px; background-size: cover">
    <div style="height: 650px; background-color: rgba(0, 0, 0, 0.4);" >
        <nav class = "navbar navbar-expand-md navbar-dark">
            <a href="index.php" class = "navbar-brand">Car Fault Detection</a>
            <button type="button" class = "navbar-toggler" data-toggle="collapse" data-target = "#navbarCollapse">
                <span class = "navbar-toggler-icon"></span>
            </button>
        </nav>

        <div class = "container">
            <div class="row">
                <div class="col-md-12">
                    <form class = "booking_form text-center margin_100"> 
                        <div class="row">
                            <div class="col-12">
                                <input type="text" class = "search_input_field" placeholder = "ENTER THE OBD2 ERROR CODE." oninput = "search()" id="searchInput">
                            </div>
                        </div>
                        <!-- <hr> -->
                                        
                    </form>
                    <div class="grey_border" id="displayContainer">
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<?php include("./assets/inc/footer.php");?>
