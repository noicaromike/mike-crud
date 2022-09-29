<div class="container mt-5">
    <div class="table-responsive">
        <h3>Product List</h3>
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Description</th>
                    <th>Created At</th>

                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td>
                            <p class="fw-bold mb-1"><?php echo $product->product_code; ?></p>
                            <p class="text-muted mb-0"><?php echo $product->name; ?></p>
                        </td>
                        <td><?php echo $product->price; ?></td>
                        <td><?php echo $product->qty; ?></td>
                        <td><?php echo $product->description; ?></td>
                        <td><?php echo $product->created_at; ?></td>
                        <td>
                            <div class="d-flex">
                                <a href="<?php echo  base_url('edit') . '/' . $product->id; ?>" class="btn text-primary btn-sm">Edit</a>
                                <form action="<?php echo base_url('delete') . '/' . $product->id; ?>" method="post">
                                    <button type="submit" class="btn text-danger btn-sm">Delete</button>
                                </form>
                            </div>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


</div>