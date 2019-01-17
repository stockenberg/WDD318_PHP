
let dangerBtns = document.getElementsByClassName('btn-danger');

for(let i = 0; i < dangerBtns.length; i++){
    dangerBtns[i].onclick = (e) => {
        let confirm = window.confirm('Willst du diese Aktion ausführen?!');
        if(confirm){
            return true;
        }else{
            e.preventDefault();
        }
    }
}