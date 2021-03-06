
 document.getElementById('submitComment').addEventListener('click', function(event){
    event.preventDefault();
});

function ajaxAddComment() {
    var comment = document.forms["form1"]["comment"].value;
    var user = document.forms["form1"]["user"].value;
    var commenterID = document.forms["form1"]["commenterID"].value;
    var blogID = document.forms["form1"]["blogID"].value;


    // Check to see if id = user is not an empty string
    var user = document.forms["form1"]["user"].value;
    if(user == ""){
        window.location = "https://socialnetwork-lamp.herokuapp.com/login.php";
    } else {
        // new code
        
        var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function(){
                // check if the data is loaded
                if(xhr.readyState == 4 && xhr.status == 200){
                    // do something with the loaded data
                    location.reload();
                } // end if
            } // end onreadystatechange
            xhr.open("GET", "https://socialnetwork-lamp.herokuapp.com/commentsAJAXProc.php?user=" + user + "&commenterID=" + commenterID + "&blogID=" + blogID + "&comment=" + comment, true);
            xhr.send(); // send the request for data
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
        xhr.open("GET", "https://socialnetwork-lamp.herokuapp.com/blogVoteProc.php?thumbNum=" + thumbNum + "&commentID=" + commentID, true);
        xhr.send(); // send the request for data
}// end function


function toggleEdit(commentID){

    var formElem = "form" + commentID;
    var btnElem = "button" + commentID;

    // grab boxes and the Edit button
    const editForm = document.getElementById(formElem);
    const editBtn = document.getElementById(btnElem);

    
    if(editBtn.innerHTML == "Edit"){
        editBtn.innerHTML = "Cancel";
        editForm.style.display = "block";
    } else {
        editBtn.innerHTML = "Edit";
        editForm.style.display = "none";
    }

    document.getElementById('submitEdit').addEventListener('click', function(event){
        event.preventDefault();
    });

}// end function


function editComment(){
    var comment = document.forms["form2"]["comment"].value;
    var commentID = document.forms["form2"]["commentID"].value;
    var commentText = "text" + commentID;


    var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            // check if the data is loaded
            if(xhr.readyState == 4 && xhr.status == 200){
                // do something with the loaded data
                document.getElementById(commentText).innerHTML = xhr.responseText;
            } // end if
        } // end onreadystatechange
        xhr.open("GET", "https://socialnetwork-lamp.herokuapp.com/editCommentProc.php?commentID=" + commentID + "&comment=" + comment, true);
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
        xhr.open("GET", "https://socialnetwork-lamp.herokuapp.com/deleteCommentProc.php?commentID=" + commentID, true);
        xhr.send(); // send the request for data
}// end function
