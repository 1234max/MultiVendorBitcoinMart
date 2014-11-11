<?php $title = 'Products | SCAM' ?>

<div class="large-12 columns">
    <h3 class="subheader">Products</h3>

    <?php if($this->fl('success')): ?>
        <div data-alert class="alert-box success">
            <?= $this->fl('success') ?>
        </div>
    <?php endif ?>

    <?php if($this->fl('error')): ?>
        <div data-alert class="alert-box alert">
            <?= $this->fl('error') ?>
        </div>
    <?php endif ?>

    <?php if(empty($products)): ?>
        <div data-alert class="alert-box secondary">
            No products found.
        </div>
    <?php else: ?>
    <table class="full-width">
        <thead>
        <tr>
            <th>Name</th>
            <th>Link</th>
            <th>Is hidden</th>
            <th>Price</th>
            <th>Tags</th>
            <th>Shipping options</th>
            <th width="80"></th>
            <th width="80"></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($products as $product): ?>
        <tr>
            <td><?= $this->e($product->name) ?></td>
            <td><a href="?c=listings&a=product&code=<?= $product->code ?>">Product page</a></td>
            <td>
                <?php if($product->is_hidden): ?>
                    <span class="label alert">Yes</span>
                <?php else: ?>
                    <span class="label secondary">No</span>
                <?php endif ?>
            </td>
            <td><?= $this->formatPrice($product->price) ?></td>
            <td>
                <?php if(!empty($product->tags)): ?>
                    <?php foreach(mb_split(',', $product->tags) as $tag): ?>
                        <span class="label orange round"><?= $this->e($tag) ?></span>
                    <?php endforeach ?>
                <?php endif ?>
            </td>
            <td>
                <?= $this->e(join(array_map(function($v){return $v->name; }, $product->shippingOptions), ', ')); ?>
            </td>
            <td><a href="?c=products&a=edit&id=<?= $product->id ?>" class="button tiny">Edit</a></td>
            <td>
                <form action="?c=products&a=destroy" method="post">
                    <input type="hidden" name="id" value="<?= $product->id ?>"/>
                    <input type="submit" value="Delete" class="button tiny alert"/>
                </form>
            </td>
        </tr>
        <?php endforeach ?>
        </tbody>
    </table>
<?php endif ?>

    <a href="?c=products&a=build" class="button small success">New product</a>
</div>