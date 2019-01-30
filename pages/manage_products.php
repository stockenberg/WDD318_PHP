<div class="col-md-12">
    <h2>Add new Product</h2>
    <form action="#banane" id="productForm">

        <div class="form-group">
            <label for="">title</label>
            <input type="text" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="">Description</label>
            <textarea class="form-control">Hallo</textarea>
        </div>

        <button class="btn btn-success product_submit">Save</button>
    </form>
</div>

<div class="col-md-12">
    <div class="bgc-white bd bdrs-3 p-20 mB-20"><h4 class="c-grey-900 mB-20">Product Management</h4>
        <a href="?p=create_users" class="btn btn-success"><i class="fas fa-plus"></i> Add new Product</a>
        <table class="table table-bordered mt-3">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">description</th>
                <th scope="col">img</th>
                <th scope="col">Created At</th>
                <th scope="col">Edit</th>
            </tr>
            </thead>
            <tbody>


            </tbody>
        </table>
    </div>
</div>