<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.2" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>

<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />

<?php echo $this->smarty_insert_scripts(array('files'=>'utils.js,common.js,global.js,compare.js')); ?>
</head>
<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>


<div class="mbt10 main" id="psearch">
  <?php echo $this->fetch('library/ur_here.lbi'); ?>
  
  <div id="csb">
    
    <?php echo $this->fetch('library/cart.lbi'); ?>
    <?php echo $this->fetch('library/category_tree.lbi'); ?>
    <?php echo $this->fetch('library/goods_related.lbi'); ?>
    <?php echo $this->fetch('library/goods_fittings.lbi'); ?>
    <?php echo $this->fetch('library/goods_article.lbi'); ?>
    <?php echo $this->fetch('library/goods_attrlinked.lbi'); ?>
    
    
    
    
    <?php echo $this->fetch('library/history.lbi'); ?>
  </div>
  
  
  <div id="cma">
  <?php if ($this->_var['action'] == "form"): ?>
  
  <div id="searchform">
  <div class="nmb">
  <div class="tt"><h3><?php echo $this->_var['lang']['advanced_search']; ?></h3><span></span></div>
  <div class="ct">
  <div class="bgw p1-0">
  <form action="search.php" method="get" name="advancedSearchForm" id="advancedSearchForm">
    <table border="0" align="center" cellpadding="3">
      <tr>
        <td valign="top"><?php echo $this->_var['lang']['keywords']; ?>：</td>
        <td>
          <input name="keywords" id="keywords" type="text" size="40" maxlength="120" class="inputBg" value="<?php echo $this->_var['adv_val']['keywords']; ?>" />
          <label for="sc_ds"><input type="checkbox" name="sc_ds" value="1" id="sc_ds" <?php echo $this->_var['scck']; ?> /><?php echo $this->_var['lang']['sc_ds']; ?></label>
          <br /><?php echo $this->_var['lang']['searchkeywords_notice']; ?>
        </td>
      </tr>
      <tr>
        <td><?php echo $this->_var['lang']['category']; ?>：</td>
        <td><select name="category" id="select" style="border:1px solid #ccc;">
            <option value="0"><?php echo $this->_var['lang']['all_category']; ?></option><?php echo $this->_var['cat_list']; ?></select>
        </td>
      </tr>
      <tr>
        <td><?php echo $this->_var['lang']['brand']; ?>：</td>
        <td><select name="brand" id="brand" style="border:1px solid #ccc;">
            <option value="0"><?php echo $this->_var['lang']['all_brand']; ?></option>
            <?php echo $this->html_options(array('options'=>$this->_var['brand_list'],'selected'=>$this->_var['adv_val']['brand'])); ?>
          </select>
        </td>
      </tr>
      <tr>
        <td><?php echo $this->_var['lang']['price']; ?>：</td>
        <td><input name="min_price" type="text" id="min_price" class="inputBg" value="<?php echo $this->_var['adv_val']['min_price']; ?>" size="10" maxlength="8" />
          -
          <input name="max_price" type="text" id="max_price" class="inputBg" value="<?php echo $this->_var['adv_val']['max_price']; ?>" size="10" maxlength="8" />
        </td>
      </tr>
      <?php if ($this->_var['goods_type_list']): ?>
      <tr>
        <td><?php echo $this->_var['lang']['extension']; ?>：</td>
        <td><select name="goods_type" onchange="this.form.submit()" style="border:1px solid #ccc;">
            <option value="0"><?php echo $this->_var['lang']['all_option']; ?></option>
            <?php echo $this->html_options(array('options'=>$this->_var['goods_type_list'],'selected'=>$this->_var['goods_type_selected'])); ?>
          </select>
        </td>
      </tr>
      <?php endif; ?>
      <?php if ($this->_var['goods_type_selected'] > 0): ?>
      <?php $_from = $this->_var['goods_attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
      <?php if ($this->_var['item']['type'] == 1): ?>
      <tr>
        <td><?php echo $this->_var['item']['attr']; ?>：</td>
        <td colspan="3"><input name="attr[<?php echo $this->_var['item']['id']; ?>]" value="<?php echo $this->_var['item']['value']; ?>" class="inputBg" type="text" size="20" maxlength="120" /></td>
      </tr>
      <?php endif; ?>
      <?php if ($this->_var['item']['type'] == 2): ?>
      <tr>
        <td><?php echo $this->_var['item']['attr']; ?>：</td>
        <td colspan="3"><input name="attr[<?php echo $this->_var['item']['id']; ?>][from]" class="inputBg" value="<?php echo $this->_var['item']['value']['from']; ?>" type="text" size="5" maxlength="5" />
          -
          <input name="attr[<?php echo $this->_var['item']['id']; ?>][to]" value="<?php echo $this->_var['item']['value']['to']; ?>"  class="inputBg" type="text" maxlength="5" /></td>
      </tr>
      <?php endif; ?>
      <?php if ($this->_var['item']['type'] == 3): ?>
      <tr>
        <td><?php echo $this->_var['item']['attr']; ?>：</td>
        <td colspan="3"><select name="attr[<?php echo $this->_var['item']['id']; ?>]" style="border:1px solid #ccc;">
            <option value="0"><?php echo $this->_var['lang']['all_option']; ?></option>
            <?php echo $this->html_options(array('options'=>$this->_var['item']['options'],'selected'=>$this->_var['item']['value'])); ?>
          </select></td>
      </tr>
      <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php endif; ?>

      <?php if ($this->_var['use_storage'] == 1): ?>
      <tr>
        <td>&nbsp;</td>
        <td><label for="outstock"><input type="checkbox" name="outstock" value="1" id="outstock" <?php if ($this->_var['outstock']): ?>checked="checked"<?php endif; ?>/> <?php echo $this->_var['lang']['hidden_outstock']; ?></label>
        </td>
      </tr>
      <?php endif; ?>

      <tr>
        <td colspan="4" align="center"><input type="hidden" name="action" value="form" />
          <input type="submit" name="Submit" class="btn_searchform" value="<?php echo $this->_var['lang']['button_search']; ?>" /></td>
      </tr>
    </table>
  </form>
  </div>
  </div>
  <div class="bt"><span></span></div>
  </div></div>
    <?php endif; ?>

   <?php if (isset ( $this->_var['goods_list'] )): ?>
   <div id="goods_list">
   <div class="nmb">
    
   <div class="tt"><h3>
           <?php if ($this->_var['intromode'] == 'best'): ?>
        <?php echo $this->_var['lang']['best_goods']; ?>
         <?php elseif ($this->_var['intromode'] == 'new'): ?>
         <?php echo $this->_var['lang']['new_goods']; ?>
         <?php elseif ($this->_var['intromode'] == 'hot'): ?>
        <?php echo $this->_var['lang']['hot_goods']; ?>
         <?php elseif ($this->_var['intromode'] == 'promotion'): ?>
         <?php echo $this->_var['lang']['promotion_goods']; ?>
         <?php else: ?>
        <?php echo $this->_var['lang']['search_result']; ?>
         <?php endif; ?>
   </h3>
   <div id="categorylistnav">
          <?php if ($this->_var['goods_list']): ?>
          <form action="search.php" method="post" class="sort" name="listform" id="form">
          <?php echo $this->_var['lang']['btn_display']; ?>：
          <a href="javascript:;" onClick="javascript:display_mode('list')"><img src="themes/LevinJiu/images/display_mode_list<?php if ($this->_var['pager']['display'] == 'list'): ?>_act<?php endif; ?>.gif" alt="<?php echo $this->_var['lang']['display']['list']; ?>"></a>
          <a href="javascript:;" onClick="javascript:display_mode('grid')"><img src="themes/LevinJiu/images/display_mode_grid<?php if ($this->_var['pager']['display'] == 'grid'): ?>_act<?php endif; ?>.gif" alt="<?php echo $this->_var['lang']['display']['grid']; ?>"></a>
          <a href="javascript:;" onClick="javascript:display_mode('text')"><img src="themes/LevinJiu/images/display_mode_text<?php if ($this->_var['pager']['display'] == 'text'): ?>_act<?php endif; ?>.gif" alt="<?php echo $this->_var['lang']['display']['text']; ?>"></a>&nbsp;&nbsp;
              <select name="sort">
              <?php echo $this->html_options(array('options'=>$this->_var['lang']['sort'],'selected'=>$this->_var['pager']['search']['sort'])); ?>
              </select>
              <select name="order">
              <?php echo $this->html_options(array('options'=>$this->_var['lang']['order'],'selected'=>$this->_var['pager']['search']['order'])); ?>
              </select>
              <input type="image" name="imageField" src="themes/LevinJiu/images/bnt_go.gif" alt="go" class="go"/>
              <input type="hidden" name="page" value="<?php echo $this->_var['pager']['page']; ?>" />
              <input type="hidden" name="display" value="<?php echo $this->_var['pager']['display']; ?>" id="display" />
              <?php $_from = $this->_var['pager']['search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
              <?php if ($this->_var['key'] != "sort" && $this->_var['key'] != "order"): ?>
                <?php if ($this->_var['key'] == 'keywords'): ?>
                  <input type="hidden" name="<?php echo $this->_var['key']; ?>" value="<?php echo urldecode($this->_var['item']); ?>" />
                <?php else: ?>
                  <input type="hidden" name="<?php echo $this->_var['key']; ?>" value="<?php echo $this->_var['item']; ?>" />
                <?php endif; ?>
              <?php endif; ?>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </form>
          <?php endif; ?>   </div>
          <div class="clear"></div>
   <span></span></div>
   <div class="ct">
<div class="bgw p1-0">
       <?php if ($this->_var['goods_list']): ?>
          <form action="compare.php" method="post" name="compareForm" id="compareForm" onsubmit="return compareGoods(this);">
    <?php if ($this->_var['pager']['display'] == 'list'): ?>
    <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goods_list']['iteration']++;
?>
    <div class="gml"<?php if (($this->_foreach['goods_list']['iteration'] - 1) % 2 == 0): ?>id="nobg"<?php else: ?>id="bg"<?php endif; ?>>
    <a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" class="gi" /></a>
    <a href="<?php echo $this->_var['goods']['url']; ?>" class="gn"><?php if ($this->_var['goods']['goods_style_name']): ?><?php echo $this->_var['goods']['goods_style_name']; ?><?php else: ?>
<?php echo $this->_var['goods']['goods_name']; ?><?php endif; ?></a>
           <p class="gp">
           <span class="market_price"><?php echo $this->_var['lang']['market_price']; ?><b> <?php echo $this->_var['goods']['market_price']; ?></b></span><br/>
           <span class="shop_price"><?php echo $this->_var['lang']['shop_price']; ?><b> <?php if ($this->_var['goods']['promote_price'] != ""): ?><?php echo $this->_var['goods']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods']['shop_price']; ?><?php endif; ?></b></span>
           </p>
<p class="gd"> <?php if ($this->_var['goods']['goods_brief']): ?><?php echo $this->_var['lang']['goods_brief']; ?><?php echo $this->_var['goods']['goods_brief']; ?><?php endif; ?></p>
 <div id="action">         <a href="javascript:collect(<?php echo $this->_var['goods']['goods_id']; ?>);" class="gf"><?php echo $this->_var['lang']['btn_collect']; ?></a><a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" class="gct"><?php echo $this->_var['lang']['btn_buy']; ?></a><a href="javascript:;" id="compareLink" onClick="Compare.add(<?php echo $this->_var['goods']['goods_id']; ?>,'<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>','<?php echo $this->_var['goods']['type']; ?>')" class="gcp"><?php echo $this->_var['lang']['compare']; ?></a>
 <div class="clear"></div>
</div> 
    </div>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    <?php elseif ($this->_var['pager']['display'] == 'grid'): ?>
    <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
    <?php if ($this->_var['goods']['goods_id']): ?>
        <div class="gmg">
    <a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" class="gi" /></a>
    <a href="<?php echo $this->_var['goods']['url']; ?>" class="gn"><?php if ($this->_var['goods']['goods_style_name']): ?><?php echo $this->_var['goods']['goods_style_name']; ?><?php else: ?>
<?php echo $this->_var['goods']['goods_name']; ?><?php endif; ?></a>
           <p class="gp">
           <span class="market_price"><?php echo $this->_var['lang']['market_price']; ?><b> <?php echo $this->_var['goods']['market_price']; ?></b></span><br/>
           <span class="shop_price"><?php echo $this->_var['lang']['shop_price']; ?><b> <?php if ($this->_var['goods']['promote_price'] != ""): ?><?php echo $this->_var['goods']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods']['shop_price']; ?><?php endif; ?></b></span>
           </p>
 <div id="action">         <a href="javascript:collect(<?php echo $this->_var['goods']['goods_id']; ?>);" class="gf"><?php echo $this->_var['lang']['btn_collect']; ?></a><a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" class="gct"><?php echo $this->_var['lang']['btn_buy']; ?></a><a href="javascript:;" id="compareLink" onClick="Compare.add(<?php echo $this->_var['goods']['goods_id']; ?>,'<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>','<?php echo $this->_var['goods']['type']; ?>')" class="gcp"><?php echo $this->_var['lang']['compare']; ?></a>
 <div class="clear"></div>
</div> 
    </div>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    <div class="clear"></div>
    <?php elseif ($this->_var['pager']['display'] == 'text'): ?>
    <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goods_list']['iteration']++;
?>
    <div class="gmt"<?php if (($this->_foreach['goods_list']['iteration'] - 1) % 2 == 0): ?>id="nobg"<?php else: ?>id="bg"<?php endif; ?>>
    <a href="<?php echo $this->_var['goods']['url']; ?>" class="gn"><?php if ($this->_var['goods']['goods_style_name']): ?><?php echo $this->_var['goods']['goods_style_name']; ?><?php else: ?>
<?php echo $this->_var['goods']['goods_name']; ?><?php endif; ?></a>
           <p class="gp">
           <span class="market_price"><?php echo $this->_var['lang']['market_price']; ?><b> <?php echo $this->_var['goods']['market_price']; ?></b></span><br/>
           <span class="shop_price"><?php echo $this->_var['lang']['shop_price']; ?><b> <?php if ($this->_var['goods']['promote_price'] != ""): ?><?php echo $this->_var['goods']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods']['shop_price']; ?><?php endif; ?></b></span>
           </p>
<p class="gd"> <?php if ($this->_var['goods']['goods_brief']): ?><?php echo $this->_var['lang']['goods_brief']; ?><?php echo $this->_var['goods']['goods_brief']; ?><?php endif; ?></p>
 <div id="action">         <a href="javascript:collect(<?php echo $this->_var['goods']['goods_id']; ?>);" class="gf"><?php echo $this->_var['lang']['btn_collect']; ?></a><a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" class="gct"><?php echo $this->_var['lang']['btn_buy']; ?></a><a href="javascript:;" id="compareLink" onClick="Compare.add(<?php echo $this->_var['goods']['goods_id']; ?>,'<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>','<?php echo $this->_var['goods']['type']; ?>')" class="gcp"><?php echo $this->_var['lang']['compare']; ?></a>
 <div class="clear"></div>
</div> 
    </div>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    <?php endif; ?>
          </form>
          <script type="text/javascript">
        <?php $_from = $this->_var['lang']['compare_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
        var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

                                <?php $_from = $this->_var['lang']['compare_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
        <?php if ($this->_var['key'] != 'button_compare'): ?>
        var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
        <?php else: ?>
        var button_compare = '';
        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>


        var compare_no_goods = "<?php echo $this->_var['lang']['compare_no_goods']; ?>";
        window.onload = function()
        {
          Compare.init();
          fixpng();
        }
        var btn_buy = "<?php echo $this->_var['lang']['btn_buy']; ?>";
        var is_cancel = "<?php echo $this->_var['lang']['is_cancel']; ?>";
        var select_spe = "<?php echo $this->_var['lang']['select_spe']; ?>";
        </script>
        <?php else: ?>
        <div id="noinfo"><?php echo $this->_var['lang']['no_search_result']; ?></div>
        <?php endif; ?>
</div>
   </div>
      <?php echo $this->fetch('library/pages.lbi'); ?>
   <div class="bt"><span></span></div>
   </div>
   </div>
   <?php endif; ?>
  </div>
  
  <div class="clear"></div>
    <?php echo $this->fetch('library/help.lbi'); ?>
</div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body>
</html>