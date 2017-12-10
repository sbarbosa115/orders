<h1>Jarocho Landscaping</h1>

<div class="wrap">
    <p><a href="/order/new" target="_blank">Click in here to create a new order</a></p>

    <form method="post" action="<?php echo admin_url("options.php"); ?>">
        <?php settings_fields( 'orders-settings' ); ?>
        <?php do_settings_sections( 'orders-settings' ); ?>

        <table class="form-table">
            <tr valign="top">
                <th scope="row">Email to sent each  PDF order:</th>
                <td><input type="email" name="order_to_email" value="<?php echo get_option( 'order_to_email' ); ?>" style="width: 300px;"/></td>
            </tr>
            <tr valign="top">
                <th scope="row">Default sender:</th>
                <td><input type="email" name="order_from_email" value="<?php echo get_option( 'order_from_email' ); ?>" style="width: 300px;"/></td>
            </tr>
            <tr valign="top">
                <th scope="row">Copy to signature space:</th>
                <td><textarea name="order_signature_space" style="width: 300px;"><?php echo get_option( 'order_signature_space' ); ?></textarea></td>
            </tr>
        </table>
        <?php submit_button("Save Options"); ?>
    </form>
</div>