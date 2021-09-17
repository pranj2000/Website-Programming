function submit() {
  var comments = document.getElementById("comments").value;

  if (comments.length == ''){
    window.alert("Please answer the question")
    return
  }
}

function clear(){
  var comments = document.getElementById("comments").value;
  
  comments = "";

  location.reload();

}


