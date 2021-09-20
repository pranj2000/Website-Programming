function grade(){
    var q0 = document.getElementsByName('question0');
    var q1 = document.getElementsByName('question1');
    var q2 = document.getElementsByName('question2');
    var q3 = document.getElementsByName('question3');
    var q4 = document.getElementById('q4');
    var q5 = document.getElementById('q5');

    var tf_correct = 0
    mc_array = new Array()
    var mc_correct = 0
    var fill_correct = 0

    tf_answered = new Array()
    mc_answered = new Array()
    fill_answered = new Array()

    for(i = 0; i < q0.length; i++) {
      if(q0[i].checked) {
        tf_answered[i] = "answered"
        if (q0[i].value == "false"){
          tf_correct += 1
          console.log("correct")
        } else {
          console.log("incorrect")
        }
      }else{
        tf_answered[i] = "unanswered"
      }
  }

    if (tf_answered.includes("answered") == false){
      alert("Please answer question 1")
      tf_answered = []
      return
    } else {
      tf_answered = []
    }


    for(i = 0; i < q1.length; i++) {
      if(q1[i].checked) {
        tf_answered[i] = "answered"
        if (q1[i].value == "true"){
          console.log("correct")
          tf_correct += 1
        } else {
          console.log("incorrect")
        }
      }else {
        tf_answered[i] = "unanswered"
      }
  }

    if (tf_answered.includes("answered") == false){
      alert("Please answer question 2")
      tf_answered = []
      return
    } else {
      tf_answered = []
    }

    for(i = 0; i < q2.length; i++) {
      if(q2[i].checked) {
        mc_answered[i] = "answered"
        if (q2[i].value == "b"){
          mc_array.push("correct")
          console.log("correct")
        } else {
          mc_array.push("incorrect")
          console.log("incorrect")
        }
      }else{
        mc_answered[i] = "unanswered"
      }
  }

    if (mc_answered.includes("answered") == false){
      alert("Please answer question 3")
      mc_answered = []
      return
    } else {
      mc_answered = []
    }

  if (mc_array.includes("incorrect") == false && mc_array.length != 0){
        mc_correct += 1
        console.log("mc array has no incorrect")
        mc_array = []
      } else {
        console.log("mc array has incorrect answers")
        mc_array = []
      }

    for(i = 0; i < q3.length; i++) {
      if(q3[i].checked) {
        mc_answered[i] = "answered"
        if (q3[i].value == "c"){
          mc_array.push("correct")
          console.log("correct")
        } else {
          mc_array.push("incorrect")
          console.log("incorrect")
        }
      }else{
        mc_answered[i] = "unanswered"
      }
  }

  if (mc_answered.includes("answered") == false){
      alert("Please answer question 4")
      mc_answered = []
      return
    } else {
      mc_answered = []
    }

  if (mc_array.includes("incorrect") == false && mc_array.length != 0){
        mc_correct += 1
        console.log("mc array has no incorrect")
        mc_array = []
      } else {
        console.log("mc array has incorrect answers")
        mc_array = []
      }

  
  q4_input = q4.value
  q5_input = q5.value

  if (q4_input.length == 0){
    alert("Please answer Question 5")
    return
  }

  if (q5_input.length == 0){
    alert("Please answer Question 6")
    return
  } 

  if (q4_input.toUpperCase() == "HTTP"){
    fill_correct += 1
    console.log("fill correct")
  } else {
    console.log("fill incorrect")
  }

  if (q5_input.toLowerCase() == "favicon"){
    fill_correct += 1
    console.log("fill correct")
  } else {
    console.log("fill incorrect")
  }

  total_correct = tf_correct + mc_correct + fill_correct
  console.log(total_correct)
  console.log(tf_correct)
  console.log(mc_correct)
  console.log(fill_correct)

  document.getElementById("results").innerHTML = "<p>Your grade is "+ total_correct.toString() + "/6</p>"
  alert("Your grade is " + total_correct.toString() + "/6")
}


function clean(){
    var q0 = document.getElementsByName('question0');
    var q1 = document.getElementsByName('question1');
    var q2 = document.getElementsByName('question2');
    var q3 = document.getElementsByName('question3');
    var q4 = document.getElementById('q4');
    var q5 = document.getElementById('q5');

    q0.checked = false
    for(var i=0; i<q0.length; i++){
      q0[i].checked = false;
    }

    for(var i=0; i<q1.length; i++){
      q1[i].checked = false;
    }

    for(var i=0; i<q2.length; i++){
      q2[i].checked = false;
    }

    for(var i=0; i<q3.length; i++){
      q3[i].checked = false;
    }

    q4.value = ""
    q5.value = ""
    document.getElementById("results").innerHTML = ""

}