<div id="container-mme" class="m-442218 mme-gateway">
    <div class="mme-border">
        <h3 class="mme-h3">Shop now & pay later</h3>
        <p><?php echo esc_html($description);?></p>
        <?php
        $options = ['' => "Select Interest Free Period"];
        foreach ($interest_free as $row){
            $options[$row->PartnersInterestFreeId] = $row->Description;
        }
        woocommerce_form_field( 'mme_interest_free', array(
            'type'          => 'select',
            'label'         => __("Interest Free Period", "woocommerce"),
            'class'         => array('form-row-wide'),
            'required'      => true,
            'options'       => $options,
        ), '');
        ?>
    </div>
</div>
      
