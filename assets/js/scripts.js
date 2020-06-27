document.getElementById("displayContainer").style.display = "none";
function search(){
    var query = document.getElementById("searchInput").value;
    query = query.trim().toUpperCase();
    var queryLength = query.length;
    var returnElements = '';

    if(queryLength > 0){
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "obd2code.json", true);
        xhr.onload = function(){
            var codes = JSON.parse(this.responseText);
            var numOfReturns = 0;
            // console.log(codes);
            for(var single of codes){
                var substr = single.code.substring(0, queryLength);
                if(query == substr){
                    returnElements += `
                    <button onclick='enterCodeDetails(${single.id})' class = 'invisible_link'>
                        <div class = 'grey_border'>
                            <div class='row'>
                                <div class='col-md-2'>
                                    ${single.code}
                                </div>
                                <div class='col-md-5'>
                                    ${single.description}
                                </div>
                                <div class='col-md-5'>
                                    ${single.meaning}
                                </div>
                            </div>
                        </div>    
                    </button>
                    `;
                    numOfReturns++;
                }
            }
            document.getElementById("displayContainer").style.display = "block";
            if(numOfReturns){
                document.getElementById("displayContainer").innerHTML = returnElements;
            }else{
                document.getElementById("displayContainer").innerHTML = "<p class = 'text-danger text-center'>Sorry, either we don't have any data on this particular OBD2 code, or that is an invalid input.</p>";
            }
        }
        xhr.send();

    }else{
        document.getElementById("displayContainer").style.display = "none";
    }
}

function enterCodeDetails(id){
    localStorage.clear();
    localStorage.setItem('codeId', id);
    location.href = 'code_details.php'
}
