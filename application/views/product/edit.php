<div class="container my-3">
    <div class="card p-2">
        <h3>Edit Product</h3>
        <hr>
        <div class="card-body">
            <form action="<?php echo base_url('edit') . '/' . $product->id; ?>" method="post">
                <div class="mb-3">
                    <label class="form-label">Product Code <span class="text-danger">*</span></label>
                    <input type="text" name="product_code" value="<?php echo $product->product_code; ?>" class="form-control form-control-sm" placeholder="Enter product Code">
                    <small class="text-danger text-sm mt-2"><?php echo $product_codeError; ?></small>

                </div>
                <div class="mb-3">
                    <label class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" value="<?php echo $product->name; ?>" class="form-control form-control-sm" placeholder="Enter product name">
                    <small class="text-danger text-sm mt-2"><?php echo $nameError; ?></small>

                </div>
                <div class="mb-3">
                    <label class="form-label">Quantity <span class="text-danger">*</span></label>
                    <input type="text" name="qty" value="<?php echo $product->qty; ?>" class="form-control form-control-sm" placeholder="Enter product quantity">
                    <small class="text-danger text-sm mt-2"><?php echo $qtyError; ?></small>

                </div>
                <div class="mb-3">
                    <label class="form-label">Price <span class="text-danger">*</span></label>
                    <input type="text" name="price" value="<?php echo $product->price; ?>" class="form-control form-control-sm" placeholder="Enter product price">
                    <small class="text-danger text-sm mt-2"><?php echo $priceError; ?></small>

                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control form-control-sm" id="exampleFormControlTextarea1" rows="3"><?php echo $product->description; ?>
                    </textarea>
                    <small class="text-danger text-sm mt-2"><?php echo $descriptionError; ?></small>

                </div>
                <div class="mb-3 d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </div>
            </form>
        </div>
    </div>
</div>