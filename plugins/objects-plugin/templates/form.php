<form method="POST" id="form" class="filter">
  <div class="filter_select_box">

    <div class="form-group">
      <label class="filter_label" for="cat"><?php _e('Район', 'objects-plugin'); ?></label>
      <select name="cat" id="cat" class="form-control">
        <?php echo '<option value="all">' . 'Всі райони' . '</option>';
            foreach ($district_options as $key => $label) {
                echo '<option value="' . esc_attr($key) . '">' . esc_html($label) . '</option>';
            }?>
      </select>
    </div>

    <div class="form-group">
      <label class="filter_label" for="title"><?php _e('Назва', 'objects-plugin'); ?></label>
      <select name="title" id="title" class="form-control">
        <?php render_select_options($building_names, 'Всі назви'); ?>
      </select>
    </div>

    <div class="form-group">
      <label class="filter_label" for="address"><?php _e('Адреса', 'objects-plugin'); ?></label>
      <select name="address" id="address" class="form-control">
        <?php render_select_options($building_addresses, 'Всі адреси'); ?>
      </select>
    </div>

    <div class="form-group">
      <label class="filter_label" for="floor"><?php _e('Кількість поверхів', 'objects-plugin'); ?></label>
      <select name="floor" id="floor" class="form-control">
        <?php render_select_options($floor_values, 'Всі'); ?>
      </select>
    </div>

    <div class="form-group">
      <label class="filter_label" for="type"><?php _e('Тип будинків', 'objects-plugin'); ?></label>
      <select name="type" id="type" class="form-control">
        <?php render_select_options($type_values, 'Всі'); ?>
      </select>
    </div>

    <div class="form-group">
      <label class="filter_label" for="ecology"><?php _e('Екологічність', 'objects-plugin'); ?></label>
      <select name="ecology" id="ecology" class="form-control">
        <?php render_select_options($ecology_values, 'Всі варіанти'); ?>
      </select>
    </div>

    <div class="form-group">
      <label class="filter_label" for="square"><?php _e('Площа (м кв.)', 'objects-plugin'); ?></label>
      <select name="square" id="square" class="form-control">
        <?php render_select_options($square_values, 'Всі варіанти'); ?>
      </select>
    </div>

    <div class="form-group">
      <label class="filter_label" for="rooms_amount"><?php _e('Кількість кімнат', 'objects-plugin'); ?></label>
      <select name="rooms_amount" id="rooms_amount" class="form-control">
        <?php render_select_options($rooms_amount_values, 'Всі варіанти'); ?>
      </select>
    </div>

    <div class="form-group">
      <label class="filter_label" for="balcony"><?php _e('Є балкон', 'objects-plugin'); ?></label>
      <select name="balcony" id="balcony" class="form-control">
        <?php render_select_options($balcony_values, 'Всі'); ?>
      </select>
    </div>

    <div class="form-group">
      <label class="filter_label" for="bathroom"><?php _e('Є санвузол', 'objects-plugin'); ?></label>
      <select name="bathroom" id="bathroom" class="form-control">
        <?php render_select_options($bathroom_values, 'Всі'); ?>
      </select>
    </div>

  </div>

  <button type="submit" class="btn btn-primary btn-lg filter_btn">
    <span><?php _e('Фільтрувати', 'objects-plugin'); ?></span>
    <span class="spinner-border spinner-border-sm text-light filter_loader" role="status" aria-hidden="true"></span>
  </button>

</form>