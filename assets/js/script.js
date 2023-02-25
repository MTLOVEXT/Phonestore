function signupform() {
    document.getElementById('dk').style.display='block';
    document.getElementById('id01').style.display='none';
}

function loginform() {
    document.getElementById('id01').style.display='block';
    document.getElementById('dk').style.display='none';
}

function tab1() {
    document.getElementById('tab1').style.display='block';
    document.getElementById('tab2').style.display='none';
    document.getElementById('tab3').style.display='none';
}

function tab2() {
    document.getElementById('tab2').style.display='block';
    document.getElementById('tab1').style.display='none';
    document.getElementById('tab3').style.display='none';
}

function tab3() {
    document.getElementById('tab3').style.display='block';
    document.getElementById('tab1').style.display='none';
    document.getElementById('tab2').style.display='none';
}
