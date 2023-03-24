window.onload = function () {

    document.getElementById('ldDate').innerHTML = "Date: " + new Date(Date.now()).toLocaleString().split(',')[0]
}

document.getElementById("back_lderbrd").addEventListener('click', decision);

function decision() {
    if (JSON.parse(localStorage.getItem('win'))) {
        history.back()
    } else {
        window.location.href = "index.php"
    }

}
