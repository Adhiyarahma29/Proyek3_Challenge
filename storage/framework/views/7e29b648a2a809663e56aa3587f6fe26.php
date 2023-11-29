 

<!-- START FORM -->
<?php $__env->startSection('konten'); ?>


<form action='<?php echo e(url('restoran')); ?>' method='post'>
    <?php echo csrf_field(); ?>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='<?php echo e(url('restoran')); ?>' class="btn btn-secondary"><< kembali </a>
        <div class="mb-3 row">
            <label for="KodeBarang" class="col-sm-2 col-form-label">Kode Barang</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='KodeBarang' value="<?php echo e(Session::get('KodeBarang')); ?>" id="KodeBarang">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="NamaBarang" class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='NamaBarang' value="<?php echo e(Session::get('NamaBarang')); ?>" id="NamaBarang">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="Satuan" class="col-sm-2 col-form-label">Satuan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='Satuan' value="<?php echo e(Session::get('Satuan')); ?>" id="jSatuan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="HargaSatuan" class="col-sm-2 col-form-label">Harga Satuan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='HargaSatuan' value="<?php echo e(Session::get('HargaSatuan')); ?>" id="HargaSatuan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="Stok" class="col-sm-2 col-form-label">Stok</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='Stok' value="<?php echo e(Session::get('Stok')); ?>" id="Stok">
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="Stok" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
         </div>
    </div>
    </form>
    <!-- AKHIR FORM -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.tamplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Assessment_221511034_AdhiyaRahma\resources\views/webrestoran/create.blade.php ENDPATH**/ ?>