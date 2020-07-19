function getData() {
    let xmlhttpGet = new XMLHttpRequest();
    xmlhttpGet.open('GET', 'getData.php');
    xmlhttpGet.send();
    xmlhttpGet.onload = function() {
        if (xmlhttpGet.status != 200) {
            alert(`Ошибка ${xmlhttpGet.status}: ${xmlhttpGet.statusText}`);
        } else { 
            let str = xmlhttpGet.responseText;
            let arrayOfSplit = str.split("|");
            let arrayOfSplitSecond = [];
            for(let i = 0; i<=arrayOfSplit.length-1;i++)
                arrayOfSplitSecond[i] = arrayOfSplit[i].split("~");
            for(let j = 1; j<=arrayOfSplitSecond.length-1;j++){
                let div = document.getElementById('right');
                let divBlock = document.createElement('div');
                let divTop = document.createElement('div');
                let divMiddleTop = document.createElement('div');
                let divMiddle = document.createElement('div');
                let divBottom = document.createElement('div');

                divBlock.className = "block";
                divTop.className = "top";
                divMiddleTop.className = "top";
                divMiddle.className = "top";
                divBottom.className = "top";
                
                div.appendChild(divBlock);
                divBlock.appendChild(divTop);
                divBlock.appendChild(divMiddleTop);
                divBlock.appendChild(divMiddle);
                divBlock.appendChild(divBottom);
                let k = 0;
                divTop.innerHTML = `<h4> ${arrayOfSplitSecond[j][k]} </h4> <h5> ${arrayOfSplitSecond[j][k+1]} </h5>`;
                divMiddleTop.innerHTML = `<h6> ${arrayOfSplitSecond[j][k+2]} </h6>`;
                divMiddle.innerHTML = `<h5> ${arrayOfSplitSecond[j][k+3]} </h5>`;
                divBottom.innerHTML = `<p> ${arrayOfSplitSecond[j][k+4]} </p>`;
            }
            
        }
    }
};

document.addEventListener('DOMContentLoaded', function() { getData() }, false);

let butSend = document.getElementById('send');

butSend.addEventListener('click', function() {
    let name = document.getElementById('name').value;
    let surname = document.getElementById('surname').value;
    let lastName = document.getElementById('lastName').value;
    let email = document.getElementById('email').value;
    let comment = document.getElementById('comment').value;
    let body = "name=" + encodeURIComponent(name) + " " + "&surname=" + encodeURIComponent(surname) + " " +"&lastName=" + encodeURIComponent(lastName) + " " + "&email=" + encodeURIComponent(email) + " " + "&comment=" + encodeURIComponent(comment);
    let xmlhttp = new XMLHttpRequest();
    
    if(name != "" && surname != "" && lastName != "" && email != "" && comment != "") {
        xmlhttp.open('post', 'sendData.php', true);
        xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xmlhttp.send(body);
    }

    getData();
});