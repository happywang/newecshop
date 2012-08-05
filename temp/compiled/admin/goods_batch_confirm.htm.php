<!-- $Id -->
<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,listtable.js')); ?>

<div class="list-div" id="listDiv">
  <form action="goods_batch.php?act=insert" method="post">
    <table cellspacing="1" cellpadding="3" width="100%">
      <tr>
        <th><input type="checkbox" checked onclick="listTable.selectAll(this, 'checked')" /><?php echo $this->_var['lang']['record_id']; ?></th>
        <?php $_from = $this->_var['title_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('field', 'title');if (count($_from)):
    foreach ($_from AS $this->_var['field'] => $this->_var['title']):
?>
        <?php if ($this->_var['field_show'][$this->_var['field']]): ?><th><?php echo $this->_var['title']; ?></th><?php endif; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <th><?php echo $this->_var['lang']['goods_class']; ?></th>
      </tr>
      <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['goods']):
?>
      <tr>
        <td><input type="checkbox" name="checked[]" value="<?php echo $this->_var['key']; ?>" checked /> <?php echo $this->_var['key']; ?> </td>
        <?php $_from = $this->_var['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('field', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['field'] => $this->_var['value']):
?>
          <?php if ($this->_var['field_show'][$this->_var['field']]): ?>
          <td><input type="text" name="<?php echo $this->_var['field']; ?>[]" value="<?php echo $this->_var['value']; ?>" size="15" /></td>
          <?php else: ?>
          <input type="hidden" name="<?php echo $this->_var['field']; ?>[]" value="<?php echo $this->_var['value']; ?>" />
          <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <td><select name="goods_class[]"><?php echo $this->html_options(array('options'=>$this->_var['goods_class'],'selected'=>$this->_var['goods']['is_real'])); ?></select></td>
      </tr>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <tr align="center">
        <td colspan="7">
          <input type="hidden" name="cat" value="<?php echo $_REQUEST['cat']; ?>" />
          <input type="submit" name="submit" value="<?php echo $this->_var['lang']['button_submit']; ?>" class="button" />
          <input type="button" name="reset" onclick="history.go(-1)" value="<?php echo $this->_var['lang']['back']; ?>" class="button" />
        </td>
      </tr>
    </table>
  </form>
</div>
<?php echo $this->fetch('pagefooter.htm'); ?>