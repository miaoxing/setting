<?php $view->layout() ?>

<div class="page-header">
  <h1>
    站点设置
  </h1>
</div>

<div class="row">
  <div class="col-12">
    <!-- PAGE CONTENT BEGINS -->
    <form action="<?= $url('admin/settings/update') ?>" id="setting-form" class="form-horizontal" method="post"
      role="form">
      <?php foreach ($fieldSets as $title => $fields) : ?>
        <fieldset>
          <legend><small><?= $title ?></small></legend>
          <?php foreach ($fields as $field) : ?>
            <?php if ($field->getLabel()) : ?>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="<?= $field['id'] ?>">
                  <span class="text-warning">*</span>
                  <?= $field->getLabel() ?>
                </label>

                <div class="col-lg-6">
                  <?php if (in_array($field['id'], $editorFields)) : ?>
                    <textarea rows="3" id="<?= $field['id'] ?>"
                      name="settings[<?= $field['id'] ?>]"><?= $e($field['value']) ?></textarea>
                  <?php else : ?>
                    <!-- htmllint id-no-dup="false" -->
                    <input type="text" class="form-control" id="<?= $field['id'] ?>"
                      name="settings[<?= $field['id'] ?>]" value="<?= $e->attr($field['value']) ?>">
                    <!-- htmllint id-no-dup="$previous" -->
                  <?php endif ?>
                </div>
              </div>
            <?php endif ?>
          <?php endforeach ?>
        </fieldset>
      <?php endforeach ?>

      <div class="clearfix form-actions form-group">
        <div class="offset-lg-2">
          <button class="btn btn-primary" type="submit">
            <i class="fa fa-check bigger-110"></i>
            提交
          </button>
        </div>
      </div>
    </form>
  </div>
  <!-- PAGE CONTENT ENDS -->
</div><!-- /.col -->
<!-- /.row -->

<?= $block->js() ?>
<script>
  require(['form', 'ueditor'], function () {
    $('#setting-form').ajaxForm({
      dataType: 'json',
      success: function (ret) {
        $.msg(ret);
      }
    });

    $('textarea').each(function () {
      $(this).ueditor();
    });
  });
</script>
<?= $block->end() ?>
