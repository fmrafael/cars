<script type="text/javascript">
    $(document).ready(function(){
        $("#make").change(function(){
            var make_id = $(this).val();
            var url = '<?php echo osc_ajax_plugin_url('cars_attributes/ajax.php') . '&makeId='; ?>' + make_id;
            var result = '';
            if(make_id != '') {
                $("#model").attr('disabled',false);
                $.ajax({
                    type: "POST",
                    url: url,
                    dataType: 'json',
                    success: function(data){
                        var length = data.length;
                        if(length > 0) {
                            result += '<option value="" selected><?php _e('Select a model', 'cars_attributes'); ?></option>';
                            for(key in data) {
                                result += '<option value="' + data[key].pk_i_id + '">' + data[key].s_name + '</option>';
                            }
                        } else {
                            result += '<option value=""><?php _e('No results', 'cars_attributes'); ?></option>';
                        }
                        $("#model").html(result);
                    }
                 });
             } else {
                result += '<option value="" selected><?php _e('Select a model', 'cars_attributes'); ?></option>';
                $("#model").attr('disabled',true);
                $("#model").html(result);
             }
        });

 $("#model").change(function(){
            var model_id = $(this).val();
            var url = '<?php echo osc_ajax_plugin_url('cars_attributes/ajax.php') . '&modelId='; ?>' + model_id;
            var result = '';
            if(model_id != '') {
                $("#car_type").attr('disabled',false);
                $.ajax({
                    type: "POST",
                    url: url,
                    dataType: 'json',
                    success: function(data){
                        var length = data.length;
                        if(length > 0) {
                            result += '<option value="" selected><?php _e('Select a model', 'cars_attributes'); ?></option>';
                            for(key in data) {
                                result += '<option value="' + data[key].pk_i_id + '">' + data[key].s_name + '</option>';
                            }
                        } else {
                            result += '<option value=""><?php _e('No results', 'cars_attributes'); ?></option>';
                        }
                        $("#car_type").html(result);
                    }
                 });
             } else {
                result += '<option value="" selected><?php _e('Select a model', 'cars_attributes'); ?></option>';
                $("#car_type").attr('disabled',true);
                $("#car_type").html(result);
             }
        });




    });
</script>
<?php 
    $make  = Params::getParam('make') ;
    $model = Params::getParam('model') ;
    $type  = Params::getParam('type') ;

    $makes  = ModelCars::newInstance()->getCarMakes();
    $models = array();
    if($make != '') {
        $models = ModelCars::newInstance()->getCarModels($make);
    }

    $types = ModelCars::newInstance()->getVehiclesType(osc_current_user_locale());
?>
<fieldset>
   

    <div class="row one_input">
        <h6><?php _e('Make', 'cars_attributes'); ?></h6>
        <select name="make" id="make" >
            <option value=""><?php  _e('Select a make', 'cars_attributes'); ?></option>
            <?php foreach($makes as $m) { ?>
                <option value="<?php echo $m['pk_i_id']; ?>" <?php if($make == $m['pk_i_id']) { echo 'selected'; } ?>><?php echo $m['s_name']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="row one_input">
        <h6><?php _e('Model', 'cars_attributes'); ?></h6>
        <select name="model" id="model">
            <option value=""><?php _e('Select a model', 'cars_attributes'); ?></option>
            <?php foreach($models as $m) { ?>
                <option value="<?php echo $m['pk_i_id']; ?>" <?php if($model == $m['pk_i_id']) { echo 'selected';} ?>><?php echo $m['s_name']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="row one_input">
        <h6><?php _e('Car type', 'cars_attributes'); ?></h6>
        <select name="car_type" id="car_type">
            <option value=""><?php _e('Select a car type', 'cars_attributes'); ?></option>
            <?php foreach($car_types as $p) { ?>
                <option value="<?php echo $p['pk_i_id']; ?>" <?php if($car_types==$p['pk_i_id']) { echo 'selected'; } ?>><?php echo $p['s_name']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="row one_input">
        <?php $transmission = Params::getParam('transmission') ; ?>
        <h6 for="transmission"><?php _e('Transmission', 'cars_attributes'); ?></h6>
        <input style="width:20px;" type="radio" name="transmission" value="MANUAL" id="manual" <?php if($transmission == 'MANUAL') { echo 'checked="yes"'; } ?>/> <label for="manual"><?php _e('Manual', 'cars_attributes'); ?></label><br />
        <input style="width:20px;" type="radio" name="transmission" value="AUTO" id="auto" <?php if($transmission == 'AUTO') { echo 'checked="yes"'; } ?>/> <label for="auto"><?php _e('Automatic', 'cars_attributes'); ?></label>
    </div>
</fieldset>