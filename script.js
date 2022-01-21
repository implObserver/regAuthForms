/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */
let buttons = document.querySelectorAll(".btn");

buttons.forEach(button => button.addEventListener('click', (event) => sendRequest(event, button.id)));

function sendRequest(e, flag) {
    e.preventDefault();
    let request = new XMLHttpRequest();
    request.open('POST', getUrl(flag));
    request.setRequestHeader('Content-Type', 'Content-Type: application/json');
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            request.responseText === '' ? location.reload() : alert(request.response);
        }
    };
    request.send(getJSON(flag));
}

function getJSON(arg) {
    let data = JSON.stringify({
        "login": validation("#" + arg + "Login"),
        "name": validation("#" + arg + "Name"),
        "pass": validation("#" + arg + "Pass")
    });
    return data;
}

function getUrl(arg) {
    let urlList = {
        'reg': 'validation-form/reg.php',
        'auth': 'validation-form/auth.php'
    };
    return urlList[arg];
}

function validation(id) {
    try {
        let test = document.querySelector(id);
        return test.value;
    } catch (e) {
        return '';
    }
}