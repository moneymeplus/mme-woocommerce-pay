<div id="container-mme" class="m-442218 mme-gateway">
    <div class="mme-border">
        <h3 class="mme-h3">Shop now & pay later</h3>
        <p><?php echo esc_html($description);?></p>
        <?php
        woocommerce_form_field( 'udfyld_ean', array(
            'type'          => 'select',
            'label'         => __("Fill in this field", "woocommerce"),
            'class'         => array('form-row-wide'),
            'required'      => false,
            'options'       => array(
                ''          => __("Select something", "woocommerce"),
                'choice-1'  => __("Choice one", "woocommerce"),
                'choice-2'  => __("Choice two", "woocommerce"),
            ),
        ), '');
        ?>
    </div>
</div>
      
