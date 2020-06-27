<?php include("./assets/inc/header.php")?>
<div style = "background-image: url(./assets/img/engine.jpg); height: 650px; background-size: cover">
    <div style="height: 650px; background-color: rgba(0, 0, 0, 0.4);" >
        <nav class = "navbar navbar-expand-md navbar-dark">
            <a class = "navbar-brand" href = "index.php">Appointment Booking</a>
        </nav>
        <!-- <div class="margin_100"></div> -->
        <div class = "container">
            <div class="row justify-content-md-center">
                <div class="col-md-6 booking_form">
                    <b>ERROR CODE DETAILS</b>
                    <div class = "row">
                        <div class = "grey_border">
                            <b>Code: </b>
                            <span id="errorCode"></span>
                        </div>  
                        <div class = "grey_border">
                            <b>Description: </b>
                            <span id="errorDescription"></span>
                        </div>  
                        <div class = "grey_border">
                            <b>Meaning: </b>
                            <span id="errorMeaning"></span>
                        </div>  
                        <div class = "grey_border">
                            <b>Main Symptoms: </b>
                            <br>
                            <ul id="mainSymptoms"></ul>
                        </div>  
                        <div class = "grey_border">
                            <b>Possible Causes: </b>
                            <br>
                            <ul id="possibleCauses"></ul>
                        </div>  
                        <div class = "grey_border">
                            <b>Diagnostic Steps: </b>
                            <br>
                            <ul id="diagnosticSteps"></ul>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<script type = "text/javascript">
    var codeId = localStorage.getItem("codeId");
    
    var eD = new XMLHttpRequest();
    eD.open("GET", "obd2code.json", true);
    eD.onload = function(){
        var errors = JSON.parse(this.responseText);
        var errorDetails = undefined;
        for(error of errors){
            if(error.id == codeId){
                errorDetails = error;
            }
        }
        if(errorDetails == undefined){
            location.href = "index.php";
        }else{
            document.getElementById("errorCode").innerHTML = errorDetails.code;
            document.getElementById("errorDescription").innerHTML = errorDetails.description;
            document.getElementById("errorMeaning").innerHTML = errorDetails.meaning;
            var mainSymptoms = "";
            for(symptom of errorDetails.main_symptoms){
                mainSymptoms += `<li>${symptom}</li>`;
            }
            document.getElementById("mainSymptoms").innerHTML = mainSymptoms;
            var possibleCauses = "";
            for(cause of errorDetails.possible_causes){
                possibleCauses += `<li>${cause}</li>`;
            }
            document.getElementById("possibleCauses").innerHTML = possibleCauses;
            var diagnosticSteps = "";
            for(steps of errorDetails.diagnostic_steps){
                diagnosticSteps += `<li>${steps}</li>`;
            }
            document.getElementById("diagnosticSteps").innerHTML = diagnosticSteps;
        }
    }
    eD.send();
</script>
<?php include("./assets/inc/footer.php");?>
