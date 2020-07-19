let butSend = document.getElementById('send');
const url = 'sendData.php';



butSend.addEventListener('click', function() {
    let name = document.getElementById('name').value;
    let surname = document.getElementById('surname').value;
    let lastName = document.getElementById('lastName').value;
    let email = document.getElementById('email').value;
    let comment = document.getElementById('comment').value;
    let body = "name=" + encodeURIComponent(name) + " " + "&surname=" + encodeURIComponent(surname) + " " +"&lastName=" + encodeURIComponent(lastName) + " " + "&email=" + encodeURIComponent(email) + " " + "&comment=" + encodeURIComponent(comment);
    /*let xmlhttp = new XMLHttpRequest();
    
    if(name != "" && surname != "" && lastName != "" && email != "" && comment != "") {
        xmlhttp.open('post', 'sendData.php', true);
        xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xmlhttp.send(body);
        xmlhttp.abort();
    }*/
    
    let xmlhttpSecond = new XMLHttpRequest();
    xmlhttpSecond.open('get', 'getData.php', true);
    xmlhttpSecond.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttpSecond.send();
    if (xmlhttpSecond.status != 200) { 
        alert(`Ошибка ${xmlhttpSecond.status}: ${xmlhttpSecond.statusText}`); 
    } else { 
        alert(xmlhttpSecond.responseText); 
  };
});