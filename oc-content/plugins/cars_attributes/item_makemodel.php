<h2><?php _e('Car details', 'cars_attributes') ; ?></h2>
    <?php if( !empty($detail['s_make']) ) { ?>
    <div class="row">
    	<div class="col-md-4">        
        <label width="150px"><?php echo @$detail['s_make']; ?></label>
    </div>
    <?php } ?>
    <?php if( !empty($detail['s_model']) ) { ?>
    <div class="col-md-4">        
        <label width="150px"><?php echo @$detail['s_model']; ?></label>
 
    <?php } ?>
    <?php $locale = osc_current_user_locale(); ?>
    <?php if( !empty($detail['locale'][$locale]['s_car_type']) ) { ?>
    <div class="col-md-4">        
        <label width="150px"><?php echo @$detail['locale'][$locale]['s_car_type']; ?></label>
	</div>	
    <?php } ?>
    