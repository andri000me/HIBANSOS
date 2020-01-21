<?php $id = uniqid() ?>
<div class="md-form form-group mx-auto position-relative mt-5">
    <input
            <?php echo e($parsley ?? null); ?>

            required
            type="<?php echo e($type ?? 'text'); ?>"
            name="<?php echo e($name); ?>"
            id="<?php echo e($id); ?>"
            placeholder="<?php echo e($label); ?>"
            value="<?php echo e($preval ?? ''); ?>"
            class="form-control <?php if(!$error&&!$preval): ?> initial <?php elseif($preval && !$error): ?> is-valid <?php else: ?> is-invalid <?php endif; ?>">
    <label
            for="<?php echo e($id); ?>"
            class="<?php echo e($error ? "text-danger":"text-muted"); ?>">
        <?php echo e($error ?? "Wajib di isi"); ?>

    </label>
</div><?php /**PATH /home/imandidik/Desktop/valet/hibansos/application/views/component/field.blade.php ENDPATH**/ ?>