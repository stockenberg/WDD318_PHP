let dangerBtns = document.getElementsByClassName('btn-danger');
let page, productSubmit;


for (let i = 0; i < dangerBtns.length; i++) {
    dangerBtns[i].onclick = (e) => {
        let confirm = window.confirm('Willst du diese Aktion ausführen?!');
        if (confirm) {
            return true;
        } else {
            e.preventDefault();
        }
    }
}


function getPageFromURI() {
    let search = window.location.search.replace('?', '');
    let searchArr = search.split('&');
    // TODO : check if multiple params are in this string
    return search.split('=')[1];
}