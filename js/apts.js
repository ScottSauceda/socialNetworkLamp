// function runs when user submits Member Join form. It compares the 2 passwords the user entered to see if they match
function validatePasswords() {
    // get the 2 passwords entered by the user
    const pswd = document.getElementById('pswd').value;
    const pswd2 = document.getElementById('pswd2').value;

    // console.log(pswd);
}


document.getElementById('submitComment').addEventListener('click', function(event){
    event.preventDefault();
});
function ajaxAddComment() {
    var comment = document.forms["form1"]["comment"].value;
    var user = document.forms["form1"]["user"].value;
    var commenterID = document.forms["form1"]["commenterID"].value;
    var blogID = document.forms["form1"]["blogID"].value;

    var htmlID = "commentsDiv";

    // Check to see if id = user is not an empty string
    var user = document.forms["form1"]["user"].value;
    if(user == ""){
        window.location = "http://localhost:8888/socialnetworkLAMP/login.php";
    } else {
        // new code
        
        var xhrC = new XMLHttpRequest();
            xhrC.onreadystatechange = function(){
                // check if the data is loaded
                if(xhrC.readyState == 4 && xhrC.status == 200){
                    // do something with the loaded data
                    // htmlObj = document.getElementById(htmlID) 
                    // htmlObj.innerHTML = xhrC.responseText +  htmlObj.innerHTML;
                    location.reload();
                } // end if
            } // end onreadystatechange
            xhrC.open("GET", "commentsAjaxProc.php?user=" + user + "&commenterID=" + commenterID + "&blogID=" + blogID + "&comment=" + comment, true);
            xhrC.send(); // send the request for data
    }
}



function thumbVote(thumbNum, commentID){
    var htmlID = "";
    if(thumbNum == 1){
        htmlID = "up" + commentID; // example: up12
    } else {
        htmlID = "down" + commentID; // example down7
    }
    var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            // check if the data is loaded
            if(xhr.readyState == 4 && xhr.status == 200){
                // do something with the loaded data
                document.getElementById(htmlID).innerHTML = xhr.responseText;
            } // end if
        } // end onreadystatechange
        xhr.open("GET", "blogVoteProc.php?thumbNum=" + thumbNum + "&commentID=" + commentID, true);
        xhr.send(); // send the request for data
}// end function

function toggleEdit(commentID){
    console.log("toggleEdit")

    var formElem = "form" + commentID;
    var btnElem = "button" + commentID;

    // grab boxes and the Edit button
    const editForm = document.getElementById(formElem);
    const editBtn = document.getElementById(btnElem);

    // console.log(commentID)
    
    if(editBtn.innerHTML == "Edit"){
        // console.log("editBtn TOGGLE")
        editBtn.innerHTML = "Cancel";
        editForm.style.display = "block";
    } else {
        editBtn.innerHTML = "Edit";
        editForm.style.display = "none";
    }


}// end function

document.getElementById('submitEdit').addEventListener('click', function(event){
    event.preventDefault();
});

function editComment(){
    console.log("editCommentHere 1")
    var comment = document.forms["form2"]["comment"].value;
    var commentID = document.forms["form2"]["commentID"].value;
    var commentText = "text" + commentID;
    console.log(comment);
    console.log(commentID);
    console.log(commentText);

    var xhr = new XMLHttpRequest();
    console.log("editCommentHere 2")
        xhr.onreadystatechange = function(){
            // check if the data is loaded
            if(xhr.readyState == 4 && xhr.status == 200){
                console.log("editCommentHere 3")
                // do something with the loaded data
                document.getElementById(commentText).innerHTML = xhr.responseText;
                // console.log(responseText);
                // console.log("editCommentHere 4")
            } // end if
        } // end onreadystatechange
        xhr.open("GET", "editCommentProc.php?commentID=" + commentID + "&comment=" + comment, true);
        xhr.send(); // send the request for data
}// end function

function deleteComment(commentID){
    var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            // check if the data is loaded
            if(xhr.readyState == 4 && xhr.status == 200){
                // do something with the loaded data
                location.reload();
            } // end if
        } // end onreadystatechange
        xhr.open("GET", "deleteCommentProc.php?commentID=" + commentID, true);
        xhr.send(); // send the request for data
}// end function
