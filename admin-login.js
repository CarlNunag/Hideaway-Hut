function validate(){
        var password = document.getElementById("userID").value;
        
        if ( password == "HideawayHut2022"){
            window.location = "admin-dashboard.php";
            return false;
        }
}