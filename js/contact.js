document.addEventListener('click', ({ target }) => {

    if (target.className !== 'tab-bar-item') return;
    var x = document.getElementsByTagName('button');
    
    for(var index=0;index<x.length;index++)
    {
        if(x[index].classList.contains('active'))
        {
            x[index].className='tab-bar-item';
        }
    }   
    target.className='active';
    console.log(target.className);  

  });

  function itemclick(contentItem) {      
    var i = 0;
    var x = document.getElementsByClassName('content-item');
    for (let index = 0; index < x.length; index++) {
        x[index].style.display = "none";

    }
    document.getElementById(contentItem).style.display = "block";
    window.count=0;
    var inputElement = document.getElementById('email_address');
    var btnSubmit=document.getElementById("btnsubmit");
        inputElement.addEventListener('focusout', function(){
            if(!validate(inputElement.value) && count==0)
            {
                inputElement.focus();
                inputElement.value="";
                alert("Enter valid mail address");
                count=1;        
                btnSubmit.disabled=true;        
            }
            else{
                btnSubmit.disabled=false;
            }
        });
        inputElement.addEventListener('focusin', function(){
            if(count!=0)
            {
                count=0;
            }
        });
      function validate(email) {
          debugger;
          let str = String(email);
          let strindex=str.indexOf("@");
          if (strindex!=(-1)) {
              str = str.split("@")[1];
              if (str.match("edu.vaniercollege.qc.ca")) {
                  return true;
                }
              else {
                  return false;
                }
          }
          else {
              return false;
          }
      }
}