
productSubmit = document.getElementsByClassName('product_submit')[0];

productSubmit.onclick = function (e) {
    e.preventDefault();
    let form = document.getElementById('productForm');

    let title = form[0];
    let description = form[1];


    $.ajax({
        url: 'http://wdd318.test/api/?ressource=products&action=store',
        method: 'POST',
        data: {
            title: title.value,
            description: description.value
        }
    }).then(function (res) {
        console.log(res);
        let resJSON = JSON.parse(res);

        if (resJSON.status === 200) {
            iziToast.show({
                title: 'Saved',
                message: resJSON.message,
                color: 'green'
            });
            getProducts();
            title.value = null;
            description.value = null;
        } else {
            let i = 0;
            for (let err in resJSON.message) {
                if (typeof resJSON.message[err] !== 'undefined') {
                    let errP = document.createElement('p');
                    errP.classList.add('err');
                    errP.innerText = resJSON.message[err];
                    // TODO : Remove Errors from HTML !! Urgent $('.error').remove();
                    // form.children[i].removeChild(document.getElementsByClassName('.error')[0]);
                    form.children[i].appendChild(errP);
                    i++;
                }
            }


        }
    });


}


getProducts();



function getProducts() {
    let myRequest = axios.get('http://wdd318.test/api?ressource=products&action=get')
        .then(res => {
            console.log(res);
            buildProductTable(res.data)
        })
        .catch(err => {
            console.log(err);
        })
}

function deleteProductById(e) {
    console.log(e.preventDefault());
    axios.get('http://wdd318.test/api/?ressource=products&action=delete&id=' + e.target.dataset.id)
        .then(res => {
            console.log(res);
            getProducts();
            iziToast.show({
                title: 'Delete',
                message: res.data.message,
                color: 'red'
            });
        })
        .catch(err => {
            console.log(err);
        })
}

function editProductById(e) {
    let trToEdit = e.target.parentElement.parentElement;
    console.log(trToEdit);
    console.log(trToEdit.children);

    for (let i = 1; i < 3; i++) {
        let text = trToEdit.children[i].innerText;
        trToEdit.children[i].innerHTML = `<input class="form-control" value="${text}">`;
    }

    let editBox = trToEdit.children[trToEdit.children.length - 1];
    console.log(editBox);
    let editBoxContent = editBox.children;

    console.log(editBoxContent);

    editBoxContent[0].className = 'btn btn-warning';
    editBoxContent[0].innerHTML = 'Abbrechen';
    // TODO - click event on edit issue - icon is select if e.target is called
    editBoxContent[1].className = 'btn btn-success';
    editBoxContent[1].innerHTML = 'Speichern';
    editBoxContent[1].onclick = update;

    //aSave.dataset.id = data[i].id;
    // aSave.onclick = editProductById;
    editBoxContent[0].onclick = cancleEditState

    function update (){

        let productData = {};
        productData.title = trToEdit.children[1].children[0].value
        productData.description = trToEdit.children[2].children[0].value
        productData.id = this.dataset.id;

        $.ajax({
            url: 'http://wdd318.test/api/?ressource=products&action=edit&id=' +  productData.id,
            method: 'POST',
            data: productData
        }).then(res => {
            getProducts();
            iziToast.show({
                title: 'Updated',
                message: res.data.message,
                color: 'yellow'
            });
        })
    }

    function cancleEditState() {

        for (let i = 1; i < 3; i++) {
            let text = trToEdit.children[i].children[0].value;
            trToEdit.children[i].innerText = text;
        }

        this.className = 'btn btn-danger';
        this.innerHTML = 'Mülltonne';
        this.onclick = deleteProductById

        editBoxContent[1].className = 'btn btn-primary';
        editBoxContent[1].innerHTML = 'Editieren';
        editBoxContent[1].onclick = editProductById;


    }

}


function buildProductTable(data) {
    document.getElementsByTagName('tbody')[0].innerHTML = null;

    for (let i = 0; i < data.length; i++) {
        let tr = document.createElement('tr');

        for (let item in data[i]) {
            if (item !== 'updated_at') {
                let td = document.createElement('td');
                td.innerText = data[i][item];
                tr.appendChild(td);
            }
        }

        let td = document.createElement('td');
        let aDelete = document.createElement('a');
        // TODO - click event on edit issue - icon is select if e.target is called

        aDelete.className = 'btn btn-danger';
        aDelete.innerHTML = 'Mülltonne';
        aDelete.dataset.id = data[i].id;
        aDelete.onclick = deleteProductById;

        let aEdit = document.createElement('a');
        aEdit.className = 'btn btn-primary';
        aEdit.innerHTML = 'Editieren';
        aEdit.dataset.id = data[i].id;
        aEdit.onclick = editProductById;

        td.appendChild(aDelete);
        td.appendChild(aEdit);
        tr.appendChild(td);
        document.getElementsByTagName('tbody')[0].appendChild(tr);

    }
}