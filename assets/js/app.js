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

productSubmit = document.getElementsByClassName('product_submit')[0];
productSubmit.onclick = function (e) {
    e.preventDefault();
    let form = document.getElementById('productForm');

    let title = form[0];
    let description = form[1];


    $.ajax({
        url: 'http://wdd318.test/api/?ressource=products&action=store',
        method: 'POST',
        data: {title: title.value, description: description.value}
    }).then(function (res) {
        console.log(res);

        let resJSON = JSON.parse(res);
        if (resJSON.status === 200) {
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
                    form.children[i].appendChild(errP);
                    i++;
                }
            }


        }
    });


}

page = getPageFromURI();

if (page === 'manage_products') {
    getProducts();
}


function getProducts() {
    axios.get('http://wdd318.test/api?ressource=products&action=get')
        .then(res => {
            buildProductTable(res.data)
        })
        .catch(err => {
            console.log(err);
        })
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
        td.innerHTML = `  
            <a href="" class="btn btn-primary"><i class="far fa-edit"></i></a>
            <a href="" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
        `;
        tr.appendChild(td);
        document.getElementsByTagName('tbody')[0].appendChild(tr);

    }
}


function getPageFromURI() {
    let search = window.location.search.replace('?', '');
    let searchArr = search.split('&');
// TODO : check if multiple params are in this string
    return search.split('=')[1];
}